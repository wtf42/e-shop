<?php
/* @var $this PurchasesController */
/* @var $model Purchases */

$this->layout='//layouts/admin';
$this->menu_selector='purchases';
$this->breadcrumbs=array(
	'Purchases'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Purchases', 'url'=>array('index')),
	array('label'=>'Create Purchases', 'url'=>array('create')),
	array('label'=>'View Purchases', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Purchases', 'url'=>array('admin')),
);
?>

<h1>Update Purchases <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>