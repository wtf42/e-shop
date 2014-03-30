<?php
/* @var $this CardsController */
/* @var $dataProvider CActiveDataProvider */

$this->layout='//layouts/admin';
$this->menu_selector='news';
/*
$this->breadcrumbs=array(
	'Cards',
);

$this->menu=array(
	array('label'=>'Create Cards', 'url'=>array('create')),
	array('label'=>'Manage Cards', 'url'=>array('admin')),
);
*/
/*
$this->widget('CardsList', array(
    'Cards'=>$dataProvider->data,
));
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
*/

?>
<div class="panel panel-info">
    <div class="panel-heading">
        <div class="panel-title">
            <div class="row">
                <div class="col-xs-4">
                    <h4>Новости:</h4>
                </div>
                <div class="pull-right">
                    <?php echo CHtml::link('Поиск', array('/news/search'), array('class'=>'btn btn-sm btn-default')); ?>
                    <?php echo CHtml::link('<span class="glyphicon glyphicon-plus"></span> Создать',
                        array('/news/create'), array('class'=>'btn btn-primary')); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <?php
        foreach($dataProvider->data as $news){
            ?>

            <div class="media">
                <?php echo CHtml::link(CHtml::image($news->pix, $news->header, array('class' => 'media-object')),
                    array('/news/update','id'=>$news->ID), array('class'=>'pull-left')); ?>

                <div class="media-body">
                    <h4 class="media-heading">
                        <?php echo CHtml::encode($news->header); ?>
                        <?php if ($news->visible == 0) echo '<small><span class="label label-info">черновик</span></small>'; ?>

                        <div class="pull-right label">
                            <small><span  class="glyphicon glyphicon-calendar"></span> <?php
                                echo date("j F Y, G:i",strtotime($news->date)); ?></small>
                        </div>
                    </h4>
                    <?php echo CHtml::encode($news->text); ?>

                    <div class="clearfix"></div>
                    <?php
                    echo CHtml::link('<span class="glyphicon glyphicon-pencil"></span> Редактировать',
                        array('/news/update','id'=>$news->ID),
                        array('class' => 'btn btn-primary btn-xs'));
                    echo ' ';
                    echo CHtml::link('<span class="glyphicon glyphicon-trash"></span>',
                        '#',
                        array('class' => 'btn btn-danger btn-xs',
                            'submit'=>array('delete','id'=>$news->ID),
                            'confirm'=>'Вы уверены что хотите удалить новость "'.$news->header.'"?'));
                    ?>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="panel-footer"></div>
</div>