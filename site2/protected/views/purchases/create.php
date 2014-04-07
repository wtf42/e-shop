<?php
/* @var $this PurchasesController */
/* @var $model Purchases */

$this->layout='//layouts/user';
$this->breadcrumbs=array(
	'Покупки'=>array('index'),
	'Оформление заказа',
);


//сюда еще панель с этапами работы (оформление -> оплата -> доставка)

?>
<div class="">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h5>Товары в корзине:</h5>
        </div>
        <div class="panel-body">
            <?php

            $items = array();
            foreach($scart as $cardID=>$count){
                $card=Cards::model()->findByPk($cardID);
                //array_push($items,array($card=>$count));
                array_push($items,array($card,$count));
            }
            $this->widget('PurchasesList', array(
                'items'=>$items,
                'empty_message'=>'Корзина пуста!',
            ));

            ?>
            </ul>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-xs-2 col-xs-offset-9 text-right">
                    <h5>Итого: <strong id="sum"><?php echo $sum; ?></strong> р.</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h5>Контактные данные:</h5>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-3 text-right">
                    <h5><stong>ФИО: </stong></h5>
                </div>
                <div class="col-xs-8">
                    <h5><?php echo $user->FIO; ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3 text-right">
                    <h5><stong>Адрес доставки: </stong></h5>
                </div>
                <div class="col-xs-8">
                    <h5><?php echo $user->address; ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3 text-right">
                    <h5><stong>Почта: </stong></h5>
                </div>
                <div class="col-xs-8">
                    <h5><?php echo $user->mail; ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3 text-right">
                    <h5><stong>Телефон для связи: </stong></h5>
                </div>
                <div class="col-xs-8">
                    <h5><?php echo $user->phone; ?></h5>
                </div>
            </div>
        </div>
        <div class="panel-footer">
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'purchases-form',
                'htmlOptions'=>array('class'=>'form-horizontal'),
                'enableAjaxValidation'=>false,
            )); ?>
            <div class="form-group">
                <?php echo $form->errorSummary($model); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model,'userComment',array('class'=>'col-sm-3 control-label')); ?>
                <div class="col-sm-9">
                    <?php echo $form->textField($model,'userComment',array('size'=>60,'maxlength'=>500, 'class'=>'form-control')); ?>
                    <?php echo $form->error($model,'userComment'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <?php echo CHtml::submitButton('Подтвердить покупку', array('class'=>'btn btn-success btn-block')); ?>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
        <div class="panel-footer">
        </div>
    </div>
</div>