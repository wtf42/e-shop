<?php $this->beginContent('//layouts/main'); ?>
    <div class="container-fluid">
        <div class="row">
            <div id="menu" class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                <p>Категории:</p>
                <ul class="ul-treefree ul-dropfree">
<?php

$tags=Tags::model()->findAll();
$tmp_tag = null;

function print_tree($all_tags, $tags){
    foreach($tags as $tag){
        echo "<li>".CHtml::link($tag->name,array('/tags/view','id'=>$tag->ID));

        global $tmp_tag; $tmp_tag = $tag;
        $child_tags = array_filter($all_tags, function ($cur_tag){ global $tmp_tag; return isset($cur_tag->parentTag) && $cur_tag->parentTag->ID == $tmp_tag->ID;});
        if (count($child_tags)){
            echo "\n<ul>\n";
            print_tree($all_tags, $child_tags);
            echo "</ul>\n";
        }

        echo "</li>\n";
    }
}

print_tree($tags, array_filter($tags, function ($tag){ return !isset($tag->parentTag); }));

?>
                </ul>
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