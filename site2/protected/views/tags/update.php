<?php
/* @var $this TagsController */
/* @var $model Tags */

$this->layout='//layouts/empty';

/*
$this->breadcrumbs=array(
	'Tags'=>array('index'),
	$model->name=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tags', 'url'=>array('index')),
	array('label'=>'Create Tags', 'url'=>array('create')),
	array('label'=>'View Tags', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Tags', 'url'=>array('admin')),
);
*/
?>

<h3>Изменение категории</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>