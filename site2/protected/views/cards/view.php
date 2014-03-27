<?php
/* @var $this CardsController */
/* @var $model Cards */

$this->breadcrumbs=array(
	'Cards'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Cards', 'url'=>array('index')),
	array('label'=>'Create Cards', 'url'=>array('create')),
	array('label'=>'Update Cards', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Cards', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cards', 'url'=>array('admin')),
);
?>

<h1>View Cards #<?php echo $model->ID; ?></h1>

<?php echo $model->producer->name; ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'name',
		'description',
		'producerID',
		'price',
		'sizeX',
		'sizeY',
		'sizeZ',
		'weight',
	),
)); ?>
