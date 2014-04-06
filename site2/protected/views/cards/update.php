<?php
/* @var $this CardsController */
/* @var $model Cards */

$this->layout='//layouts/admin';
$this->menu_selector = 'cards';
$this->breadcrumbs=array(
	'Открытки'=>array('admin'),
	$model->name=>array('view','id'=>$model->ID),
	'Редактирование',
);

/*
$this->menu=array(
	array('label'=>'List Cards', 'url'=>array('index')),
	array('label'=>'Create Cards', 'url'=>array('create')),
	array('label'=>'View Cards', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Cards', 'url'=>array('admin')),
);*/
?>

<div class="panel panel-info">
    <div class="panel-heading">
        <div class="panel-title">
            <div class="row">
                <div class="col-xs-4">
                    <h4>Редактирование открытки</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
    <div class="panel-footer"></div>
</div>