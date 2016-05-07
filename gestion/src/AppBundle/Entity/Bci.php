<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bci
 *
 * @ORM\Table(name="bci")
 * @ORM\Entity
 */
class Bci
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="objet", type="string", length=254, nullable=true)
     */
    private $objet;

    /**
     * @var integer
     *
     * @ORM\Column(name="idbci", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idbci;



    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Bci
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
     * Set objet
     *
     * @param string $objet
     *
     * @return Bci
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * Get objet
     *
     * @return string
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Get idbci
     *
     * @return integer
     */
    public function getIdbci()
    {
        return $this->idbci;
    }
}
