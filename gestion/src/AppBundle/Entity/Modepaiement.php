<?php

namespace AppBundle\Entity;

/**
 * Modepaiement
 */
class Modepaiement
{
    /**
     * @var string
     */
    private $libelle;

    /**
     * @var integer
     */
    private $idpaiement;

    /**
     * @var \AppBundle\Entity\Banque
     */
    private $idbanque;


    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Modepaiement
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
     * Get idpaiement
     *
     * @return integer
     */
    public function getIdpaiement()
    {
        return $this->idpaiement;
    }

    /**
     * Set idbanque
     *
     * @param \AppBundle\Entity\Banque $idbanque
     *
     * @return Modepaiement
     */
    public function setIdbanque(\AppBundle\Entity\Banque $idbanque = null)
    {
        $this->idbanque = $idbanque;

        return $this;
    }

    /**
     * Get idbanque
     *
     * @return \AppBundle\Entity\Banque
     */
    public function getIdbanque()
    {
        return $this->idbanque;
    }
}
