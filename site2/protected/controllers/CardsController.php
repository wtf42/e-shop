<?php

class CardsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/empty';
    public $menu_selector=null;

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
				'actions'=>array('index','view','search'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create','update','admin','delete',
                    'tag_add','tag_delete',
                    //'pix','pix_add','pix_del','pix_up','pix_get','pix_list','pix_resize',
                    'upload','pix_del'
                ),
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
        $rec = $this->getRecommendations($id);

		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'rec'=>$rec,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Cards;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Cards']))
		{
			$model->attributes=$_POST['Cards'];
			if($model->save())
                $this->redirect(array('view','id'=>$model->ID));
            //$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		$this->performAjaxValidation($model);

		if(isset($_POST['Cards']))
		{
			$model->attributes=$_POST['Cards'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
/*
    public function actionPix($id)
    {
        $model=$this->loadModel($id);

        Yii::import("xupload.models.XUploadForm");
        $pix = new XUploadForm;

        $this->render('pix',array(
            'model'=>$model,
            'pix'=>$pix,
        ));
    }
    public function actionPix_list()
    {
        foreach(Pix::getList() as $pix){
            echo "<option value='".CHtml::encode($pix)."'>".CHtml::encode($pix)."</option>";
        }
    }
    public function actionPix_resize(){
        //
        if(!isset($_POST['pix'])) return;
        $pix_path = $_POST['pix'];
        if (!in_array($pix_path,Pix::getList())) return;

        //
    }

    public function actionPix_add(){
        //
        if(!isset($_POST['id']) || !isset($_POST['pix'])) return;
        $id = $_POST['id'];
        $pix_path = $_POST['pix'];
        if (!in_array($pix_path,Pix::getList())) return;

        $pix = new Pix;
        $pix->path = $pix_path;
        $pix->save();

        $card_pix = new CardPix();
        $card_pix->cardID = $id;
        $card_pix->pixID = $pix->ID;
        $card_pix->save();

        echo 'ok';

        //Yii::app()->end();
    }
    public function actionPix_del(){
        if(!isset($_POST['id'])) return;
        $id = $_POST['id'];

        $criteria=new CDbCriteria;
        $criteria->compare('cardID',$id);
        $data = new CActiveDataProvider('CardPix', array('criteria'=>$criteria,));
        foreach($data->data as $card_pix)
            $card_pix->delete();

        echo 'ok';

        //Yii::app()->end();
    }
    public function actionPix_get(){
        if(!isset($_POST['id'])) return;
        $id = $_POST['id'];

        $criteria=new CDbCriteria;
        $criteria->compare('cardID',$id);
        $data = new CActiveDataProvider('CardPix', array('criteria'=>$criteria));

        if (count($data->data))
            echo Pix::model()->findByPk($data->data[0]->pixID)->path;
        else echo '';

        //Yii::app()->end();
    }
    public function actionPix_up(){
        $this->actionPix_del();
        $this->actionPix_add();
    }
*/
    public function actionUpload(){
        //echo 'ok';
        //print_r($_FILES);
        //print_r($_GET);
        //print_r($_POST);
        //return;

        Yii::import('application.extensions.upload.Upload');
        $Upload = new Upload( (isset($_FILES['pix_pix']) ? $_FILES['pix_pix'] : null) );
        $Upload->jpeg_quality  = 100;
        $Upload->no_script     = false;
        $Upload->image_resize  = true;
        $Upload->image_x       = 300;
        $Upload->image_y       = 400;
        $Upload->image_ratio   = true;

        $newName  = $Upload->file_src_name . date('YmdHis');
        $destPath = Yii::app()->params['images_dir'];
        $destName = '';

        if ($Upload->uploaded) {
            $Upload->file_new_name_body = $newName;
            $Upload->process($destPath);

            // if was processed
            if ($Upload->processed) {
                $destName = $Upload->file_dst_name;

                echo $destName;

                // create the thumb
                unset($Upload);

                $Upload = new Upload($destPath.$destName);
                $Upload->file_new_name_body   = 'thumb_' . $newName;
                $Upload->no_script            = false;
                $Upload->image_resize         = true;
                $Upload->image_x              = 120;
                $Upload->image_y              = 120;
                $Upload->image_ratio          = true;
                $Upload->process($destPath . '/thumbs');
            } else
                throw new CHttpException(404,$Upload->error);
        }else
            throw new CHttpException(404,'select file to upload.');
    }
    public function actionPix_del(){
        //if(!isset($_POST['pix'])) return;
        //$pix = $_POST['pix'];
        //$destPath = Yii::app()->params['images_dir'];
        //$full_path = $destPath . '/' . $pix;
        //if (file_exists($full_path))
        //    unlink($full_path);
        //echo 'ok';
        if(!isset($_POST['id'])) return;
        $model = $this->loadModel($_POST['id']);
        if (!isset($model->pix) || strlen($model->pix) == 0) return;
        $full_path = Yii::app()->params['images_dir'] . '/' . $model->pix;
        if (file_exists($full_path))
            unlink($full_path);
        echo 'ok';
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


    public function actionTag_add()
    {
        if(!isset($_POST['id']) || !isset($_POST['tag'])) return;
        $ctag=new CardTags;
        $ctag->cardID = $_POST['id'];
        $ctag->tagID = $_POST['tag'];
        if ($ctag->save())
            echo 'добавлено';
        else
            echo 'error';
        Yii::app()->end();
    }
    public function actionTag_delete()
    {
        if(!isset($_POST['id']) || !isset($_POST['tag'])) return;

        $ctag = CardTags::model()->findByPk(array('cardID'=>$_POST['id'],'tagID'=>$_POST['tag']));
        if (!is_null($ctag)){
            $ctag->delete();
            echo 'удалено';
        } else
            echo 'ошибка: тег не найден';

        Yii::app()->end();
    }


	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Cards');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
    public function actionSearch()
    {
        $model=new Cards('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Cards']))
            $model->attributes=$_GET['Cards'];

        $this->render('search',array(
            'model'=>$model,
        ));
    }

    public function actionAdmin()
    {
        $dataProvider=new CActiveDataProvider('Cards');
        $this->render('admin',array(
            'dataProvider'=>$dataProvider,
        ));
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cards the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cards::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Cards $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cards-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


    protected function getRecommendations($id){
        //
        $card = $this->loadModel($id);
        $purchases = Purchases::model()->findAll();
        $rec = array();
        foreach($purchases as $purchase){
            $items = $purchase->yiiCards;
            if (in_array($card,$items)){
                foreach($items as $item){
                    if ($item->ID !== $card->ID){
                        if (!isset($rec[$item->ID])) $rec[$item->ID]=0;
                        $rec[$item->ID]++;
                    }
                }
            }
        }
        $rec2 = array();
        foreach($rec as $cardID=>$cnt){
            array_push($rec2,array($cnt,$cardID));
        }
        arsort($rec2);

        $rec = array();
        foreach($rec2 as $item){ array_push($rec,$item[1]); }

        $rec = array_slice($rec,0,4);
        return $rec;
        //return print_r($rec2,true);
        /*
        $criteria=new CDbCriteria;
        $criteria->with=array('yiiPurchases');
        $criteria->compare('t.ID',$this->ID);
        $criteria->compare('t.name',$this->name,true);
        $criteria->compare('t.description',$this->description,true);
        $criteria->compare('yiiPurchases.name',$this->producer_search,true);
        $criteria->compare('t.price',$this->price);
        $criteria->compare('t.sizeX',$this->sizeX);
        $criteria->compare('t.sizeY',$this->sizeY);
        $criteria->compare('t.sizeZ',$this->sizeZ);
        $criteria->compare('t.weight',$this->weight);

        return (new CActiveDataProvider($this, array('criteria'=>$criteria)))->data;
        */
    }
}
