<?php
/* @var $this CardsController */
/* @var $model Cards */

$this->layout='//layouts/admin';
$this->menu_selector = 'cards';
$this->breadcrumbs=array(
	'Открытки'=>array('admin'),
	'Добавить',
);

/*
$this->menu=array(
	array('label'=>'List Cards', 'url'=>array('index')),
	array('label'=>'Manage Cards', 'url'=>array('admin')),
);*/
?>

<h3>Добавить открытку</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>