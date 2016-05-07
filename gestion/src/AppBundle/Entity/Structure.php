<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Structure
 *
 * @ORM\Table(name="structure")
 * @ORM\Entity
 */
class Structure
{
    /**
     * @var string
     *
     * @ORM\Column(name="libelleStructure", type="string", length=254, nullable=true)
     */
    private $libellestructure;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFinValidite", type="datetime", nullable=true)
     */
    private $datefinvalidite;

    /**
     * @var integer
     *
     * @ORM\Column(name="idstruct", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idstruct;



    /**
     * Set libellestructure
     *
     * @param string $libellestructure
     *
     * @return Structure
     */
    public function setLibellestructure($libellestructure)
    {
        $this->libellestructure = $libellestructure;

        return $this;
    }

    /**
     * Get libellestructure
     *
     * @return string
     */
    public function getLibellestructure()
    {
        return $this->libellestructure;
    }

    /**
     * Set datefinvalidite
     *
     * @param \DateTime $datefinvalidite
     *
     * @return Structure
     */
    public function setDatefinvalidite($datefinvalidite)
    {
        $this->datefinvalidite = $datefinvalidite;

        return $this;
    }

    /**
     * Get datefinvalidite
     *
     * @return \DateTime
     */
    public function getDatefinvalidite()
    {
        return $this->datefinvalidite;
    }

    /**
     * Get idstruct
     *
     * @return integer
     */
    public function getIdstruct()
    {
        return $this->idstruct;
    }
}
