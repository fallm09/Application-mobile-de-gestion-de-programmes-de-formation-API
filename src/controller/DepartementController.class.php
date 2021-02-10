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
use src\model\DepartementRepository;

class DepartementController extends Controller{
    public function __construct(){
        parent::__construct();
    }
   
    /** 
     * url pattern for this method
     * localhost/projectName/Departement/liste
     */
    public function liste(){

         // Set HTTP Response Content Type
         header('Content-Type: application/json');
         //pour indiquer qui p acceder a ces resources
         header('Access-Control-Allow-Origin: *');

        $tdb = new DepartementRepository();
        
        $departements = $tdb->listeDepartement();

        foreach($departements as $departement)
                                {
                                    $departement = [
                                        "id" => $departement->getId(),
                                        "nom" => $departement->getNom(),
                                    ];
                                    $data['myDepartementliste'][] = $departement;
                                }
        http_response_code(200);
        echo json_encode($data);
    }

     /** 
     * url pattern for this method
     * localhost/projectName/Departement/add
     */
    public function add(){

          // Set HTTP Response Content Type
          header('Content-Type: application/json');
          //pour indiquer qui p acceder a ces resources
          header('Access-Control-Allow-Origin: *');
          header("Access-Control-Allow-Methods: POST");
          header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

          $data = json_decode(file_get_contents("php://input"));

        $tdb = new DepartementRepository();
        
                $departementObject = new Departement();
                
                $departementObject->setNom($data->nom);

                $ok = $tdb->addDepartement($departementObject);
                if($ok != null)
                     {
                         echo json_encode("departement added successfully");

                     }else{

                        echo json_encode("Erreur");

                     }
    }

}
?>