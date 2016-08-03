<?php

class Fozzie extends Monster
{

    /**
     * @var string
     */
    protected $type = 'Frozzie';

    /**
     * Fozzie constructor.
     * @param $data
     */
    public function __construct($data)
    {
        foreach($data as $field => $value)
        {
            $method = 'set'.ucfirst($field);

            if(method_exists($this, $method))
                $this->$method($value);
        }
    }

    /**
     * decrease the rate by 1
     */
    public function jump(){
        if ($this->getRate() >= 1)
            $this->rate -=1;
    }
}