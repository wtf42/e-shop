<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="media">
    <?php echo CHtml::link(CHtml::image($news->pix, $news->header, array('class' => 'media-object')),
        array('/news/view','id'=>$news->ID), array('class'=>'pull-left')); ?>

    <div class="media-body">
        <h4 class="media-heading">
            <?php echo CHtml::encode($news->header); ?>
            <?php if ($news->visible == 0) echo '<small><span class="label label-info">черновик</span></small>'; ?>

            <div class="pull-right label">
                <small><span  class="glyphicon glyphicon-calendar"></span> <?php
                    echo date("j F Y, G:i",strtotime($news->date)); ?></small>
            </div>
        </h4>
        <?php echo CHtml::encode($news->text); ?>

    </div>
</div>
