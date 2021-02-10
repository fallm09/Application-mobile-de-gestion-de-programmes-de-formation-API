<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity 
 * @Table(name="candidature")
 **/
class Candidature
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $nom;
    /** @Column(type="string") **/
    private $prenom;
    /** @Column(type="string") **/
    private $adresse;
    /** @Column(type="string") **/
    private $telephone;
    /** @Column(type="string") **/
    private $email;
    /** @Column(type="string") **/
    private $sexe;
    /**
     * Many candidat have one formation. This is the owning side.
     * @ManyToOne(targetEntity="Formation", inversedBy="candidat")
     * @JoinColumn(name="formation_id", referencedColumnName="id")
     */
    private $formation;
    /**
     * Many candidat have one profil. This is the owning side.
     * @ManyToOne(targetEntity="Profil", inversedBy="candidature")
     * @JoinColumn(name="profil_id", referencedColumnName="id")
     */
    private $profils;
    
    public function __construct()
    {

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
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of telephone
     */ 
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */ 
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of sexe
     */ 
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set the value of sexe
     *
     * @return  self
     */ 
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get many candidat have one formation. This is the owning side.
     */ 
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * Set many candidat have one formation. This is the owning side.
     *
     * @return  self
     */ 
    public function setFormation($formation)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get many candidat have one profil. This is the owning side.
     */ 
    public function getProfils()
    {
        return $this->profils;
    }

    /**
     * Set many candidat have one profil. This is the owning side.
     *
     * @return  self
     */ 
    public function setProfils($profils)
    {
        $this->profils = $profils;

        return $this;
    }
}