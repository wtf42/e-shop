<?php
/* @var $this CardsController */
/* @var $model Cards */

//$this->layout='//layouts/colorbox';
$this->layout='//layouts/empty';
?>

<div class="panel panel-info">
    <div class="panel-heading">
        <div class="panel-title">
            <div class="row">
                <div class="col-xs-10">
                    <!--
                    <h4>Редактирование картинок к открытке:</h4>
                    <h4><small><?php echo $model->name; ?></small></h4>
                    -->
                    <h4>Загрузка картинок:</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="col-sm-offset-1">
            <?php
            $this->widget('xupload.XUpload', array(
                'url' => Yii::app()->createUrl("eshop/upload"),
                'model' => $pix,
                'attribute' => 'file',
                'multiple' => true,
            ));
            /*$this->widget('xupload.XUpload', array(
                'url' => Yii::app()->createUrl("eshop/upload"),
                'model' => $pix,
                'attribute' => 'file',
                'multiple' => true,

                'options' => array(
                    'beforeReturn'=>'js:function(event, files, index, xhr, handler, callBack) {
                        alert("1");
                    }',
                ),
            ));*/
            ?>
        </div>
    </div>
    <div class="panel-footer"></div>
</div>

<?php
?>