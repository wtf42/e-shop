<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */

$this->layout='//layouts/user';
$this->breadcrumbs=array(
	'Новости',
);

/*
$this->menu=array(
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
*/
?>

<h3>Новости:</h3>

<?php

if (!isset($data)) $data = $dataProvider->data;

$first = true;
foreach($data as $news){
    if ($news->visible == 0) continue;
    if ($first) $first = false; else echo "<hr />\n";
    $this->renderPartial('//news/_view',array('news'=>$news));
}
?>
