<?php

  require_once 'Controleurs/controleurConnexion.php';
  require_once 'Controleurs/controleurInscription.php';
  require_once 'Controleurs/controleurMembres.php';
  require_once 'Controleurs/controleurGroupes.php';
  require_once 'Vues/vue.php';

  class routeur{

    private $controleurConnexion;
    private $controleurInscription;
    private $controleurMembres;
    private $controleurGroupes;

    public function __contruct(){

      $this->controleurConnexion = new connexion();
      $this->controleurInscription = new inscription();
      $this->controleurMembres = new membres();
      $this->controleurGroupes = new groupes();

    }

    public function routerRequete(){

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
              session_start();
              $inscriptionTerminee = new membres();
              $affichageInscriptionTerminee = $inscriptionTerminee->afficherAccueilMembres();
              break;

            case 'aproposmembres':
              session_start();
              $aPropos = new membres();
              $affichageAPropos = $aPropos->afficherAProposMembres();
              break;

            case 'aproposvisiteurs':
              $aPropos = new connexion();
              $affichageAPropos = $aPropos->afficherAProposVisiteurs();
              break;

            case 'creationgroupe':
              session_start();
              $creationGroupe = new controleurGroupes();
              $affichageCreationGroupe = $creationGroupe->VerifFormulaire();
              break;

            case 'moderationgroupe':
              session_start();
              $moderationGroupe = new controleurGroupes();
              $affichageModerationGroupe = $moderationGroupe->afficherModerationGroupe();
              break;



      }

    }

  }
 ?>
