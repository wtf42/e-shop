<?php

class ScartController extends Controller
{
    public $layout = '//layouts/empty';

	public function actionAdd()
	{
        $this->prepareSession();
        $scart = Yii::app()->session['scart'];

        $id = Yii::app()->request->getPost('id');
        if (isset($scart[$id])){
            echo 'уже есть в корзине!';
            Yii::app()->end();
        }

        $scart[$id]=1;

        echo 'добавлено';

        Yii::app()->session['scart'] = $scart;
        Yii::app()->end();
	}

	public function actionDelete()
	{
        $this->prepareSession();
        $scart = Yii::app()->session['scart'];

        $id = Yii::app()->request->getPost('id');
        if (!isset($scart[$id])){
            echo 'ошибка: ID не найдено';
            Yii::app()->end();
        }
        unset($scart[$id]);

        echo 'удалено';

        Yii::app()->session['scart'] = $scart;
        Yii::app()->end();
	}

    public function actionUpdate()
    {
        $this->prepareSession();
        $scart = Yii::app()->session['scart'];

        $id = Yii::app()->request->getPost('id');
        $cnt = Yii::app()->request->getPost('cnt');

        $scart[$id] = $cnt;

        echo 'обновлено';

        Yii::app()->session['scart'] = $scart;
        Yii::app()->end();
    }

    public function actionIndex()
    {
        //Yii::app()->session['scart'] = array();
        //$this->render('index');
    }


    public function actionClear()
    {
        Yii::app()->session['scart'] = array();
        echo 'ok';
    }

    public function actionTest()
    {
        print_r(Yii::app()->session['scart']);
    }


	public function actionView()
	{
        $this->prepareSession();
		$this->render('view');
	}

    public function actionBuy($id)
    {
        $this->prepareSession();
        $scart = Yii::app()->session['scart'];

        //$id = Yii::app()->request->getPost('id');
        if (isset($scart[$id])){
            echo 'error: already in cart';
            $this->redirect(array('scart/view'));
        }
        $scart[$id]=1;

        echo 'ok';

        Yii::app()->session['scart'] = $scart;

        $this->redirect(array('scart/view'));
    }

    protected function prepareSession(){
        if (!isset(Yii::app()->session['scart'])){
            Yii::app()->session['scart'] = array();
        }
    }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}