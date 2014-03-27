<?php
/* @var $this CardsController */
/* @var $model Cards */

$this->breadcrumbs=array(
	'Cards'=>array('index'),
	$model->name=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cards', 'url'=>array('index')),
	array('label'=>'Create Cards', 'url'=>array('create')),
	array('label'=>'View Cards', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Cards', 'url'=>array('admin')),
);
?>

<h1>Update Cards <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>