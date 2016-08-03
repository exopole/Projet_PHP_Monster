<?php

class Monster
{

    /**
     * Identifiant of the monster
     *
     * @var int
     */
    protected $id;
    /**
     * Name of the monster
     *
     * @var string
     */
    protected $name;
    /**
     * @var int (0-10) || NULL
     */
    protected $rate;
    /**
     *
     *
     * @var string || null
     */
    protected $type;

    /**
     * Monster constructor.
     * @param $data : array with id, name, type, and rate as key
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
     * @return int id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int : $id
     */
    public function setId($id)
    {
        $this->id = (int) $id;
    }

    /**
     * @return String name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param String : $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int || null
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param int || null : $rate
     */
    public function setRate($rate)
    {
        if ($rate == NULL || ($rate >=1 && $rate <= 10))
            $this->rate = $rate;
        elseif ($rate >10)
            $this->rate = 10;
        else
            $rate = NULL;

    }

    /**
     * @return int : type
     */
    public function getType()
    {
        return $this->type;
    }



}