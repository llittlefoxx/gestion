<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitService
 *
 * @ORM\Table(name="produit_service", indexes={@ORM\Index(name="FK_Reference_13", columns={"idfournisseur"}), @ORM\Index(name="FK_association7", columns={"idnature"})})
 * @ORM\Entity
 */
class ProduitService
{
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=254, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="codeNature", type="string", length=254, nullable=true)
     */
    private $codenature;

    /**
     * @var string
     *
     * @ORM\Column(name="codeUnite", type="string", length=254, nullable=true)
     */
    private $codeunite;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Fournit", type="boolean", nullable=true)
     */
    private $fournit;

    /**
     * @var integer
     *
     * @ORM\Column(name="idprod", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprod;

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
     * @var \AppBundle\Entity\Natureproduit
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Natureproduit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idnature", referencedColumnName="idnature")
     * })
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
     * Set codenature
     *
     * @param string $codenature
     *
     * @return ProduitService
     */
    public function setCodenature($codenature)
    {
        $this->codenature = $codenature;

        return $this;
    }

    /**
     * Get codenature
     *
     * @return string
     */
    public function getCodenature()
    {
        return $this->codenature;
    }

    /**
     * Set codeunite
     *
     * @param string $codeunite
     *
     * @return ProduitService
     */
    public function setCodeunite($codeunite)
    {
        $this->codeunite = $codeunite;

        return $this;
    }

    /**
     * Get codeunite
     *
     * @return string
     */
    public function getCodeunite()
    {
        return $this->codeunite;
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
     * Get idprod
     *
     * @return integer
     */
    public function getIdprod()
    {
        return $this->idprod;
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
