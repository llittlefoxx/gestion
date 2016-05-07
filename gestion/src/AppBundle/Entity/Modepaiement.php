<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modepaiement
 *
 * @ORM\Table(name="modepaiement")
 * @ORM\Entity
 */
class Modepaiement
{
    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=254, nullable=true)
     */
    private $libelle;

    /**
     * @var integer
     *
     * @ORM\Column(name="idpaiement", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpaiement;



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
}
