<?php
/* @var $this CardsController */
/* @var $model Cards */

$this->layout='//layouts/user';
$this->breadcrumbs=array(
	'Открытки'=>array('index'),
    'Просмотр открытки'
);
/*
$this->admin_menu=array(
	array('label'=>'List Cards', 'url'=>array('index')),
	array('label'=>'Create Cards', 'url'=>array('create')),
	array('label'=>'Update Cards', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Cards', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cards', 'url'=>array('admin')),
);
*/
?>

                <h3><?php echo $model->name; ?></h3>
                <div class="col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-0">
                    <div class="thumbnail">
                        <?php
                        $pix = Yii::app()->params['default_pix'];
                        if (count($model->yiiPixes)) $pix = Yii::app()->params['images_public_dir'] . $model->yiiPixes[0]->path;

                        $img = CHtml::image($pix, $model->name);
                        echo $img;
                        ?>
                        <!--
                        TODO: при клике на картинку открывается галерея просмотра картинок этого товара
                        -->
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <p><?php $this->widget('CardBtns', array('id'=>$model->ID));?>
                    <?php
                    if (!Yii::app()->user->isGuest){
                        $user = Users::model()->findbyPk(Yii::app()->user->getId());
                        if ($user->mail === 'admin'){
                            echo CHtml::link('<span class="glyphicon glyphicon-pencil"></span> Редактировать',
                                array('/cards/update','id'=>$model->ID),
                                array('class' => 'btn btn-danger btn-sm'));
                        }
                    }
                    ?>
                    </p>
                    <div class="fll mlabel">цена:</div>
                    <div class="fll"><?php echo $model->price; ?> р.</div>
                    <div class="clearfix"></div>
                    <div class="fll mlabel">производитель:</div>
                    <div class="fll"><?php echo $model->producer->name; ?></div>
                    <div class="clearfix"></div>
                    <div class="fll mlabel">размер:</div>
                    <div class="fll"><?php echo $model->sizeX.' x '.$model->sizeY.' x '.$model->sizeZ; ?></div>
                    <div class="clearfix"></div>
                    <div class="fll mlabel">вес:</div>
                    <div class="fll"><?php echo $model->weight; ?> гр</div>
                    <div class="clearfix"></div>

                    <div class="fll mlabel">категории:</div>
                    <div class="fll"><?php
                        $this->widget('TagsList', array(
                            'Tags'=>$model->yiiTags,
                        ));
                        ?></div>
                    <div class="clearfix"></div>

                    <div class="fll mlabel">описание:</div>
                    <div class="fll"><?php echo $model->description; ?></div>
                    <div class="clearfix"></div>
                </div>
<div class="clearfix"></div>
<hr />
<div class="row">
    <h3>С этим товаром также покупают:</h3>
</div>
<?php

$recCards = array();
foreach($rec as $cardID){ array_push($recCards,Cards::model()->findByPk($cardID)); }

//print_r($rec);
//print_r($recCards);
$this->widget('CardsList', array('Cards'=>$recCards,));

?>

