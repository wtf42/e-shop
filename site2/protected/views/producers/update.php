<?php
/* @var $this ProducersController */
/* @var $model Producers */

$this->breadcrumbs=array(
	'Producers'=>array('index'),
	$model->name=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Producers', 'url'=>array('index')),
	array('label'=>'Create Producers', 'url'=>array('create')),
	array('label'=>'View Producers', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Producers', 'url'=>array('admin')),
);
?>

<h1>Update Producers <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>