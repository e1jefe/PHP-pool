<?php
abstract class Fighter {
    public $name = "";
    public function __construct($obj1) {
        $this->name = $obj1;
    }
    abstract public function fight($target);
}
?>