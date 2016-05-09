<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fournisseur
 *
 * @ORM\Table(name="fournisseur")
 * @ORM\Entity
 */
class Fournisseur
{
    /**
     * @var string
     *
     * @ORM\Column(name="raisonSociale", type="string", length=254, nullable=true)
     */
    private $raisonsociale;

    /**
     * @var string
     *
     * @ORM\Column(name="adrFour", type="string", length=254, nullable=true)
     */
    private $adrfour;

    /**
     * @var string
     *
     * @ORM\Column(name="telFour", type="string", length=254, nullable=true)
     */
    private $telfour;

    /**
     * @var string
     *
     * @ORM\Column(name="faxFour", type="string", length=254, nullable=true)
     */
    private $faxfour;

    /**
     * @var string
     *
     * @ORM\Column(name="siteWebFour", type="string", length=254, nullable=true)
     */
    private $sitewebfour;

    /**
     * @var integer
     *
     * @ORM\Column(name="idfournisseur", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfournisseur;



    /**
     * Set raisonsociale
     *
     * @param string $raisonsociale
     *
     * @return Fournisseur
     */
    public function setRaisonsociale($raisonsociale)
    {
        $this->raisonsociale = $raisonsociale;

        return $this;
    }

    /**
     * Get raisonsociale
     *
     * @return string
     */
    public function getRaisonsociale()
    {
        return $this->raisonsociale;
    }

    /**
     * Set adrfour
     *
     * @param string $adrfour
     *
     * @return Fournisseur
     */
    public function setAdrfour($adrfour)
    {
        $this->adrfour = $adrfour;

        return $this;
    }

    /**
     * Get adrfour
     *
     * @return string
     */
    public function getAdrfour()
    {
        return $this->adrfour;
    }

    /**
     * Set telfour
     *
     * @param string $telfour
     *
     * @return Fournisseur
     */
    public function setTelfour($telfour)
    {
        $this->telfour = $telfour;

        return $this;
    }

    /**
     * Get telfour
     *
     * @return string
     */
    public function getTelfour()
    {
        return $this->telfour;
    }

    /**
     * Set faxfour
     *
     * @param string $faxfour
     *
     * @return Fournisseur
     */
    public function setFaxfour($faxfour)
    {
        $this->faxfour = $faxfour;

        return $this;
    }

    /**
     * Get faxfour
     *
     * @return string
     */
    public function getFaxfour()
    {
        return $this->faxfour;
    }

    /**
     * Set sitewebfour
     *
     * @param string $sitewebfour
     *
     * @return Fournisseur
     */
    public function setSitewebfour($sitewebfour)
    {
        $this->sitewebfour = $sitewebfour;

        return $this;
    }

    /**
     * Get sitewebfour
     *
     * @return string
     */
    public function getSitewebfour()
    {
        return $this->sitewebfour;
    }

    /**
     * Get idfournisseur
     *
     * @return integer
     */
    public function getIdfournisseur()
    {
        return $this->idfournisseur;
    }
    
    public function __toString() {
        return $this->getRaisonsociale();
    }

}
