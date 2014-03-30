<?php
/* @var $this CardsController */
/* @var $model Cards */

$this->layout='//layouts/admin';
$this->menu_selector = 'cards';
$this->breadcrumbs=array(
	'Открытки'=>array('admin'),
	$model->name=>array('view','id'=>$model->ID),
	'Редактирование',
);

/*
$this->menu=array(
	array('label'=>'List Cards', 'url'=>array('index')),
	array('label'=>'Create Cards', 'url'=>array('create')),
	array('label'=>'View Cards', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Cards', 'url'=>array('admin')),
);*/
?>

<h3>Редактирование открытки</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>