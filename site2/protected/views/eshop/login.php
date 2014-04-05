<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->layout='//layouts/user';
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
    'Вход',
);
?>

<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'htmlOptions'=>array('class'=>'form-horizontal'),
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>

    <h3>Вход:</h3>

    <div class="form-group">
        <label class="col-sm-2 control-label required" for="LoginForm_username">Почта <span class="required">*</span></label>
        <?php //echo $form->labelEx($model,'username',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>100, 'class'=>'form-control')); ?>
            <?php echo $form->error($model,'username'); ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label required" for="LoginForm_password">Пароль <span class="required">*</span></label>
        <?php //echo $form->labelEx($model,'password',array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-6">
            <?php echo $form->textField($model,'password',array('size'=>60,'maxlength'=>100, 'class'=>'form-control')); ?>
            <?php echo $form->error($model,'password'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-6 col-sm-offset-2">
            <?php echo $form->checkBox($model,'rememberMe'); ?>
            <label for="LoginForm_rememberMe">Запомнить меня</label>
            <?php //echo $form->label($model,'rememberMe'); ?>
            <?php echo $form->error($model,'rememberMe'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo CHtml::submitButton('Войти', array('class'=>'btn btn-default')); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>
</div>
