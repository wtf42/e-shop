<?php
/* @var $this CardsController */
/* @var $dataProvider CActiveDataProvider */

$this->layout='//layouts/admin';
$this->menu_selector='purchases';

$this->breadcrumbs=array(
	'Покупки',
);

?>
<div class="panel panel-info">
    <div class="panel-heading">
        <div class="panel-title">
            <div class="row">
                <div class="col-xs-4">
                    <h4>Актуальные покупки:</h4>
                </div>
                <div class="pull-right">
                    <?php echo CHtml::link('Поиск', array('/purchases/search'), array('class'=>'btn btn-sm btn-default')); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <?php
        $first = true;
        foreach($purchases as $purchase){
            if ($first) $first = false; else echo "<hr />\n";
            ?>

            <div class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Пользователь:</label>
                    <div class="col-sm-10">
                        <div class="pull-right label label-info">
                            <small><span  class="glyphicon glyphicon-calendar"></span> <?php
                                echo date("j F Y, G:i",strtotime($purchase->date)); ?></small>
                        </div>
                        <div class=""><?php echo CHtml::encode($purchase->user->FIO); ?></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Комментарий к покупке:</label>
                    <div class="col-sm-8">
                        <div class=""><?php echo CHtml::encode($purchase->userComment); ?></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Товары:</label>
                    <div class="col-sm-8">
                        <?php
                        $items = array();
                        foreach($purchase->yiiCards as $card){
                            $item = PurchaseItems::model()->findByPk(array('purchaseID'=>$purchase->ID,'cardID'=>$card->ID));
                            array_push($items,array($card,$item->count));
                        }
                        $this->widget('PurchasesList', array(
                            'items'=>$items,
                            'empty_message'=>'Товаров нет! о_О',
                        ));
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?php echo CHtml::link('<span class="glyphicon glyphicon-pencil"></span> Редактировать',
                            array('/purchases/update','id'=>$purchase->ID),
                            array('class' => 'btn btn-primary btn-xs')); ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="panel-footer"></div>
</div>