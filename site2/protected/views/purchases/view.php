<?php
/* @var $this PurchasesController */
/* @var $model Purchases */

$this->layout='//layouts/user';
$this->breadcrumbs=array(
	'Purchases'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'List Purchases', 'url'=>array('index')),
	array('label'=>'Create Purchases', 'url'=>array('create')),
	array('label'=>'Update Purchases', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Purchases', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Purchases', 'url'=>array('admin')),
);
?>

<h1>View Purchases #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'userID',
		'userComment',
		'date',
		'paymentState',
		'deliveryState',
		'marker',
	),
)); ?>
