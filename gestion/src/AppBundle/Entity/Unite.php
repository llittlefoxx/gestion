<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unite
 *
 * @ORM\Table(name="unite")
 * @ORM\Entity
 */
class Unite
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
     * @ORM\Column(name="idunite", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idunite;



    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Unite
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
     * @return Unite
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
     * Get idunite
     *
     * @return integer
     */
    public function getIdunite()
    {
        return $this->idunite;
    }
}
