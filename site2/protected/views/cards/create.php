<?php
/* @var $this CardsController */
/* @var $model Cards */

$this->breadcrumbs=array(
	'Cards'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cards', 'url'=>array('index')),
	array('label'=>'Manage Cards', 'url'=>array('admin')),
);
?>

<h1>Create Cards</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>