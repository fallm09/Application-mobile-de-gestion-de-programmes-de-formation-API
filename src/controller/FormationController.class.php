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
use src\model\FormationRepository;

class FormationController extends Controller{
    public function __construct(){
        parent::__construct();
    }
   
    /** 
     * url pattern for this method
     * localhost/projectName/Formation/liste
     */
    public function liste(){

         // Set HTTP Response Content Type
         header('Content-Type: application/json');
         //pour indiquer qui p acceder a ces resources
         header('Access-Control-Allow-Origin: *');

        $fdb = new FormationRepository();
        
        $formations = $fdb->listeFormation();

        foreach($formations as $formation)
                                {
                                    $formation = [
                                        "id" => $formation->getId(),
                                        "nom" => $formation->getNom(),
                                    ];
                                    $data['myFormationliste'][] = $formation;
                                }
        http_response_code(200);
        echo json_encode($data);
    }



    public function listeFormationParDepartement(){

        // Set HTTP Response Content Type
        header('Content-Type: application/json');
        //pour indiquer qui p acceder a ces resources
        header('Access-Control-Allow-Origin: *');

       $fdb = new FormationRepository();
       
       $formations = $fdb->getFormationByDepartementId($id);

       foreach($formations as $formation)
                               {
                                   $formation = [
                                       "id" => $formation->getId(),
                                       "nom" => $formation->getNom(),
                                   ];
                                   $data['myFormationliste'][] = $formation;
                               }
       http_response_code(200);
       echo json_encode($data);
   }

     /** 
     * url pattern for this method
     * localhost/projectName/Formation/add
     */
    public function add(){

          // Set HTTP Response Content Type
          header('Content-Type: application/json');
          //pour indiquer qui p acceder a ces resources
          header('Access-Control-Allow-Origin: *');
          header("Access-Control-Allow-Methods: POST");
          header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

          $data = json_decode(file_get_contents("php://input"));

        $fdb = new FormationRepository();
        
                $formationObject = new Formation();
                
                $formationObject->setNom($data->nom);

                $ok = $fdb->addFormation($formationObject);
                if($ok != null)
                     {
                         echo json_encode("Formation added successfully");

                     }else{

                        echo json_encode("Erreur");

                     }
    }

}
?>