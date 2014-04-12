<?php

class PurchasesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/user';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('create','test'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','update','pay_begin','pay_mid','pay_end','pay_cancel'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','search'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        if (Yii::app()->user->isGuest){
            $this->redirect(array('/users/buy'));
        }

		$model=new Purchases;
        $userID = Yii::app()->user->getId();
        $model->userID = $userID;
        $user = Users::model()->findbyPk($userID);

        if (!isset(Yii::app()->session['scart']))
            Yii::app()->session['scart'] = array();
        $scart = Yii::app()->session['scart'];

		if(isset($_POST['Purchases']))
		{
			$model->attributes=$_POST['Purchases'];

            $model->deliveryState='';
            $model->paymentState='';
            $model->marker=0;

			if($model->save()){
                foreach($scart as $card=>$count){
                    $item = new PurchaseItems;
                    $item->cardID = $card;
                    $item->count = $count;
                    $item->purchaseID = $model->ID;
                    $item->save();
                }

                $scart = array();
                Yii::app()->session['scart'] = $scart;

				$this->redirect(array('pay_begin','id'=>$model->ID));
            }
		}


        $sum = 0;
        foreach($scart as $cardID=>$count){
            $card = Cards::model()->findByPk($cardID);
            $sum += $card->price * $count;
        }

		$this->render('create',array(
            'model'=>$model,
            'user'=>$user,
            'scart'=>$scart,
            'sum'=>$sum,
		));
	}


    public function actionTest(){
        if (!isset(Yii::app()->session['scart']))
            Yii::app()->session['scart'] = array();
        $scart = Yii::app()->session['scart'];

        print_r($scart);

        $cards = Cards::model()->findbyPk($scart);

        print_r($cards);
    }

    public function actionPay_cancel(){
        echo 'canceled';
        echo '<br />';
        echo "<a href='/purchases/index/'>go back</a>";
        //$model=$this->loadModel($id);
        //$model->paymentState='begin';
        //$model->save();

        $this->redirect('index');
    }

    public function actionPay_begin($id){
        $model=$this->loadModel($id);
        $model->paymentState = 'begin';
        $model->save();

        $this->render('pay',array(
            'model'=>$model,
        ));
    }

    public function actionPay_mid($id){
        $paypal = new PayPal();
        $model=$this->loadModel($id);
        $model->paymentState = 'mid';
        $model->save();


        $paymentAmount = "42.00";

        $currencyCodeType = "USD";
        $paymentType = "Sale";
        $returnURL = "http://localhost/purchases/pay_end/".$id;
        $cancelURL = "http://localhost/purchases/pay_cancel/";

        $items = array();
        //$items[] = array('name' => 'Item Name', 'amt' => $paymentAmount, 'qty' => 1);


        $sum = 0;
        $criteria=new CDbCriteria;
        $criteria->compare('purchaseID',$id,true);
        $db_items = (new CActiveDataProvider('PurchaseItems', array('criteria'=>$criteria)))->data;

        foreach($db_items as $item){
            $card = Cards::model()->findByPk($item->cardID);
            $items[] = array('name' => $card->name, 'amt' => $card->price, 'qty' => $item->count);

            $sum += $card->price * $item->count;
        }
        $paymentAmount = $sum.'.00';



        $resArray = $paypal->SetExpressCheckoutDG( $paymentAmount, $currencyCodeType, $paymentType,
            $returnURL, $cancelURL, $items );

        $ack = strtoupper($resArray["ACK"]);
        if($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING")
        {
            $token = urldecode($resArray["TOKEN"]);
            $paypal->RedirectToPayPalDG( $token );

            //$model->payment_token = $token;
            //$model->save();
        }
        else
        {
            //Display a user friendly Error on the page using any of the following error information returned by PayPal
            $ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
            $ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
            $ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
            $ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);

            echo "SetExpressCheckout API call failed. ";
            echo "Detailed Error Message: " . $ErrorLongMsg;
            echo "Short Error Message: " . $ErrorShortMsg;
            echo "Error Code: " . $ErrorCode;
            echo "Error Severity Code: " . $ErrorSeverityCode;
        }
    }

    public function actionPay_end($id){
        $paypal = new PayPal();
        $model=$this->loadModel($id);

        $res = $paypal->GetExpressCheckoutDetails( $_REQUEST['token'] );
        $finalPaymentAmount =  $res["PAYMENTREQUEST_0_AMT"];

        //Format the  parameters that were stored or received from GetExperessCheckout call.
        $token 				= $_REQUEST['token'];
        $payerID 			= $_REQUEST['PayerID'];
        $paymentType 		= 'Sale';
        $currencyCodeType 	= $res['CURRENCYCODE'];
        $items = array();
        $i = 0;
        // adding item details those set in setExpressCheckout
        while(isset($res["L_PAYMENTREQUEST_0_NAME$i"]))
        {
            $items[] = array('name' => $res["L_PAYMENTREQUEST_0_NAME$i"], 'amt' => $res["L_PAYMENTREQUEST_0_AMT$i"], 'qty' => $res["L_PAYMENTREQUEST_0_QTY$i"]);
            $i++;
        }

        $resArray = $paypal->ConfirmPayment ( $token, $paymentType, $currencyCodeType, $payerID, $finalPaymentAmount, $items );
        $ack = strtoupper($resArray["ACK"]);
        if( $ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING" )
        {
            $transactionId		= $resArray["PAYMENTINFO_0_TRANSACTIONID"];
            $model->payment_transaction = $transactionId;
            $model->paymentState = 'end';
            $model->marker = 1;
            $model->save();

            $paymentStatus = $resArray["PAYMENTINFO_0_PAYMENTSTATUS"];
            $pendingReason = $resArray["PAYMENTINFO_0_PENDINGREASON"];
            $reasonCode	= $resArray["PAYMENTINFO_0_REASONCODE"];

            // Add javascript to close Digital Goods frame. You may want to add more javascript code to
            // display some info message indicating status of purchase in the parent window
            ?>
            <html>
            <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
            <script>
                alert("Оплата прошла успешно!");
                // add relevant message above or remove the line if not required
                window.onload = function(){
                    if(window.opener){
                        window.close();
                    }
                    else{
                        if(top.dg.isOpen() == true){
                            top.dg.closeFlow();
                            return true;
                        }
                    }
                };

            </script>
            </html>
        <?php
        }
        else
        {
            //Display a user friendly Error on the page using any of the following error information returned by PayPal
            $ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
            $ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
            $ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
            $ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);

            echo "DoExpressCheckoutDetails API call failed. ";
            echo "Detailed Error Message: " . $ErrorLongMsg;
            echo "Short Error Message: " . $ErrorShortMsg;
            echo "Error Code: " . $ErrorCode;
            echo "Error Severity Code: " . $ErrorSeverityCode;
            ?>
            <html>
            <script>
                alert("Payment failed");
                // add relevant message above or remove the line if not required
                window.onload = function(){
                    if(window.opener){
                        window.close();
                    }
                    else{
                        if(top.dg.isOpen() == true){
                            top.dg.closeFlow();
                            return true;
                        }
                    }
                };

            </script>
            </html>
        <?php
        }
    }



    //список пользователя
    public function actionIndex()
    {
        if (Yii::app()->user->isGuest){
            $this->redirect(array('/eshop/login'));
        }
        $userID = Yii::app()->user->getId();

        $criteria=new CDbCriteria;
        $criteria->compare('userID',$userID);
        $dataProvider = new CActiveDataProvider('Purchases', array('criteria'=>$criteria,));

        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

/* не нужно
    public function actionView($id)
    {
        if (Yii::app()->user->isGuest){
            $this->redirect(array('/eshop/login'));
        }
        $userID = Yii::app()->user->getId();
        $user=Users::model()->findByPk($userID);
        $model = $this->loadModel($id);

        if ($model->userID !== $userID && $user->mail !== 'admin')
            throw new CHttpException(403,'Доступ запрещен.');

        $this->render('view',array(
            'model'=>$model,
        ));
    }
*/

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Purchases']))
		{
			$model->attributes=$_POST['Purchases'];

            if ($model->paymentState==='end' && $model->deliveryState==='end')
                $model->marker = 2;
            else if ($model->paymentState==='end')
                $model->marker = 1;
            else
                $model->marker = 0;

			if($model->save())
				$this->redirect(array('admin'));
			//	$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}



    public function actionAdmin()
    {
        $purchases=Purchases::model()->need_admin()->findAll();
        $this->render('admin',array(
            'purchases'=>$purchases,
        ));
    }

	/**
	 * Manages all models.
	 */
	public function actionSearch()
	{
		$model=new Purchases('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Purchases']))
			$model->attributes=$_GET['Purchases'];

		$this->render('search',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Purchases the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Purchases::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Purchases $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='purchases-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public $payment_states=array(''=>'создано',
        'begin'=>'просмотрено',
        'mid'=>'перенаправлено на оплату',
        'end'=>'оплачено');
    public $delivery_states=array(''=>'ожидание рассмотрения',
        'begin'=>'просмотрена',
        'mid'=>'отправлено в службу доставки',
        'end'=>'доставлено');
}
