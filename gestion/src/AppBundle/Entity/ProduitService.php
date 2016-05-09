<?php

namespace AppBundle\Entity;

/**
 * ProduitService
 */
class ProduitService
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var boolean
     */
    private $fournit;

    /**
     * @var string
     */
    private $libelle;

    /**
     * @var integer
     */
    private $idprod;

    /**
     * @var \AppBundle\Entity\Unite
     */
    private $codeunite;

    /**
     * @var \AppBundle\Entity\Fournisseur
     */
    private $idfournisseur;

    /**
     * @var \AppBundle\Entity\Natureproduit
     */
    private $idnature;


    /**
     * Set description
     *
     * @param string $description
     *
     * @return ProduitService
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set fournit
     *
     * @param boolean $fournit
     *
     * @return ProduitService
     */
    public function setFournit($fournit)
    {
        $this->fournit = $fournit;

        return $this;
    }

    /**
     * Get fournit
     *
     * @return boolean
     */
    public function getFournit()
    {
        return $this->fournit;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return ProduitService
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
     * Get idprod
     *
     * @return integer
     */
    public function getIdprod()
    {
        return $this->idprod;
    }

    /**
     * Set codeunite
     *
     * @param \AppBundle\Entity\Unite $codeunite
     *
     * @return ProduitService
     */
    public function setCodeunite(\AppBundle\Entity\Unite $codeunite = null)
    {
        $this->codeunite = $codeunite;

        return $this;
    }

    /**
     * Get codeunite
     *
     * @return \AppBundle\Entity\Unite
     */
    public function getCodeunite()
    {
        return $this->codeunite;
    }

    /**
     * Set idfournisseur
     *
     * @param \AppBundle\Entity\Fournisseur $idfournisseur
     *
     * @return ProduitService
     */
    public function setIdfournisseur(\AppBundle\Entity\Fournisseur $idfournisseur = null)
    {
        $this->idfournisseur = $idfournisseur;

        return $this;
    }

    /**
     * Get idfournisseur
     *
     * @return \AppBundle\Entity\Fournisseur
     */
    public function getIdfournisseur()
    {
        return $this->idfournisseur;
    }

    /**
     * Set idnature
     *
     * @param \AppBundle\Entity\Natureproduit $idnature
     *
     * @return ProduitService
     */
    public function setIdnature(\AppBundle\Entity\Natureproduit $idnature = null)
    {
        $this->idnature = $idnature;

        return $this;
    }

    /**
     * Get idnature
     *
     * @return \AppBundle\Entity\Natureproduit
     */
    public function getIdnature()
    {
        return $this->idnature;
    }
}

