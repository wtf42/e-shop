<?php

class CardsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
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
				'actions'=>array('create','update','admin','delete','tag_add','tag_delete'),
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

		// Uncomment the following line if AJAX validation is needed
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
}
