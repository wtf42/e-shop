<?php
/* @var $this TagsController */
/* @var $dataProvider CActiveDataProvider */

$this->layout='//layouts/user';
$this->menu_selector = 'tags';
$this->breadcrumbs=array(
	'Tags',
);

$this->menu=array(
	array('label'=>'Create Tags', 'url'=>array('create')),
	array('label'=>'Manage Tags', 'url'=>array('admin')),
);
?>

<h1>Tags</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
