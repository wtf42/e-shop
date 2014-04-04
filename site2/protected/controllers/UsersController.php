<?php

class UsersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
            array('allow',
                'actions'=>array('create','buy','email','email_clr'),
                'users'=>array('*'),
            ),
            array('allow',
                'actions'=>array('view','update'),
                'users'=>array('@'),
            ),
			array('allow',
				'actions'=>array('index','admin','delete'),
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
		$model=new Users;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
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
        // $this->performAjaxValidation($model);

        if(isset($_POST['Users']))
        {
            $model->attributes=$_POST['Users'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->ID));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }



    public function actionBuy()
    {
        $user=new Users();
        $userID = Yii::app()->user->getId();
        $guest = Yii::app()->user->isGuest;
        if (!$guest){
            $user = Users::model()->findbyPk($userID);
        }else{
            if ($user->ID != $userID)
                throw new CHttpException(403,'Можно редактировать только свои данные :)');
        }

        if(isset($_POST['Users']))
        {
            $user->attributes=$_POST['Users'];
            if ($guest)
                $this->CreateUserBegin($user);
            if($user->save()){
                if ($guest)
                    $this->CreateUserEnd($user);
                $this->redirect(array('/purchases/create'));
            }
        }

        $this->render('buy',array(
            'user'=>$user,
        ));
    }

    protected function CreateUserBegin($user){
        $password = uniqid('', true);
        $user->token = $password;
    }
    protected function CreateUserEnd($user){
        $text = print_r($user,true);
        $this->sendEmail($user,$text);
        $identity=new UserIdentity($user->mail,$user->token);
        if ($identity->authenticate())
            Yii::app()->user->login($identity);
        else{
            throw new CHttpException(500,'user identity error');
        }
    }

    protected function sendEmail($user, $text){
        if (!isset(Yii::app()->session['email']))
            Yii::app()->session['email'] = array();
        $mails = Yii::app()->session['email'];

        array_push($mails, $text);
        //TODO: send real mail :)

        Yii::app()->session['email'] = $mails;
    }

    public function actionEmail()
    {
        if (!isset(Yii::app()->session['email']))
            Yii::app()->session['email'] = array();
        $mails = Yii::app()->session['email'];

        $this->render('email',array(
            'mails'=>$mails,
            'return'=>array('/purchases/create'),
        ));
    }
    public function actionEmail_clr()
    {
        if (!isset(Yii::app()->session['email']))
            Yii::app()->session['email'] = array();
        $mails = Yii::app()->session['email'];

        $mails = array();
        Yii::app()->session['email'] = $mails;
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
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
