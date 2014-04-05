<?php
/* @var $this EShopController */

$this->pageTitle=Yii::app()->name;
?>
<!--
<h1>It works!</h1>
-->
<?php

$news = News::model()->findAll();
$this->renderPartial('//news/index',array('data'=>$news));

?>