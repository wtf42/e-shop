<?php $this->beginContent('//layouts/main'); ?>
    <div class="container-fluid">
        <div class="row">
            <div id="menu" class="col-xs-12 col-sm-3 col-lg-2">
                <ul class="nav nav-pills nav-stacked admin-menu">
<?php
$menu_items = array(
    array(
        'text'=>'Админка',
        'lnk'=>array('/eshop/page','view'=>'admin'),
        'icon'=>'glyphicon-home',
        'name'=>'admin',
        'active'=>$this->menu_selector,
    ),
    array(
        'text'=>'Новости',
        'lnk'=>'/news/admin',
        'icon'=>'glyphicon-comment',
        'name'=>'news',
        'active'=>$this->menu_selector,
    ),
    array(
        'text'=>'Товары',
        'lnk'=>'/cards/admin',
        'icon'=>'glyphicon-list-alt',
        'name'=>'cards',
        'active'=>$this->menu_selector,
    ),
    array(
        'text'=>'Категории',
        'lnk'=>'/tags/admin',
        'icon'=>'glyphicon-tag',
        'name'=>'tags',
        'active'=>$this->menu_selector,
    ),
    array(
        'text'=>'Покупки <span class="badge">42шт</span>',
        'lnk'=>'/purchases/admin',
        'icon'=>'glyphicon-shopping-cart',
        'name'=>'purchases',
        'active'=>$this->menu_selector,
    ),
    array(
        'text'=>'Пользователи',
        'lnk'=>'/users/admin',
        'icon'=>'glyphicon-user',
        'name'=>'users',
        'active'=>$this->menu_selector,
    ),
    /*array(
        'text'=>'Настройки',
        'lnk'=>'/',
        'icon'=>'glyphicon-wrench',
        'name'=>'settings',
        'active'=>$this->menu_selector,
    ),*/
    array(
        'text'=>'Выход',
        'lnk'=>'/site/logout',
        'icon'=>'glyphicon-log-out',
        'name'=>'logout',
        'active'=>$this->menu_selector,
    ),
);
foreach($menu_items as $menu_item)
        $this->widget('MyMenuItem',$menu_item);
?>
                </ul>
            </div>
            <div id="content" class="col-xs-12 col-sm-9 col-lg-10">
                <!-- breadcrumbs --> <?php
                if(isset($this->breadcrumbs))
                    $this->widget('TbBreadcrumbs', array(
                        'links'=>$this->breadcrumbs,
                    ));
                ; ?> <!-- end breadcrumbs -->

                <?php echo $content; ?>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>