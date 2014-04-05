<?php
/* @var $this PurchasesController */
/* @var $model Purchases */

$this->layout='//layouts/admin';
$this->menu_selector='purchases';
$this->breadcrumbs=array(
	'Покупки'=>array('admin'),
	'#'.$model->ID=>array('view','id'=>$model->ID),
	'Просмотр',
);

?>

<div class="panel panel-info">
    <div class="panel-heading">
    </div>
    <div class="panel-body">
        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
    <div class="panel-footer"></div>
</div>
