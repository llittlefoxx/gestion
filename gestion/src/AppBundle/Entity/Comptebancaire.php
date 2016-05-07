<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comptebancaire
 *
 * @ORM\Table(name="comptebancaire")
 * @ORM\Entity
 */
class Comptebancaire
{
    /**
     * @var string
     *
     * @ORM\Column(name="numRib", type="string", length=254, nullable=true)
     */
    private $numrib;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFinValidite", type="datetime", nullable=true)
     */
    private $datefinvalidite;

    /**
     * @var string
     *
     * @ORM\Column(name="proprietaire", type="string", length=254, nullable=true)
     */
    private $proprietaire;

    /**
     * @var integer
     *
     * @ORM\Column(name="idcompte", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcompte;



    /**
     * Set numrib
     *
     * @param string $numrib
     *
     * @return Comptebancaire
     */
    public function setNumrib($numrib)
    {
        $this->numrib = $numrib;

        return $this;
    }

    /**
     * Get numrib
     *
     * @return string
     */
    public function getNumrib()
    {
        return $this->numrib;
    }

    /**
     * Set datefinvalidite
     *
     * @param \DateTime $datefinvalidite
     *
     * @return Comptebancaire
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
     * Set proprietaire
     *
     * @param string $proprietaire
     *
     * @return Comptebancaire
     */
    public function setProprietaire($proprietaire)
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    /**
     * Get proprietaire
     *
     * @return string
     */
    public function getProprietaire()
    {
        return $this->proprietaire;
    }

    /**
     * Get idcompte
     *
     * @return integer
     */
    public function getIdcompte()
    {
        return $this->idcompte;
    }
}
