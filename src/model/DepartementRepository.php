<?php
/*==================================================
MODELE MVC DEVELOPPE PAR Ngor SECK
ngorsecka@gmail.com
(+221) 77 - 433 - 97 - 16
PERFECTIONNEZ CE MODELE ET FAITES MOI UN RETOUR
POUR TOUTE MODIFICATION VISANT A L'AMELIORER.
VOUS ETES LIBRE DE TOUTE UTILISATION.
===================================================*/
namespace src\model; 

use libs\system\Model; 
	
class DepartementRepository extends Model{
	
	/**
	 * Methods with DQL (Doctrine Query Language) 
	 */
	public function __construct(){
		parent::__construct();
	}

	public function getDepartement($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Departement')->find(array('id' => $id));
		}
	}
	
	public function addDepartement($departement)
	{
		if($this->db != null)
		{
			$this->db->persist($departement);
			$this->db->flush();

			return $departement->getId();
		}
	}
	
	public function deleteDepartement($id){
		if($this->db != null)
		{
			$departement = $this->db->find('Departement', $id);
			if($departement != null)
			{
				$this->db->remove($departement);
				$this->db->flush();
			}else {
				die("Objet ".$id." does not existe!");
			}
		}
	}
	
	public function updateDepartement($departement){
		if($this->db != null)
		{
			$getDepartement = $this->db->find('Departement', $departement->getId());
			if($getDepartement != null)
			{
				$getDepartement->setValeur1($departement->getValeur1());
				$getDepartement->setValeur2($departement->getValeur2());
				$this->db->flush();

			}else {
				die("Objet ".$departement->getId()." does not existe!!");
			}	
		}
	}
	
	public function listeDepartement(){
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT d FROM Departement d")->getResult();
		}
	}
	
	public function listeDepartementsById($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Departement')->findBy(array('id' => $id));
		}
	}
	
	public function listeOfDepartementsById($id)
	{
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT d FROM Departement d WHERE t.id = " . $id)->getSingleResult();
		}
	}

	public function listeOfDepartements()
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Departement')->findAll();
		}
	}
	
}