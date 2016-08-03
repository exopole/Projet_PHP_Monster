<?php

class Theater
{
    /**
     * number of place available in the theater
     * @var int
     */
    private $place =25;

    /**
     * Store all monsters which have a rate superior at 5
     * @var array
     */
    private $balcony = [];
    /**
     * Store all monsters which have a rate between 0 and 5
     * @var array
     */
    private $parterre = [];

    /**
     * add a monster in the theatre if it's possible
     *
     * @param $monster
     * @throws Exception
     */
    public function add($monster){


        if ($this->place == 0)
            throw new Exception(sprintf('Theatre complet'));

        if ($monster->getRate() == null)
            throw new Exception(sprintf('Impossible de mettre le monstre %s dans le theatre car le rate est null', $monster->getName()));

        if ($monster->getRate() >= 5){
            if (count($this->balcony) < 10)
                $this->balcony[] = $monster;
            else
                throw new Exception(sprintf('Balcony complet'));
        }
        elseif ($monster->getRate() >= 1) {
            if( count($this->parterre) < 15)
                $this->parterre[] = $monster;
            else
                throw new Exception(sprintf('Parterre complet'));
        }

        $this->place--;
    }

    /**
     * @return int
     */
    public function getPlace(){
        return count($this->place);
    }

    /**
     * @return int
     */
    public function getBalcony()
    {
        return count($this->balcony);
    }

    /**
     * @return int
     */
    public function getParterre()
    {
        return count($this->parterre);
    }
}