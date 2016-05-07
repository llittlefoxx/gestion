<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Natureproduit
 *
 * @ORM\Table(name="natureproduit")
 * @ORM\Entity
 */
class Natureproduit
{
    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=254, nullable=true)
     */
    private $libelle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFinValidite", type="datetime", nullable=true)
     */
    private $datefinvalidite;

    /**
     * @var integer
     *
     * @ORM\Column(name="idnature", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idnature;



    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Natureproduit
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set datefinvalidite
     *
     * @param \DateTime $datefinvalidite
     *
     * @return Natureproduit
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
     * Get idnature
     *
     * @return integer
     */
    public function getIdnature()
    {
        return $this->idnature;
    }
}
