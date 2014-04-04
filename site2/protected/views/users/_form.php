<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
/* @var $submit_text String */
/* @var $submit_style String */

?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
    'htmlOptions'=>array('class'=>'form-horizontal'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'FIO',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'FIO',array('size'=>60,'maxlength'=>100, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'FIO'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'address',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>100, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'address'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'mail',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'mail',array('size'=>60,'maxlength'=>100, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'mail'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'phone',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>100, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'phone'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<?php echo CHtml::submitButton($submit_text, array('class'=>$submit_style)); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
