<?php

class CardsList extends CWidget {
	public $Cards = array();

	public function run() {
		foreach($this->Cards as $card){
            $pix = Yii::app()->params['default_pix'];
            if (strlen($card->pix)) $pix = Yii::app()->params['images_public_dir'] . $card->pix;
			?>
                <div class="card_item col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <?php
                        //$img = CHtml::image($pix, $card->name, array('class' => 'thumbnail'));
                        $img = CHtml::image($pix, $card->name);
                        echo CHtml::link($img, array('/cards/view','id'=>$card->ID));
                        ?>

                        <div class="caption">
                            <h3><?php echo CHtml::link($card->name, array('/cards/view','id'=>$card->ID)); ?></h3>
                            <p><?php
                                echo substr($card->description,0,300);
                                if (strlen($card->description) > 300) echo '...';
                                ?>
                            </p>
                            <p><span class="label label-info"><?php echo $card->price; ?> р.</span></p>
                            <p><?php $this->widget('CardBtns', array('id'=>$card->ID));?></p>
                        </div>
                    </div>
                </div>
<?php
		}

        if (count($this->Cards) == 0){
            echo '<p>Здесь пусто, нет ничего вообще.</p>';
        }
	}
}
?>