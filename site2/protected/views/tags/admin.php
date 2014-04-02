<?php
/* @var $this TagsController */
/* @var $dataProvider CActiveDataProvider */

$this->layout='//layouts/admin';
$this->menu_selector='tags';
/*
$this->breadcrumbs=array(
	'Cards',
);
*/

?>


<h3>Категории:</h3>
<?php

echo CHtml::link('Все категории',array('/tags/index'),array('class'=>'btn btn-xs btn-default'));
echo ' ';
echo CHtml::link('<span class="glyphicon glyphicon-plus"></span> ',
    array('/tags/create','id'=>null),
    array('class' => 'btn btn-default btn-xs colorbox'));

?>
<ul class="ul-treefree ul-dropfree">
<?php

$all_tags=Tags::model()->findAll();

function print_tree($tags){
    foreach($tags as $tag){
        echo "<li>".CHtml::link($tag->name,array('/tags/view','id'=>$tag->ID),array('class'=>'btn btn-xs btn-default')).' ';
        echo CHtml::link('<span class="glyphicon glyphicon-plus"></span> ',
            array('/tags/create','id'=>$tag->ID),
            array('class' => 'btn btn-default btn-xs colorbox'));
        echo ' ';
        echo CHtml::link('<span class="glyphicon glyphicon-pencil"></span> ',
            array('/tags/update','id'=>$tag->ID),
            array('class' => 'btn btn-primary btn-xs colorbox'));
        echo ' ';
        echo CHtml::link('<span class="glyphicon glyphicon-trash"></span>',
            '#',
            array('class' => 'btn btn-danger btn-xs',
                'submit'=>array('delete','id'=>$tag->ID),
                'confirm'=>'Вы уверены что хотите удалить открытку "'.$tag->name.'"?'));

        if (count($tag->tags)){
            echo "\n<ul>\n";
            print_tree($tag->tags);
            echo "</ul>\n";
        }

        echo "</li>\n";
    }
}

print_tree(array_filter($all_tags, function ($tag){ return !isset($tag->parent); }));

?>
</ul>

<?php

$colorbox = $this->widget('application.extensions.colorpowered.JColorBox');
$colorbox->addInstance('.colorbox', array('height'=>'300px', 'width'=>'90%'));

?>

<script>
    $(document).ready(function(){
        $(".drop").trigger('click');
    });
</script>


