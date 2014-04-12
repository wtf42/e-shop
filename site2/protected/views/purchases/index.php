<?php
/* @var $this PurchasesController */
/* @var $dataProvider CActiveDataProvider */

$this->layout='//layouts/user';
$this->breadcrumbs=array(
	'Мои покупки',
);

?>

<div class="panel panel-info">
    <div class="panel-heading">
        <div class="panel-title">
            <div class="row">
                <div class="col-xs-4">
                    <h4>Мои покупки:</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <?php
        $first = true;
        foreach($dataProvider->data as $purchase){
            if ($first) $first = false; else echo "<hr />\n";
            ?>
            <div class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Комментарий к покупке:</label>
                    <div class="col-sm-8">
                        <div class="pull-right label label-info">
                            <small><span  class="glyphicon glyphicon-calendar"></span> <?php
                                echo date("j F Y, G:i",strtotime($purchase->date)); ?></small>
                        </div>
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
                    <label class="col-sm-2 control-label">Статус оплаты:</label>
                    <div class="col-sm-8">
                        <div class="">
                            <?php
                            $pstates=$this->payment_states;
                            $text = array_key_exists($purchase->paymentState,$pstates) ?
                                $pstates[$purchase->paymentState] :
                                'ошибка: неизвестное состояние';
                            echo $text.' ';
                            if ($purchase->paymentState !== 'end')
                                echo CHtml::link('оплатить',
                                    array('/purchases/pay_begin','id'=>$purchase->ID),
                                    array('class' => 'btn btn-primary btn-xs'));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Статус доставки:</label>
                    <div class="col-sm-8">
                        <div class="">
                            <?php
                            $dstates=$this->delivery_states;
                            $text = array_key_exists($purchase->deliveryState,$dstates) ?
                                $dstates[$purchase->deliveryState] :
                                'ошибка: неизвестное состояние';
                            echo $text;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="panel-footer"></div>
</div>