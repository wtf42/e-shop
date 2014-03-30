<?php
/* @var $this NewsController */
/* @var $model News */

$this->layout='//layouts/user';
$this->breadcrumbs=array(
	'Новости'=>array('index'),
	'Просмотр',
);

/*
$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'Update News', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete News', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
*/
?>

<?php $this->renderPartial('_view',array('news'=>$model)); ?>
