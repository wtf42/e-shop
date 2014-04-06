<?php
/* @var $this UsersController */
/* @var $model Users */

$this->layout = '//layouts/admin2';
$this->menu_selector = 'users';
$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Управление пользователями</h3>

<p>
    Можно использовать операторы (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) в начале кажого значения для поиска
</p>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID',
		'token',
		'FIO',
		'address',
		'mail',
		'phone',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
