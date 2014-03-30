<?php
/* @var $this NewsController */
/* @var $model News */

$this->layout='//layouts/admin';
$this->breadcrumbs=array(
	'Новости'=>array('admin'),
	$model->header=>array('view','id'=>$model->ID),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'View News', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>

<h3>Редактирование новости</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>