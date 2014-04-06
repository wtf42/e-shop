<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="ru" />

    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/_/css/bootstrap.css"  type="text/css"/>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/_/css/bootstrap-theme.css"  type="text/css"/>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/_/js/jquery-2.1.0.min.js"></script>
    <?php Yii::app()->clientScript->scriptMap['jquery.js'] = false; ?>
    <?php //Yii::app()->clientScript->scriptMap['jquery-ui.min.js'] = false; ?>
    <?php //Yii::app()->clientScript->setCoreScriptUrl(_пусть к папке_);  //например, '/js' ?>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/_/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/_/js/bootstrap.touchspin.js"></script>

    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/_/css/jquery.jgrowl.css" type="text/css"/>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/_/js/jquery.jgrowl.js"></script>

    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/_/css/colorbox.css" type="text/css"/>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/_/js/jquery.colorbox.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/_/js/jquery.colorbox-ru.js"></script>

    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/_/css/main.css" type="text/css"/>
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

<div id="content">
    <?php echo $content; ?>
</div>

</body>
</html>