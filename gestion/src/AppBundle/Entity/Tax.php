<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tax
 *
 * @ORM\Table(name="tax")
 * @ORM\Entity
 */
class Tax
{
    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=254, nullable=true)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="pourcentage", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $pourcentage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFinValidite", type="datetime", nullable=true)
     */
    private $datefinvalidite;

    /**
     * @var integer
     *
     * @ORM\Column(name="idtax", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtax;



    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Tax
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
     * Set pourcentage
     *
     * @param string $pourcentage
     *
     * @return Tax
     */
    public function setPourcentage($pourcentage)
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

    /**
     * Get pourcentage
     *
     * @return string
     */
    public function getPourcentage()
    {
        return $this->pourcentage;
    }

    /**
     * Set datefinvalidite
     *
     * @param \DateTime $datefinvalidite
     *
     * @return Tax
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
     * Get idtax
     *
     * @return integer
     */
    public function getIdtax()
    {
        return $this->idtax;
    }
}
