<?php
/* @var $this CardsController */
/* @var $dataProvider CActiveDataProvider */

$this->layout='//layouts/admin';
$this->menu_selector='cards';
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
<div class="col-md-10">
<div class="panel panel-info">
    <div class="panel-heading">
        <div class="panel-title">
            <div class="row">
                <div class="col-xs-4">
                    <h4>Открытки:</h4>
                </div>
                <div class="pull-right">
                    <a href="#" class="btn btn-sm btn-default">Выбрать категории</a>
                    <?php echo CHtml::link('Поиск', array('/cards/admin___'), array('class'=>'btn btn-sm btn-default')); ?>
                    <?php echo CHtml::link('<span class="glyphicon glyphicon-plus"></span> Создать',
                        array('/cards/create'), array('class'=>'btn btn-primary')); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
<?php
$first = false;
foreach($dataProvider->data as $card){
    if ($first) $first=false; else echo "<hr />\n";

    $pix = Yii::app()->params['default_pix'];
    if (count($card->yiiPixes)) $pix = $card->yiiPixes[0]->path;
    ?>
    <div class="row">
        <div class="col-xs-3">
            <?php
            $img = CHtml::image($pix, $card->name, array('class' => 'img-responsive prev_pix'));
            echo CHtml::link($img, array('/cards/update','id'=>$card->ID));
            ?>
        </div>
        <div class="col-xs-9">
            <h4 class="product-name"><strong><?php echo $card->name; ?></strong></h4>
            <h4><small><?php echo $card->description; ?></small></h4>
            <p><span class="label label-info"><?php echo $card->price; ?> р.</span></p>
            <?php
            echo CHtml::link('<span class="glyphicon glyphicon-pencil"></span> Редактировать',
                array('/cards/update','id'=>$card->ID),
                array('class' => 'btn btn-primary btn-xs'));
            echo ' ';
            echo CHtml::link('<span class="glyphicon glyphicon-trash"></span>',
                '#',
                array('class' => 'btn btn-danger btn-xs',
                    'submit'=>array('delete','id'=>$card->ID),
                    'confirm'=>'Вы уверены что хотите удалить открытку "'.$card->name.'"?'));
            ?>
        </div>
    </div>
<?php
}
?>
    </div>
    <div class="panel-footer"></div>
</div>
</div>