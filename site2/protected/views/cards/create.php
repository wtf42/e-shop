<?php
/* @var $this CardsController */
/* @var $model Cards */

$this->layout='//layouts/admin';
$this->menu_selector = 'cards';
$this->breadcrumbs=array(
	'Открытки'=>array('admin'),
	'Добавить',
);

/*
$this->menu=array(
	array('label'=>'List Cards', 'url'=>array('index')),
	array('label'=>'Manage Cards', 'url'=>array('admin')),
);*/
?>

<div class="panel panel-info">
    <div class="panel-heading">
        <div class="panel-title">
            <div class="row">
                <div class="col-xs-4">
                    <h4>Добавить открытку</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
    <div class="panel-footer"></div>
</div>
