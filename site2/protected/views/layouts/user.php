<?php $this->beginContent('//layouts/main'); ?>
    <div class="container-fluid">
        <div class="row">
            <div id="menu" class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                <p>Категории:</p>
                <ul class="ul-treefree ul-dropfree">
<?php

function print_tree($tags){
    foreach($tags as $tag){
        echo "<li>".CHtml::link($tag->name,array('/tags/view','id'=>$tag->ID));

        if (count($tag->tags)){
            echo "\n<ul>\n";
            print_tree($tag->tags);
            echo "</ul>\n";
        }

        echo "</li>\n";
    }
}
print_tree(array_filter(Tags::model()->findAll(), function ($tag){ return !isset($tag->parent); }));

?>
                </ul>
                <div class="row">
                    <?php echo CHtml::link('Все открытки',
                        array('/cards/index'),
                        array('class'=>'btn btn-xs btn-default col-xs-8 col-xs-offset-1')); ?>
                </div>
                <div class="row">
                    <?php echo CHtml::link('Поиск открыток',
                        array('/cards/search'),
                        array('class'=>'btn btn-xs btn-default col-xs-8 col-xs-offset-1')); ?>
                </div>
            </div>
            <div id="content" class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
                <!-- breadcrumbs -->
                <?php if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('TbBreadcrumbs', array(
                        'links'=>$this->breadcrumbs,
                    )); ?>
                <?php endif?>
                <!-- end breadcrumbs -->

                <?php echo $content; ?>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>