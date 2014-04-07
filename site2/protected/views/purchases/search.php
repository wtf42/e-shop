<?php
/* @var $this PurchasesController */
/* @var $model Purchases */

$this->layout='//layouts/admin';
$this->menu_selector='purchases';
$this->breadcrumbs=array(
	'Покупки'=>array('admin'),
	'Поиск',
);

$this->menu=array(
	array('label'=>'List Purchases', 'url'=>array('index')),
	array('label'=>'Create Purchases', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#purchases-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Управление покупками</h3>

<p>
    Можно использовать операторы (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) в начале кажого значения для поиска
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'purchases-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID',
		'userID',
		'userComment',
		'date',
		'paymentState',
		'deliveryState',
		'marker',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
