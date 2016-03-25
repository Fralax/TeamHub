<?php

  require_once 'Controleurs/controleurConnexion.php';
  require_once 'Controleurs/controleurInscription.php';
  require_once 'Vues/vue.php';

  class routeur{

    private $controleurConnexion;
    private $controleurInscription;

    public function __contruct(){

      $this->controleurConnexion = new connexion();
      $this->controleurInscription = new inscription();

    }

    public function routerRequete(){

      try{

          switch($_GET['page']){

            default:
              $cnx = new connexion();
              $affichageCnx = $cnx->connexionUtilisateurs();

            case 'inscription':
              $inscription = new inscription();
              $affichageInscription = $inscription->verif();

          }

      }

      catch(Exception $e){
        $this->erreur($e->getMessage());
      }

    }

  }
 ?>
