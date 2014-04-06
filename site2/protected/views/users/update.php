<?php
/* @var $this UsersController */
/* @var $model Users */

$this->layout = '//layouts/admin2';
$this->menu_selector = 'users';
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>Update Users <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'submit_text'=>'Обновить','submit_style'=>'btn btn-primary')); ?>