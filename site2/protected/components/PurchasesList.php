<?php

class PurchasesList extends CWidget {
    public $items = array();
    public $empty_message = 'Корзина пуста!';

    public function run() {
        if (count($this->items) == 0)
            echo '<p>'.$this->empty_message.'</p>';
        foreach($this->items as $item){
            $card=$item[0]; $count=$item[1];
            ?>
            <div class="row">
                <div class="col-xs-1">
                    <?php echo CHtml::image('/_/img/32x32.svg'); ?>
                </div>
                <div class="col-xs-8">
                    <h5 class="product-name"><?php echo $card->name; ?></h5>
                </div>
                <div class="col-xs-2 text-right">
                    <h6><strong><?php echo $count.'шт x '.$card->price; ?>р.</strong></h6>
                </div>
            </div>
        <?php
        }
    }
}
?>