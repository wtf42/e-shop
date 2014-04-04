<?php
/* @var $this UsersController */
/* @var $model Users */

$this->layout='//layouts/user';
$this->breadcrumbs=array(
    'Почта :)'
);

echo '<h4>Собственно почта:</h4>';

if (count($mails) == 0)
    echo "<p><strong>пусто :(</strong></p>";

foreach($mails as $i=>$text){
    echo "<p><strong>$i) </strong>$text</p><hr />";
}

echo CHtml::link('покупать дальше...',$return,array('class'=>'btn btn-default btn-sm'));
echo ' ';
echo CHtml::link('очистить почту',array('email_clr'),array('class'=>'btn btn-default btn-sm'));
?>
