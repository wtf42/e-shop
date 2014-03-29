<?php

class MyMenuItem extends CWidget {
    public $text = '';
    public $icon = '';
    public $lnk = '/';
    public $name = '';
    public $active = '';

    public function run() {
        if ($this->name === $this->active)
            echo '<li class="active">';
        else
            echo '<li>';
        echo CHtml::link('<i class="glyphicon '.$this->icon.'"></i> '.$this->text,
            $this->lnk,
            array('data-target-id'=>$this->name));
        echo "</li>\n";
    }
}
?>