<?php
class NightsWatch implements IFighter
{
    private $soldat = array();
    public function recruit($some)
    {
        $this->soldat[] = $some;
    }
    function fight()
    {
        foreach ($this->soldat as $some) {
            if (method_exists(get_class($some), 'fight'))
                $some->fight();
        }
    }
}