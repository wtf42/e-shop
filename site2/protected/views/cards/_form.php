<?php
/* @var $this CardsController */
/* @var $model Cards */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cards-form',
    'htmlOptions'=>array('class'=>'form-horizontal'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="alert alert-warning">Поля с <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
		<div class="col-sm-8">
			<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'description',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
		<div class="col-sm-8">
            <?php echo CHtml::activeTextArea($model,'description',array('rows'=>3, 'cols'=>50, 'class'=>'form-control')); ?>
			<?php //echo $form->textField($model,'description',array('size'=>60,'maxlength'=>1000, 'class'=>'form-control')); ?>
			<?php echo $form->error($model,'description'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'producerID',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
		<div class="col-xs-8 col-sm-6">
            <?php
            $producers = Producers::model()->findAll();
            $list = CHtml::listData($producers, 'ID', 'name');
            echo $form->dropDownList($model,'producerID', $list,
                array('prompt'=>'Выберите производителя...','class'=>'form-control'));
            ?>
			<?php echo $form->error($model,'producerID'); ?>
		</div>
        <div class="col-xs-1">
            <?php echo CHtml::link('<span class="glyphicon glyphicon-pencil"></span>...',
                array('/producers/admin'), array('class'=>'btn btn-sm btn-default colorbox'));

            $colorbox = $this->widget('application.extensions.colorpowered.JColorBox');
            $colorbox->addInstance('.colorbox', array('iframe'=>true, 'height'=>'90%', 'width'=>'90%'));
            ?>
        </div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'price',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
		<div class="col-xs-4 col-sm-2">
			<?php echo $form->textField($model,'price',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'price'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'sizeX',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
		<div class="col-xs-4 col-sm-2">
			<?php echo $form->textField($model,'sizeX',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'sizeX'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'sizeY',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
		<div class="col-xs-4 col-sm-2">
			<?php echo $form->textField($model,'sizeY',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'sizeY'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'sizeZ',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
		<div class="col-xs-4 col-sm-2">
			<?php echo $form->textField($model,'sizeZ',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'sizeZ'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'weight',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
		<div class="col-xs-4 col-sm-2">
			<?php echo $form->textField($model,'weight',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'weight'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',
                array('class'=>'btn btn-primary col-xs-4')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
