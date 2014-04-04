<?php
/* @var $this PurchasesController */
/* @var $dataProvider CActiveDataProvider */

$this->layout='//layouts/admin';
$this->menu_selector='purchases';
$this->breadcrumbs=array(
	'Purchases',
);

$this->menu=array(
	array('label'=>'Create Purchases', 'url'=>array('create')),
	array('label'=>'Manage Purchases', 'url'=>array('admin')),
);
?>

<h1>Purchases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
