<?php
class UnholyFactory {
    protected $_class = array();
    public function absorb($obj) {
        if (is_a($obj, "Fighter") && isset($obj->name))
        {
            if ((isset($this->_class[$obj->name])) === FALSE)
            {
                echo "(Factory absorbed a fighter of type " . $obj->name . ")" . PHP_EOL;
                $this->_class[$obj->name] = $obj;
            }
            else
                echo "(Factory already absorbed a fighter of type " . $obj->name . ")" . PHP_EOL;
        }
        else
            echo "(Factory can't absorb this, it's not a fighter)" . PHP_EOL;
    }
    public function fabricate($obj1) {
        if ((isset($this->_class[$obj1])) === FALSE)
        {
            echo "(Factory hasn't absorbed any fighter of type " . $obj1 . ")" . PHP_EOL;
            return (NULL);
        }
        else
        {
            echo "(Factory fabricates a fighter of type " . $obj1 . ")" . PHP_EOL;
            return ($this->_class[$obj1]);
        }
    }
}
?>
