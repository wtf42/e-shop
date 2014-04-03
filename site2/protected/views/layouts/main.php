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
                    <img src="/_/img/150x70.svg" class="img-responsive" style="position:relative;top:10px">
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
                            <li><a href="#">оплата</a></li>
                            <li><a href="#">доставка</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><?php echo CHtml::link('Админка',array('/eshop/page','view'=>'admin')); ?></li>
                        </ul>
                    </li>
                </ul>
                <!-- зависит уже от пользователя/админа -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- корзина <i class="glyphicon glyphicon-shopping-cart img-responsive"></i> -->
                    <li><img src="/_/img/32x32.svg" class="img-responsive" style="position:relative;top:10px;"></li>
                    <li>
                        <p class="navbar-text">
                            <a href="/scart/view" class="navbar-link">Корзина</a>
                            <br />
                            <a href="#" class="navbar-link jslink">товары</a>: X шт
                        </p>
                    </li>
                    <!-- авторизация -->
                    <li><a href="#">вход</a></li>
                    <li><a href="#">регистрация</a></li>
                    <!-- <a href="#">личный кабинет</a> -->
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
<!--
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div>
-->


</body>
</html>
