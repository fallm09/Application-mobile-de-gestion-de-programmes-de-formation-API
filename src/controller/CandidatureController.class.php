<?php
/*==================================================
MODELE MVC DEVELOPPE PAR Ngor SECK
ngorsecka@gmail.com
(+221) 77 - 433 - 97 - 16
PERFECTIONNEZ CE MODELE ET FAITES MOI UN RETOUR
POUR TOUTE MODIFICATION VISANT A L'AMELIORER.
VOUS ETES LIBRE DE TOUTE UTILISATION.
===================================================*/ 
use libs\system\Controller; 
use src\model\CandidatureRepository;

class CandidatureController extends Controller{
    public function __construct(){
        parent::__construct();
    }
   
    /** 
     * url pattern for this method
     * localhost/projectName/Candidature/liste
     */
    public function liste(){

         // Set HTTP Response Content Type
         header('Content-Type: application/json');
         //pour indiquer qui p acceder a ces resources
         header('Access-Control-Allow-Origin: *');

        $tdb = new CandidatureRepository();
        
        $candidatures = $tdb->listeCandidature();

        foreach($candidatures as $candidature)
                                {
                                    $candidature = [
                                        "id" => $candidature->getId(),
                                        "nom" => $candidature->getNom(),
                                    ];
                                    $data['myCandidatureliste'][] = $candidature;
                                }
        http_response_code(200);
        echo json_encode($data);
    }

     /** 
     * url pattern for this method
     * localhost/projectName/Candidature/add
     */
    public function add(){

          // Set HTTP Response Content Type
          header('Content-Type: application/json');
          //pour indiquer qui p acceder a ces resources
          header('Access-Control-Allow-Origin: *');
          header("Access-Control-Allow-Methods: POST");
          header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

          $data = json_decode(file_get_contents("php://input"));

        $tdb = new CandidatureRepository();
        
                $candidatureObject = new Candidature();
                
                $candidatureObject->setNom($data->nom);
                $candidatureObject->setPrenom($data->prenom);
                $candidatureObject->setAdresse($data->adresse);
                $candidatureObject->setTelephone($data->telephone);
                $candidatureObject->setEmail($data->email);

                $ok = $tdb->addCandidature($candidatureObject);
                if($ok != null)
                     {
                         echo json_encode("Candidature added successfully");

                     }else{

                        echo json_encode("Erreur");

                     }
    }

}
?>