
<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'news-form',
    'htmlOptions'=>array('class'=>'form-horizontal'),
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="form-group">
    <?php echo $form->labelEx($model,'header',array('class'=>'col-sm-2 control-label')); ?>
    <div class="col-sm-8">
        <?php echo $form->textField($model,'header',array('size'=>60,'maxlength'=>200, 'class'=>'form-control')); ?>
        <?php echo $form->error($model,'header'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model,'text',array('class'=>'col-sm-2 control-label')); ?>
    <div class="col-sm-8">
        <?php echo CHtml::activeTextArea($model,'text',array('rows'=>3, 'cols'=>50, 'class'=>'form-control')); ?>
        <?php //echo $form->textField($model,'text',array('size'=>60,'maxlength'=>2000, 'class'=>'form-control')); ?>
        <?php echo $form->error($model,'text'); ?>
    </div>
</div>

<?php if (!$model->isNewRecord){ ?>
<div class="form-group">
    <?php echo $form->labelEx($model,'date',array('class'=>'col-sm-2 control-label')); ?>
    <div class="col-sm-8">
        <?php echo $form->textField($model,'date',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'date'); ?>
    </div>
</div>
<?php }; ?>

<div class="form-group">
    <?php echo $form->labelEx($model,'pix',array('class'=>'col-sm-2 control-label')); ?>
    <div class="col-sm-8">
        <?php echo $form->textField($model,'pix',array('size'=>60,'maxlength'=>500, 'class'=>'form-control')); ?>
        <?php echo $form->error($model,'pix'); ?>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-8 col-sm-offset-2">
        <span class="button-checkbox">
            <button type="button" class="btn" data-color="info">Отображать на главной</button>
            <?php echo CHtml::activeCheckBox($model,'visible',array('class'=>'hidden')); ?>
        </span>
        <?php echo $form->error($model,'visible'); ?>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',
            array('class'=>'btn btn-primary col-xs-4')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>