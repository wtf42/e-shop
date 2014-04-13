<?php
/* @var $this ScartController */

$this->layout='//layouts/user';
$this->breadcrumbs=array(
	'Корзина'
);
?>

<div class="panel panel-info">
    <div class="panel-heading">
        <div class="panel-title">
            <div class="row">
                <div class="col-xs-8">
                    <h5><span class="glyphicon glyphicon-shopping-cart"></span> Корзина</h5>
                </div>
                <div class="col-xs-4">
                    <?php echo CHtml::link('<span class="glyphicon glyphicon-share-alt"></span> Продолжить покупки',
                        array('/cards/index'),
                        array('class'=>'btn btn-primary btn-sm btn-block')); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <?php
        $scart = Yii::app()->session['scart'];
        if (count($scart) == 0)
            echo '<p>Корзина пуста!</p>';
        $first = true;
        foreach($scart as $cardID=>$count){
            if ($first) $first = false; else echo "<hr />\n";
            $card=Cards::model()->findByPk($cardID);
            if ($card == null) continue;

            $pix = Yii::app()->params['default_pix'];
            if (strlen($card->pix)) $pix = Yii::app()->params['images_public_dir'] . $card->pix;
            ?>
            <div class="row">
                <div class="col-xs-2">
                    <div class="thumbnail">
                    <?php echo CHtml::link(
                        CHtml::image($pix, $card->name,
                            array(
                                //"width"=>"150px","height"=>"100px"
                            )),
                        array('/cards/view','id'=>$card->ID),
                        array('class'=>'img-responsive')); ?>
                    </div>
                </div>
                <div class="col-xs-4">
                    <h4 class="product-name"><strong><?php echo $card->name; ?></strong></h4>
                    <h4><small><?php echo $card->description; ?></small></h4>
                </div>
                <div class="col-xs-6">
                    <div class="col-xs-6 text-right">
                        <h6><strong><?php echo $card->price; ?> р. <span class="text-muted">x</span></strong></h6>
                    </div>
                    <div class="col-xs-4">
                        <input type="text" class="form-control input-sm purchase_items"
                               cid="<?php echo $card->ID; ?>"
                               price="<?php echo $card->price; ?>"
                               value="<?php echo $count; ?>">
                    </div>
                    <div class="col-xs-2">
                        <a href="#" cid="<?php echo $card->ID; ?>"
                           class="scart_del btn btn-link btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="panel-footer">
        <div class="row text-center">
            <div class="col-xs-9">
                <h4 class="text-right">Итого: <strong id="sum">0</strong> р.</h4>
            </div>
            <div class="col-xs-3">
                <?php echo CHtml::link('Оформить заказ',array('users/buy'),
                    array('class'=>'btn btn-success btn-block')); ?>
            </div>
        </div>
    </div>
</div>

<!-- Yii::app()->clientScript->registerScript -->

<script>
    $("input.purchase_items").TouchSpin({
        min: 0,
        max: 100,
        step: 1,
        postfix: "шт"
    });

    var update_sum = function(){
        var all_sum = 0;
        $(".purchase_items").each(function(){
            //var cid = $(this).attr("cid");
            var price = $(this).attr("price");
            var cnt = $(this).val();
            all_sum += price*cnt;
        });
        $("#sum").html(all_sum);
    };

    update_sum();

    $("input.purchase_items").change(function(){
        var cid = $(this).attr("cid");
        var val = $(this).val();
        update_sum();
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->createUrl('/scart/update'); ?>",
            data: { id: cid, cnt: val},
            success: function (data, textStatus) {
                $.jGrowl(data);
            },
            error: function (data, textStatus) {
                $.jGrowl("ошибка: "+textStatus);
            }
        });
    });
    $(".scart_del").click(function(){
        var cid = $(this).attr('cid');
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->createUrl('/scart/delete'); ?>",
            data: { id: cid},
            success: function (data, textStatus) {
                $(".scart_del[cid="+cid+"]").parent().parent().parent().remove();
                $.jGrowl(data);
            },
            error: function (data, textStatus) {
                $.jGrowl("ошибка: "+textStatus);
            }
        });
        return false;
    });
</script>