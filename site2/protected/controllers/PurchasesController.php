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
				'actions'=>array('create','test','pay_begin'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','update','pay_end'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
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

    public function actionPay_begin($id){
        echo $id.'ok';
        $model=$this->loadModel($id);
        $model->paymentState='begin';
        $model->save();
        echo '<br />';
        echo "<a href='/purchases/pay_end/$id'>next (end)</a>";
    }

    public function actionPay_end($id){
        echo $id.'ok';
        $model=$this->loadModel($id);
        $model->paymentState='end';
        $model->marker=1;
        $model->save();
        echo '<br />';
        echo "<a href='/purchases/view/$id'>next (view)</a>";
    }

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
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
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

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Purchases');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Purchases('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Purchases']))
			$model->attributes=$_GET['Purchases'];

		$this->render('admin',array(
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
}
