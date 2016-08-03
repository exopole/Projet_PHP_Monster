<?php

class Kermit extends Monster
{

    /**
     * @var string
     */
    protected $type = 'Kermit';

    /**
     * Kermit constructor.
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
    public function run(){
        if ($this->getRate() >= 1)
            $this->rate -=1;

    }
}