<?php
/* @var $this UsersController */
/* @var $user Users */

$this->layout='//layouts/user';
$this->breadcrumbs=array(
    'Покупки'=>array('index'),
    'Оформление',
    'Контактные данные',
);


?>

<div class="panel panel-info">
    <div class="panel-heading">
        <h5>Контактные данные:</h5>
    </div>
    <div class="panel-body">
        <?php $this->renderPartial('_form',
            array('model'=>$user,
                'submit_text'=>Yii::app()->user->isGuest?'Зарегистрироваться и продолжить':'Обновить данные и продолжить',
                'submit_style'=>'btn btn-success col-xs-6')); ?>
    </div>
</div>