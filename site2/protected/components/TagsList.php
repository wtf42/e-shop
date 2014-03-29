<?php

class TagsList extends CWidget {
	public $Tags = array();
	public $delimiter = ', ';

	public function run() {
		$first = true;
		foreach($this->Tags as $tag){
			if ($first) $first = false; else echo $this->delimiter;
			echo CHtml::link($tag->name,array('/tags/view','id'=>$tag->ID));
		}
        /*
        foreach($this->Tags as $tag){
            echo '<span class="label label-info">'.CHtml::link($tag->name,array('/tags/view','id'=>$tag->ID)).'</span> ';
        }
        */
	}
}
?>