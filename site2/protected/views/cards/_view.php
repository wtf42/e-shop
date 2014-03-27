<?php
/* @var $this CardsController */
/* @var $data Cards */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('producerID')); ?>:</b>
	<?php echo CHtml::encode($data->producerID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sizeX')); ?>:</b>
	<?php echo CHtml::encode($data->sizeX); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sizeY')); ?>:</b>
	<?php echo CHtml::encode($data->sizeY); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('sizeZ')); ?>:</b>
	<?php echo CHtml::encode($data->sizeZ); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	*/ ?>

</div>