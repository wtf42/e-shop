<?php
/* @var $this PurchasesController */
/* @var $model Purchases */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'purchases-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'userID',array('class'=>'')); ?>
		<?php echo $form->textField($model,'userID',array('class'=>'')); ?>
		<?php echo $form->error($model,'userID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userComment',array('class'=>'')); ?>
		<?php echo $form->textField($model,'userComment',array('size'=>60,'maxlength'=>500, 'class'=>'')); ?>
		<?php echo $form->error($model,'userComment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date',array('class'=>'')); ?>
		<?php echo $form->textField($model,'date',array('class'=>'')); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'paymentState',array('class'=>'')); ?>
		<?php echo $form->textField($model,'paymentState',array('size'=>50,'maxlength'=>50, 'class'=>'')); ?>
		<?php echo $form->error($model,'paymentState'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deliveryState',array('class'=>'')); ?>
		<?php echo $form->textField($model,'deliveryState',array('size'=>50,'maxlength'=>50, 'class'=>'')); ?>
		<?php echo $form->error($model,'deliveryState'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'marker',array('class'=>'')); ?>
		<?php echo $form->textField($model,'marker',array('class'=>'')); ?>
		<?php echo $form->error($model,'marker'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->