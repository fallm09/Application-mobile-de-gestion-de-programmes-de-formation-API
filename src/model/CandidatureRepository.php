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
	
class CandidatureRepository extends Model{
	
	/**
	 * Methods with DQL (Doctrine Query Language) 
	 */
	public function __construct(){
		parent::__construct();
	}

	public function getCandidature($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Candidature')->find(array('id' => $id));
		}
	}
	
	public function addCandidature($candidature)
	{
		if($this->db != null)
		{
			$this->db->persist($candidature);
			$this->db->flush();

			return $candidature->getId();
		}
	}
	
	public function deleteCandidature($id){
		if($this->db != null)
		{
			$candidature = $this->db->find('Candidature', $id);
			if($candidature != null)
			{
				$this->db->remove($candidature);
				$this->db->flush();
			}else {
				die("Objet ".$id." does not existe!");
			}
		}
	}
	
	public function updateCandidature($candidature){
		if($this->db != null)
		{
			$getCandidature = $this->db->find('Candidature', $candidature->getId());
			if($getCandidature != null)
			{
				$getCandidature->setValeur1($candidature->getValeur1());
				$getCandidature->setValeur2($candidature->getValeur2());
				$this->db->flush();

			}else {
				die("Objet ".$candidature->getId()." does not existe!!");
			}	
		}
	}
	
	public function listeCandidature(){
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT c FROM Candidature c")->getResult();
		}
	}
	
	public function listeCandidaturesById($id)
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Candidature')->findBy(array('id' => $id));
		}
	}
	
	public function listeOfCandidaturesById($id)
	{
		if($this->db != null)
		{
			return $this->db->createQuery("SELECT c FROM Candidature c WHERE t.id = " . $id)->getSingleResult();
		}
	}

	public function listeOfCandidatures()
	{
		if($this->db != null)
		{
			return $this->db->getRepository('Candidature')->findAll();
		}
	}
	
}