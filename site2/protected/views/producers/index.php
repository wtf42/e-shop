<?php
/* @var $this ProducersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Producers',
);

$this->menu=array(
	array('label'=>'Create Producers', 'url'=>array('create')),
	array('label'=>'Manage Producers', 'url'=>array('admin')),
);
?>

<h1>Producers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
