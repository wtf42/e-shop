<?php
/* @var $this PurchasesController */
/* @var $model Purchases */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'purchases-form',
    'htmlOptions'=>array('class'=>'form-horizontal'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->label($model,'userID',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-8">
            <?php echo CHtml::link($model->user->FIO,array('/users/view','id'=>$model->userID),
                array('class'=>'')); ?>
			<?php echo $form->error($model,'userID'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'userComment',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'userComment',array('size'=>60,'maxlength'=>500, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'userComment'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-8">
            <div class="form-control"><?php echo $model->date; ?></div>
			<?php echo $form->error($model,'date'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'paymentState',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-8">
            <?php
            $list = $this->payment_states;
            echo $form->dropDownList($model,'paymentState', $list,
                array('prompt'=>'Выберите состояние...','class'=>'form-control'));
            ?>
			<?php echo $form->error($model,'paymentState'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'deliveryState',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-8">
            <?php
            $list = $this->delivery_states;
            echo $form->dropDownList($model,'deliveryState', $list,
                array('prompt'=>'Выберите состояние...','class'=>'form-control'));
            ?>
			<?php echo $form->error($model,'deliveryState'); ?>
		</div>
	</div>
<!--
	<div class="form-group">
		<?php echo $form->labelEx($model,'marker',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-8">
            <?php
            $list = array('0'=>'создана',
                '1'=>'оплачена',
                '2'=>'доставлена');
            echo $form->dropDownList($model,'marker', $list,
                array('class'=>'form-control readonly'));
            ?>
			<?php echo $form->error($model,'marker'); ?>
		</div>
	</div>
-->
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<?php echo CHtml::submitButton('Сохранить', array('class'=>'btn btn-default')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
