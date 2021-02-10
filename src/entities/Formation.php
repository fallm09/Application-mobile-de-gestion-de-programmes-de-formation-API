<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Annotation as ORM;

/**
 * @Entity @Table(name="formation")
 **/
class Formation
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $nom;
    /** @Column(type="integer") **/
    private $duree;
    /**
     * Many formation have one Departemnt. This is the owning side.
     * @ManyToOne(targetEntity="Departement", inversedBy="formation")
     * @JoinColumn(name="departement_id", referencedColumnName="id")
     */
    private $departement;
    /**
     * One Formation has many candidats. This is the inverse side.
     * @OneToMany(targetEntity="Candidature", mappedBy="formations", cascade={"persist","remove"})
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
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of duree
     */ 
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set the value of duree
     *
     * @return  self
     */ 
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get many formation have one Departemnt. This is the owning side.
     */ 
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set many formation have one Departemnt. This is the owning side.
     *
     * @return  self
     */ 
    public function setDepartement($departement)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get one Formation has many candidats. This is the inverse side.
     */ 
    public function getCandidat()
    {
        return $this->candidat;
    }

    /**
     * Set one Formation has many candidats. This is the inverse side.
     *
     * @return  self
     */ 
    public function setCandidat($candidat)
    {
        $this->candidat = $candidat;

        return $this;
    }
}