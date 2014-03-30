<?php
/* @var $this NewsController */
/* @var $model News */

$this->layout='//layouts/admin';
$this->breadcrumbs=array(
	'Новости'=>array('admin'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>

<h3>Добавить новость</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>