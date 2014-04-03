<?php
/* @var $this CardsController */
/* @var $model Cards */

$this->layout='//layouts/admin';
$this->menu_selector='cards';
$this->breadcrumbs=array(
	'Открытки'=>array('admin'),
	'Поиск',
);

/*
$this->menu=array(
	array('label'=>'List Cards', 'url'=>array('index')),
	array('label'=>'Create Cards', 'url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cards-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Поиск открыток</h3>

<p>
Можно использовать операторы (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) в начале кажого значения для поиска
</p>

<?php //echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cards-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		'description',
        array(
            'name'=>'producer.name',
            'filter'=>CHtml::activeTextField($model,'producer_search'),
        ),
		'price',
		'sizeX',
		'sizeY',
		'sizeZ',
        'weight',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
