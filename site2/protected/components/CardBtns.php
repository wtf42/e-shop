<?php

class CardBtns extends CWidget {
    public $id = null;

    public function run() {
        echo CHtml::link('Купить!', array('scart/buy','id'=>$this->id),array('class'=>'btn btn-primary'));
        echo ' ';
        echo CHtml::link('В корзину',
            '#',
            array(
                'ajax'=>array(
                    'type'=>'POST',
                    'url'=>Yii::app()->createUrl('scart/add'),
                    'data' => array(
                        //'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken,
                        'id'=>$this->id,
                    ),
                    'success'=>'function(data) { $.jGrowl(data); }',
                    'error'=>'function(data, textStatus) { $.jGrowl("ошибка: "+data); }',
                ),
                'class'=>'btn btn-default',
            ));
    }
}
?>