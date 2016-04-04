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

    public function __construct(){

      $this->controleurConnexion = new connexion();
      $this->controleurInscription = new inscription();
      $this->controleurMembres = new membres();
      $this->controleurGroupes = new controleurGroupes();
      session_start();
    }

    public function routerRequete(){

      switch($_GET['page']){

        case 'inscription':
          $this->controleurInscription->verif();
          break;

        case 'accueilmembres':
          $this->controleurMembres->afficherAccueilMembres();
          break;

        case 'aproposmembres':
          $this->controleurMembres->afficherAProposMembres();
          break;

        case 'aproposvisiteurs':
          $this->controleurConnexion->afficherAProposVisiteurs();
          break;

        case 'creationgroupe':
          $this->controleurGroupes->VerifFormulaire();
          break;

        case 'moderationgroupe':
          $this->controleurGroupes->afficherModerationGroupe($_GET['nom']);
          break;

        case 'mesgroupes':
          $this->controleurGroupes->affichageMesGroupes();
          break;

        case 'groupes':
          $this->controleurGroupes->affichageGroupes();
          break;

        case 'groupe':
          $this->controleurGroupes->rejoindreGroupes($_GET['nom']);
          break;

        case 'mesinfos':
          $this->controleurMembres->affichageMesInfos();
          break;

        case 'modifmesinfos':
          $this->controleurMembres->modificationMesInfos();
          break;

        default:
          $this->controleurConnexion->afficherAccueilVisiteurs();
          break;
        }

    }

  }
 ?>
