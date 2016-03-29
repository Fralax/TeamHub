<?php

  require_once 'Controleurs/controleurConnexion.php';
  require_once 'Controleurs/controleurInscription.php';
  require_once 'Controleurs/controleurMembres.php';
  require_once 'Vues/vue.php';

  class routeur{

    private $controleurConnexion;
    private $controleurInscription;
    private $controleurMembres;

    public function __contruct(){

      $this->controleurConnexion = new connexion();
      $this->controleurInscription = new inscription();
      $this->controleurMembres = new membres();

    }

    public function routerRequete(){

      try{

          switch($_GET['page']){

            default:
              $cnx = new connexion();
              $affichageCnx = $cnx->connexionUtilisateurs();
              break;

            case 'inscription':
              $inscription = new inscription();
              $affichageInscription = $inscription->verif();
              break;

            case 'accueilmembres':
              $inscriptionTerminee = new membres();
              $InscriptionTerminee = $inscriptionTerminee->afficherAccueilMembres();
              break;

            case 'aproposmembres':
              $Apropos = new membres();
              $affichageApropos = $Apropos->afficherAProposMembres();
              break;

            case 'aproposvisiteurs':
              $Apropos = new connexion();
              $affichageApropos = $Apropos->afficherAProposVisiteurs();
              break;

          }

      }

      catch(Exception $e){
        $this->erreur($e->getMessage());
      }

    }

  }
 ?>