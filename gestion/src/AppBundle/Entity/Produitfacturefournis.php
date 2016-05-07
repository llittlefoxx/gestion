<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produitfacturefournis
 *
 * @ORM\Table(name="produitfacturefournis", indexes={@ORM\Index(name="FK_Reference_11", columns={"idtax"}), @ORM\Index(name="FK_Reference_12", columns={"idprod"}), @ORM\Index(name="FK_association5", columns={"idfournisseur"})})
 * @ORM\Entity
 */
class Produitfacturefournis
{
    /**
     * @var integer
     *
     * @ORM\Column(name="quantiteFacture", type="integer", nullable=true)
     */
    private $quantitefacture;

    /**
     * @var string
     *
     * @ORM\Column(name="puFactureHt", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $pufactureht;

    /**
     * @var string
     *
     * @ORM\Column(name="montantRemise", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $montantremise;

    /**
     * @var integer
     *
     * @ORM\Column(name="idligne", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idligne;

    /**
     * @var \AppBundle\Entity\ProduitService
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ProduitService")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idprod", referencedColumnName="idprod")
     * })
     */
    private $idprod;

    /**
     * @var \AppBundle\Entity\Tax
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tax")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idtax", referencedColumnName="idtax")
     * })
     */
    private $idtax;

    /**
     * @var \AppBundle\Entity\Fournisseur
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Fournisseur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idfournisseur", referencedColumnName="idfournisseur")
     * })
     */
    private $idfournisseur;



    /**
     * Set quantitefacture
     *
     * @param integer $quantitefacture
     *
     * @return Produitfacturefournis
     */
    public function setQuantitefacture($quantitefacture)
    {
        $this->quantitefacture = $quantitefacture;

        return $this;
    }

    /**
     * Get quantitefacture
     *
     * @return integer
     */
    public function getQuantitefacture()
    {
        return $this->quantitefacture;
    }

    /**
     * Set pufactureht
     *
     * @param string $pufactureht
     *
     * @return Produitfacturefournis
     */
    public function setPufactureht($pufactureht)
    {
        $this->pufactureht = $pufactureht;

        return $this;
    }

    /**
     * Get pufactureht
     *
     * @return string
     */
    public function getPufactureht()
    {
        return $this->pufactureht;
    }

    /**
     * Set montantremise
     *
     * @param string $montantremise
     *
     * @return Produitfacturefournis
     */
    public function setMontantremise($montantremise)
    {
        $this->montantremise = $montantremise;

        return $this;
    }

    /**
     * Get montantremise
     *
     * @return string
     */
    public function getMontantremise()
    {
        return $this->montantremise;
    }

    /**
     * Get idligne
     *
     * @return integer
     */
    public function getIdligne()
    {
        return $this->idligne;
    }

    /**
     * Set idprod
     *
     * @param \AppBundle\Entity\ProduitService $idprod
     *
     * @return Produitfacturefournis
     */
    public function setIdprod(\AppBundle\Entity\ProduitService $idprod = null)
    {
        $this->idprod = $idprod;

        return $this;
    }

    /**
     * Get idprod
     *
     * @return \AppBundle\Entity\ProduitService
     */
    public function getIdprod()
    {
        return $this->idprod;
    }

    /**
     * Set idtax
     *
     * @param \AppBundle\Entity\Tax $idtax
     *
     * @return Produitfacturefournis
     */
    public function setIdtax(\AppBundle\Entity\Tax $idtax = null)
    {
        $this->idtax = $idtax;

        return $this;
    }

    /**
     * Get idtax
     *
     * @return \AppBundle\Entity\Tax
     */
    public function getIdtax()
    {
        return $this->idtax;
    }

    /**
     * Set idfournisseur
     *
     * @param \AppBundle\Entity\Fournisseur $idfournisseur
     *
     * @return Produitfacturefournis
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
}
