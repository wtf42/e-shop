<?php
/* @var $this CardsController */
/* @var $model Cards */

$this->layout='//layouts/user';
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

function is_admin(){
    if (Yii::app()->user->isGuest) return false;
    $userID = Yii::app()->user->getId();
    $user=Users::model()->findByPk($userID);
    return $user->mail === 'admin';
}
$visible_edit = is_admin() ? 'true' : 'false';

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
            'buttons'=>array(
                'view'=>array(
                    'visible'=>'true',
                ),
                'update'=>array(
                    'visible'=>$visible_edit,
                ),
                'delete'=>array(
                    'visible'=>$visible_edit,
                ),
            ),
		),
	),
)); ?>
