<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity 
 * @Table(name="profil")
 **/
class Profil
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $libelle;

     /**
     * One profil has many candidats. This is the inverse side.
     * @OneToMany(targetEntity="Candidature", mappedBy="profils")
     */
    private $candidature;

    
    public function __construct()
    {
        $this->candidature = new ArrayCollection();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of libelle
     */ 
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */ 
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get one profil has many candidats. This is the inverse side.
     */ 
    public function getCandidat()
    {
        return $this->candidat;
    }

    /**
     * Set one profil has many candidats. This is the inverse side.
     *
     * @return  self
     */ 
    public function setCandidat($candidat)
    {
        $this->candidat = $candidat;

        return $this;
    }
}