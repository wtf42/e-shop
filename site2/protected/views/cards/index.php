<?php
/* @var $this TagsController */
/* @var $model Tags */

$this->layout='//layouts/user';

$this->breadcrumbs=array(
    'Открытки'
);

?>

<?php
$this->widget('CardsList', array(
    'Cards'=>$dataProvider->data,
));
?>
