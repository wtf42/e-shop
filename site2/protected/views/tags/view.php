<?php
/* @var $this TagsController */
/* @var $model Tags */

$this->layout='//layouts/user';

$this->breadcrumbs=array();

array_push($this->breadcrumbs, $model->name);
$bc_tag = $model;
while(isset($bc_tag->parentTag)){
    $bc_tag = $bc_tag->parentTag;
    $this->breadcrumbs[$bc_tag->name] = array('view','id'=>$bc_tag->ID);
}
$this->breadcrumbs['Категории']=array('index');
$this->breadcrumbs = array_reverse($this->breadcrumbs);


/*
$this->menu=array(
	array('label'=>'List Tags', 'url'=>array('index')),
	array('label'=>'Create Tags', 'url'=>array('create')),
	array('label'=>'Update Tags', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Tags', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tags', 'url'=>array('admin')),
);*/
?>
<?php
if (count($model->subtags)){
    echo 'Подкатегории: ';
    $this->widget('TagsList', array(
        'Tags'=>$model->subtags,
    ));
    echo '<hr />';
}
?>

<?php
$this->widget('CardsList', array(
    'Cards'=>$model->yiiCards,
));
?>
