<?php
/* @var $this PurchasesController */
/* @var $data Purchases */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userID')); ?>:</b>
	<?php echo CHtml::encode($data->userID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userComment')); ?>:</b>
	<?php echo CHtml::encode($data->userComment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('paymentState')); ?>:</b>
	<?php echo CHtml::encode($data->paymentState); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deliveryState')); ?>:</b>
	<?php echo CHtml::encode($data->deliveryState); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marker')); ?>:</b>
	<?php echo CHtml::encode($data->marker); ?>
	<br />


</div>