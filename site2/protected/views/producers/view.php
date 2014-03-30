<?php
/* @var $this ProducersController */
/* @var $model Producers */

$this->breadcrumbs=array(
	'Producers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Producers', 'url'=>array('index')),
	array('label'=>'Create Producers', 'url'=>array('create')),
	array('label'=>'Update Producers', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Producers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Producers', 'url'=>array('admin')),
);
?>

<h1>View Producers #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'name',
	),
)); ?>
