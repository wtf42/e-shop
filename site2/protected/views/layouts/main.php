<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />

    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/_/css/bootstrap.css"  type="text/css"/>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/_/css/bootstrap-theme.css"  type="text/css"/>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/_/js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/_/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/_/css/main.css" type="text/css"/>

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/_/js/bootstrap.touchspin.js"></script>

    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/_/css/jquery.jgrowl.css" type="text/css"/>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/_/js/jquery.jgrowl.js"></script>

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/_/js/main.js"></script>
    <!--
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
-->
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div id="header">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?php echo Yii::app()->createUrl('eshop/index'); ?>">
                    <img src="/_/img/logo.png" class="img-responsive" style="position:relative;top:2px">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="col-sm-1 col-md-2 col-lg-3"></div>
                <ul class="nav navbar-nav">
                    <li><p class="navbar-text"><i class="glyphicon glyphicon-earphone"></i> <?php echo Yii::app()->params['phone']; ?></p></li>
                    <li><?php echo CHtml::link('Помощь',array('/eshop/page','view'=>'about')); ?></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">о магазине <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?php echo CHtml::link('Оплата',array('/eshop/page','view'=>'payment')); ?></li>
                            <li><?php echo CHtml::link('Доставка',array('/eshop/page','view'=>'delivery')); ?></li>
                            <li class="divider"></li>
                            <li><?php echo CHtml::link('Псевдо-почта',array('/users/email')); ?></li>
                            <li><?php //echo CHtml::link('Админка',array('/eshop/page','view'=>'admin')); ?></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><img src="/_/img/cart.png" class="img-responsive" style="position:relative;top:10px;"></li>
                    <li>
                        <p class="navbar-text">
                            <a href="/scart/view" class="navbar-link">Корзина</a>
                            <br />
                            <a href="#" class="navbar-link jslink">товары</a>: X шт
                        </p>
                    </li>
                    <?php
                    if (Yii::app()->user->isGuest){
                        echo "<li>".CHtml::link('Вход',array('/eshop/login'))."</li>\n";
                    }else if (Yii::app()->user->getId() == 1){
                        echo "<li>".CHtml::link('Админка',array('/eshop/page','view'=>'admin'))."</li>\n";
                    }else{
                        echo "<li>".CHtml::link('Мои покупки',array('/purchases/index'))."</li>\n";
                    }
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>

<div id="page1">
    <?php echo $content; ?>
</div>
<div class="clearfix"></div>
<div id="footer">
    <hr />
    <p>&copy; geka666, <?php echo date('Y'); ?></p>
</div>


<div id="errors"></div>


</body>
</html>
