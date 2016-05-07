<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facturefour
 *
 * @ORM\Table(name="facturefour", indexes={@ORM\Index(name="FK_association10", columns={"idstruct"}), @ORM\Index(name="FK_association11", columns={"idcompte"}), @ORM\Index(name="FK_association8", columns={"idpaiement"})})
 * @ORM\Entity
 */
class Facturefour
{
    /**
     * @var integer
     *
     * @ORM\Column(name="numFactCni", type="integer", nullable=true)
     */
    private $numfactcni;

    /**
     * @var integer
     *
     * @ORM\Column(name="numFactFour", type="integer", nullable=true)
     */
    private $numfactfour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFour", type="datetime", nullable=true)
     */
    private $datefour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCni", type="datetime", nullable=true)
     */
    private $datecni;

    /**
     * @var string
     *
     * @ORM\Column(name="objetFact", type="string", length=254, nullable=true)
     */
    private $objetfact;

    /**
     * @var integer
     *
     * @ORM\Column(name="idfactfour", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfactfour;

    /**
     * @var \AppBundle\Entity\Modepaiement
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Modepaiement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idpaiement", referencedColumnName="idpaiement")
     * })
     */
    private $idpaiement;

    /**
     * @var \AppBundle\Entity\Comptebancaire
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Comptebancaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcompte", referencedColumnName="idcompte")
     * })
     */
    private $idcompte;

    /**
     * @var \AppBundle\Entity\Structure
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Structure")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idstruct", referencedColumnName="idstruct")
     * })
     */
    private $idstruct;



    /**
     * Set numfactcni
     *
     * @param integer $numfactcni
     *
     * @return Facturefour
     */
    public function setNumfactcni($numfactcni)
    {
        $this->numfactcni = $numfactcni;

        return $this;
    }

    /**
     * Get numfactcni
     *
     * @return integer
     */
    public function getNumfactcni()
    {
        return $this->numfactcni;
    }

    /**
     * Set numfactfour
     *
     * @param integer $numfactfour
     *
     * @return Facturefour
     */
    public function setNumfactfour($numfactfour)
    {
        $this->numfactfour = $numfactfour;

        return $this;
    }

    /**
     * Get numfactfour
     *
     * @return integer
     */
    public function getNumfactfour()
    {
        return $this->numfactfour;
    }

    /**
     * Set datefour
     *
     * @param \DateTime $datefour
     *
     * @return Facturefour
     */
    public function setDatefour($datefour)
    {
        $this->datefour = $datefour;

        return $this;
    }

    /**
     * Get datefour
     *
     * @return \DateTime
     */
    public function getDatefour()
    {
        return $this->datefour;
    }

    /**
     * Set datecni
     *
     * @param \DateTime $datecni
     *
     * @return Facturefour
     */
    public function setDatecni($datecni)
    {
        $this->datecni = $datecni;

        return $this;
    }

    /**
     * Get datecni
     *
     * @return \DateTime
     */
    public function getDatecni()
    {
        return $this->datecni;
    }

    /**
     * Set objetfact
     *
     * @param string $objetfact
     *
     * @return Facturefour
     */
    public function setObjetfact($objetfact)
    {
        $this->objetfact = $objetfact;

        return $this;
    }

    /**
     * Get objetfact
     *
     * @return string
     */
    public function getObjetfact()
    {
        return $this->objetfact;
    }

    /**
     * Get idfactfour
     *
     * @return integer
     */
    public function getIdfactfour()
    {
        return $this->idfactfour;
    }

    /**
     * Set idpaiement
     *
     * @param \AppBundle\Entity\Modepaiement $idpaiement
     *
     * @return Facturefour
     */
    public function setIdpaiement(\AppBundle\Entity\Modepaiement $idpaiement = null)
    {
        $this->idpaiement = $idpaiement;

        return $this;
    }

    /**
     * Get idpaiement
     *
     * @return \AppBundle\Entity\Modepaiement
     */
    public function getIdpaiement()
    {
        return $this->idpaiement;
    }

    /**
     * Set idcompte
     *
     * @param \AppBundle\Entity\Comptebancaire $idcompte
     *
     * @return Facturefour
     */
    public function setIdcompte(\AppBundle\Entity\Comptebancaire $idcompte = null)
    {
        $this->idcompte = $idcompte;

        return $this;
    }

    /**
     * Get idcompte
     *
     * @return \AppBundle\Entity\Comptebancaire
     */
    public function getIdcompte()
    {
        return $this->idcompte;
    }

    /**
     * Set idstruct
     *
     * @param \AppBundle\Entity\Structure $idstruct
     *
     * @return Facturefour
     */
    public function setIdstruct(\AppBundle\Entity\Structure $idstruct = null)
    {
        $this->idstruct = $idstruct;

        return $this;
    }

    /**
     * Get idstruct
     *
     * @return \AppBundle\Entity\Structure
     */
    public function getIdstruct()
    {
        return $this->idstruct;
    }
}
