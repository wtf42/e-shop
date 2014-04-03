<?php
/* @var $this CardsController */
/* @var $model Cards */
/* @var $form CActiveForm */
?>

<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

    <div class="form-group">
        <?php echo $form->label($model,'name',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
        <div class="col-sm-8">
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200, 'class'=>'form-control')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->label($model,'description',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
        <div class="col-sm-8">
            <?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>1000, 'class'=>'form-control')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->label($model,'producer.name',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
        <div class="col-sm-8">
            <?php echo $form->textField($model,'producer_search',array('class'=>'form-control')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->label($model,'price',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
        <div class="col-xs-4 col-sm-2">
            <?php echo $form->textField($model,'price',array('class'=>'form-control')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->label($model,'sizeX',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
        <div class="col-xs-4 col-sm-2">
            <?php echo $form->textField($model,'sizeX',array('class'=>'form-control')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->label($model,'sizeY',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
        <div class="col-xs-4 col-sm-2">
            <?php echo $form->textField($model,'sizeY',array('class'=>'form-control')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->label($model,'sizeZ',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
        <div class="col-xs-4 col-sm-2">
            <?php echo $form->textField($model,'sizeZ',array('class'=>'form-control')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->label($model,'weight',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
        <div class="col-xs-4 col-sm-2">
            <?php echo $form->textField($model,'weight',array('class'=>'form-control')); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo CHtml::submitButton('Поиск',array('class'=>'btn btn-primary col-xs-4')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->