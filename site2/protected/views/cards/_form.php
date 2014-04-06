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

<?php echo $form->errorSummary($model); ?>

<div class="form-group">
    <?php echo $form->label($model,'name',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
    <div class="col-sm-8">
        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200, 'class'=>'form-control')); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->label($model,'description',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
    <div class="col-sm-8">
        <?php echo CHtml::activeTextArea($model,'description',array('rows'=>3, 'cols'=>50, 'class'=>'form-control')); ?>
        <?php //echo $form->textField($model,'description',array('size'=>60,'maxlength'=>1000, 'class'=>'form-control')); ?>
        <?php echo $form->error($model,'description'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->label($model,'producer.name',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
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
    <?php echo $form->label($model,'price',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
    <div class="col-xs-4 col-sm-2">
        <?php echo $form->textField($model,'price',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'price'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->label($model,'sizeX',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
    <div class="col-xs-4 col-sm-2">
        <?php echo $form->textField($model,'sizeX',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'sizeX'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->label($model,'sizeY',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
    <div class="col-xs-4 col-sm-2">
        <?php echo $form->textField($model,'sizeY',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'sizeY'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->label($model,'sizeZ',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
    <div class="col-xs-4 col-sm-2">
        <?php echo $form->textField($model,'sizeZ',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'sizeZ'); ?>
    </div>
</div>

<div class="form-group">
    <?php echo $form->label($model,'weight',array('class'=>'col-xs-3 col-md-2 control-label')); ?>
    <div class="col-xs-4 col-sm-2">
        <?php echo $form->textField($model,'weight',array('class'=>'form-control')); ?>
        <?php echo $form->error($model,'weight'); ?>
    </div>
</div>

<?php if (!$model->isNewRecord){ ?>
<div class="form-group">
    <label class="col-xs-3 col-md-2 control-label">Категории</label>
    <div class="col-xs-8 col-sm-4">
        <ul class="list-unstyled" id="tag_list">
        <?php
        foreach($model->yiiTags as $tag){
            echo '<li>'.CHtml::link($tag->name.' <span class="glyphicon glyphicon-trash"></span>','#',
                array('class'=>'btn btn-xs btn-default tag_delete','tid'=>$tag->ID,'cid'=>$model->ID)).'</li>';
        }
        ?>
        </ul>
        <div class="clearfix"></div>
        <div class="btn-group dropup">
            <button type="button" class="btn btn-info btn-xs">добавить категорию</button>
            <button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" id="all_tags_btn">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <?php
                $tags = Tags::model()->findAll();
                foreach($tags as $tag){
                    echo '<li>'.CHtml::link($tag->name,'#',array('class'=>'tag_add','tid'=>$tag->ID,'cid'=>$model->ID)).'</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<?php } ?>
<hr />
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',
            array('class'=>'btn btn-primary col-xs-4')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>

<script>
    var del_clicker=function(){
        var cid = $(this).attr('cid');
        var tid = $(this).attr('tid');
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->createUrl('/cards/tag_delete'); ?>",
            data: { id: cid, tag: tid},
            success: function (data, textStatus) {
                $(".tag_delete[tid="+tid+"]").parent().remove();
                $.jGrowl(data);
            },
            error: function (data, textStatus) {
                $.jGrowl("ошибка: "+textStatus);
            }
        });
        return false;
    };
    var add_clicker=function(){
        var cid = $(this).attr('cid');
        var tid = $(this).attr('tid');
        var name = $(this).html();
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->createUrl('/cards/tag_add'); ?>",
            data: { id: cid, tag: tid},
            success: function (data, textStatus) {
                var text = '<li><a href="#" class="btn btn-xs btn-default tag_delete" cid='+cid+' tid='+tid+'>'+
                    name+' <span class="glyphicon glyphicon-trash"></span></a></li>';
                $("#tag_list").prepend(text);
                $(".tag_delete[tid="+tid+"]").click(del_clicker);
                $("#all_tags_btn").click();

                $.jGrowl(data);
            },
            error: function (data, textStatus) {
                $.jGrowl("ошибка: "+textStatus);
            }
        });
        return false;
    };
    $(".tag_delete").click(del_clicker);
    $(".tag_add").click(add_clicker);
</script>