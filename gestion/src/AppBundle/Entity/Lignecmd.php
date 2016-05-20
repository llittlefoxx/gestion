<?php

namespace AppBundle\Entity;

/**
 * Lignecmd
 */
class Lignecmd
{
    /**
     * @var integer
     */
    private $qte;

    /**
     * @var integer
     */
    private $idligne;

    /**
     * @var \AppBundle\Entity\ProduitService
     */
    private $idprod;

    /**
     * @var \AppBundle\Entity\Commande
     */
    private $idcmd;


    /**
     * Set qte
     *
     * @param integer $qte
     *
     * @return Lignecmd
     */
    public function setQte($qte)
    {
        $this->qte = $qte;

        return $this;
    }

    /**
     * Get qte
     *
     * @return integer
     */
    public function getQte()
    {
        return $this->qte;
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
     * @return Lignecmd
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
     * Set idcmd
     *
     * @param \AppBundle\Entity\Commande $idcmd
     *
     * @return Lignecmd
     */
    public function setIdcmd(\AppBundle\Entity\Commande $idcmd = null)
    {
        $this->idcmd = $idcmd;

        return $this;
    }

    /**
     * Get idcmd
     *
     * @return \AppBundle\Entity\Commande
     */
    public function getIdcmd()
    {
        return $this->idcmd;
    }
}

