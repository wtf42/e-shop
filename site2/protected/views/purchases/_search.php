<?php
/* @var $this PurchasesController */
/* @var $model Purchases */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID'); ?>
		<?php echo $form->textField($model,'ID',array('class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'userID'); ?>
		<?php echo $form->textField($model,'userID',array('class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'userComment'); ?>
		<?php echo $form->textField($model,'userComment',array('size'=>60,'maxlength'=>500, 'class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date',array('class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'paymentState'); ?>
		<?php echo $form->textField($model,'paymentState',array('size'=>50,'maxlength'=>50, 'class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deliveryState'); ?>
		<?php echo $form->textField($model,'deliveryState',array('size'=>50,'maxlength'=>50, 'class'=>'')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'marker'); ?>
		<?php echo $form->textField($model,'marker',array('class'=>'')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->