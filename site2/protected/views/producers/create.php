<?php
/* @var $this ProducersController */
/* @var $model Producers */

$this->breadcrumbs=array(
	'Producers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Producers', 'url'=>array('index')),
	array('label'=>'Manage Producers', 'url'=>array('admin')),
);
?>

<h1>Create Producers</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>