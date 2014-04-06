<?php

$this->beginContent('//layouts/user');

$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
//$cs->registerScriptFile($baseUrl.'/js/yourscript.js');
//$cs->registerCssFile($baseUrl.'/css/screen.css');
//$cs->registerCssFile($baseUrl.'/css/print.css');
//$cs->registerCssFile($baseUrl.'/css/main.css');
$cs->registerCssFile($baseUrl.'/css/form.css');

echo $content;

$this->endContent();
?>