<?php
/* @var $this TagsController */
/* @var $model Tags */
/* @var $form CActiveForm */

?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tags-form',
    'htmlOptions'=>array('class'=>'form-horizontal'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

    <div class="form-group">
		<?php echo $form->labelEx($model,'name',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
        <div class="col-sm-8">
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200,'class'=>'form-control')); ?>
            <?php echo $form->error($model,'name'); ?>
        </div>
	</div>


    <div class="form-group">
        <?php echo $form->labelEx($model,'parentID',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
        <div class="col-xs-8">
            <?php

            $tags = Tags::model()->findAll();
            $list = CHtml::listData($tags, 'ID', 'name');

            echo $form->dropDownList($model,'parentID',$list,
                array('prompt'=>'без категории родителя','class'=>'form-control'));
            ?>
            <?php echo $form->error($model,'parentID'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',
                array('class'=>'btn btn-primary col-xs-4')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->