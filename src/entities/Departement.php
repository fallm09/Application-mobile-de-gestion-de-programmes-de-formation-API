<?php
use Doctrine\ORM\Annotation as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity 
 * @Table(name="departement")
 **/
class Departement
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $nom;
    /**
     * One departement has One Responsable.
     * @OneToOne(targetEntity="Responsable")
     * @JoinColumn(name="responsable_id", referencedColumnName="id")
     */
    private $responsable_id;
     /**
     * One Departement has many formations. This is the inverse side.
     * @OneToMany(targetEntity="Formation", mappedBy="departement")
     */
    private $formations;
    
    
    public function __construct()
    {
        $this->formation = new ArrayCollection();
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
     * Get one departement has One Responsable.
     */ 
    public function getResponsable_id()
    {
        return $this->responsable_id;
    }

    /**
     * Set one departement has One Responsable.
     *
     * @return  self
     */ 
    public function setResponsable_id($responsable_id)
    {
        $this->responsable_id = $responsable_id;

        return $this;
    }

    /**
     * Get one Departement has many formations. This is the inverse side.
     */ 
    public function getFormations()
    {
        return $this->formations;
    }

    /**
     * Set one Departement has many formations. This is the inverse side.
     *
     * @return  self
     */ 
    public function setFormations($formations)
    {
        $this->formations = $formations;

        return $this;
    }
    }