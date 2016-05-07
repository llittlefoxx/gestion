<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="FK_association1", columns={"idunite"}), @ORM\Index(name="FK_association2", columns={"idbci"}), @ORM\Index(name="FK_association3", columns={"idprod"})})
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="codeType", type="integer", nullable=true)
     */
    private $codetype;

    /**
     * @var string
     *
     * @ORM\Column(name="observation", type="string", length=254, nullable=true)
     */
    private $observation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCommande", type="datetime", nullable=true)
     */
    private $datecommande;

    /**
     * @var integer
     *
     * @ORM\Column(name="idligne", type="integer", nullable=false)
     */
    private $idligne;

    /**
     * @var string
     *
     * @ORM\Column(name="qte", type="string", length=254, nullable=true)
     */
    private $qte;

    /**
     * @var integer
     *
     * @ORM\Column(name="idlignedecmd", type="integer", nullable=false)
     */
    private $idlignedecmd;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantiteCommande", type="integer", nullable=true)
     */
    private $quantitecommande;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantiteBci", type="integer", nullable=true)
     */
    private $quantitebci;

    /**
     * @var integer
     *
     * @ORM\Column(name="idcmd", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcmd;

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
     * @var \AppBundle\Entity\Bci
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Bci")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idbci", referencedColumnName="idbci")
     * })
     */
    private $idbci;

    /**
     * @var \AppBundle\Entity\Unite
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Unite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idunite", referencedColumnName="idunite")
     * })
     */
    private $idunite;



    /**
     * Set codetype
     *
     * @param integer $codetype
     *
     * @return Commande
     */
    public function setCodetype($codetype)
    {
        $this->codetype = $codetype;

        return $this;
    }

    /**
     * Get codetype
     *
     * @return integer
     */
    public function getCodetype()
    {
        return $this->codetype;
    }

    /**
     * Set observation
     *
     * @param string $observation
     *
     * @return Commande
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set datecommande
     *
     * @param \DateTime $datecommande
     *
     * @return Commande
     */
    public function setDatecommande($datecommande)
    {
        $this->datecommande = $datecommande;

        return $this;
    }

    /**
     * Get datecommande
     *
     * @return \DateTime
     */
    public function getDatecommande()
    {
        return $this->datecommande;
    }

    /**
     * Set idligne
     *
     * @param integer $idligne
     *
     * @return Commande
     */
    public function setIdligne($idligne)
    {
        $this->idligne = $idligne;

        return $this;
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
     * Set qte
     *
     * @param string $qte
     *
     * @return Commande
     */
    public function setQte($qte)
    {
        $this->qte = $qte;

        return $this;
    }

    /**
     * Get qte
     *
     * @return string
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * Set idlignedecmd
     *
     * @param integer $idlignedecmd
     *
     * @return Commande
     */
    public function setIdlignedecmd($idlignedecmd)
    {
        $this->idlignedecmd = $idlignedecmd;

        return $this;
    }

    /**
     * Get idlignedecmd
     *
     * @return integer
     */
    public function getIdlignedecmd()
    {
        return $this->idlignedecmd;
    }

    /**
     * Set quantitecommande
     *
     * @param integer $quantitecommande
     *
     * @return Commande
     */
    public function setQuantitecommande($quantitecommande)
    {
        $this->quantitecommande = $quantitecommande;

        return $this;
    }

    /**
     * Get quantitecommande
     *
     * @return integer
     */
    public function getQuantitecommande()
    {
        return $this->quantitecommande;
    }

    /**
     * Set quantitebci
     *
     * @param integer $quantitebci
     *
     * @return Commande
     */
    public function setQuantitebci($quantitebci)
    {
        $this->quantitebci = $quantitebci;

        return $this;
    }

    /**
     * Get quantitebci
     *
     * @return integer
     */
    public function getQuantitebci()
    {
        return $this->quantitebci;
    }

    /**
     * Get idcmd
     *
     * @return integer
     */
    public function getIdcmd()
    {
        return $this->idcmd;
    }

    /**
     * Set idprod
     *
     * @param \AppBundle\Entity\ProduitService $idprod
     *
     * @return Commande
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
     * Set idbci
     *
     * @param \AppBundle\Entity\Bci $idbci
     *
     * @return Commande
     */
    public function setIdbci(\AppBundle\Entity\Bci $idbci = null)
    {
        $this->idbci = $idbci;

        return $this;
    }

    /**
     * Get idbci
     *
     * @return \AppBundle\Entity\Bci
     */
    public function getIdbci()
    {
        return $this->idbci;
    }

    /**
     * Set idunite
     *
     * @param \AppBundle\Entity\Unite $idunite
     *
     * @return Commande
     */
    public function setIdunite(\AppBundle\Entity\Unite $idunite = null)
    {
        $this->idunite = $idunite;

        return $this;
    }

    /**
     * Get idunite
     *
     * @return \AppBundle\Entity\Unite
     */
    public function getIdunite()
    {
        return $this->idunite;
    }
}
