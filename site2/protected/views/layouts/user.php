<?php $this->beginContent('//layouts/main'); ?>
    <div class="container-fluid">
        <div class="row">
            <div id="menu" class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                <ul class="ul-treefree ul-dropfree">
                    <li class="nav-header">Категории товаров</li>
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">ручной работы</a></li>
                    <hr />
                    <li>
                        <a href="#">Для праздников</a>
                        <ul class="">
                            <li><a href="#">новый год</a></li>
                            <li><a href="#">23 февраля</a></li>
                            <li><a href="#">8 марта</a></li>
                            <li><a href="#">день рождения</a></li>
                        </ul>
                    </li>
                    <li><a href="#">с украшениями</a></li>
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