<?php

namespace AppBundle\Entity;

/**
 * Commande
 */
class Commande
{
    /**
     * @var float
     */
    private $total;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var integer
     */
    private $idcmd;


    /**
     * Set total
     *
     * @param float $total
     *
     * @return Commande
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Commande
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get idcmd
     *
     * @return integer
     */
    public function getIdcmd()
    {
        return $this->idcmd;
    }
    public function __toString() {
        return " ".$this->getTotal()." ";
    }

    
    
}

