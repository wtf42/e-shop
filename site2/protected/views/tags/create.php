<?php
/* @var $this TagsController */
/* @var $model Tags */

$this->layout='//layouts/colorbox2';

/*
$this->menu_selector = 'tags';
$this->breadcrumbs=array(
	'Tags'=>array('index'),
	'Create',
);


$this->menu=array(
	array('label'=>'List Tags', 'url'=>array('index')),
	array('label'=>'Manage Tags', 'url'=>array('admin')),
);
*/
?>

<h3>Создание категории</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
