<?php

  require_once 'Controleurs/controleurConnexion.php';
  require_once 'Controleurs/controleurInscription.php';
  require_once 'Controleurs/controleurMembres.php';
  require_once 'Controleurs/controleurGroupes.php';
  require_once 'Controleurs/controleurAccueil.php';
  require_once 'Controleurs/controleurRecherche.php';
  require_once 'Vues/vue.php';

  class routeur{

    private $controleurConnexion;
    private $controleurInscription;
    private $controleurMembres;
    private $controleurGroupes;
    private $controleurAccueil;
    private $controleurRecherche;

    public function __construct(){

      $this->controleurConnexion = new connexion();
      $this->controleurInscription = new inscription();
      $this->controleurMembres = new membres();
      $this->controleurGroupes = new controleurGroupes();
      $this->controleurAccueil = new accueil();
      $this->controleurRecherche = new recherche();
      session_start();
    }

    public function routerRequete(){

      switch($_GET['page']){

        case 'inscription':
          $this->controleurInscription->verif();
          break;

        case 'accueil':
          $this->controleurAccueil->affichageAccueil();
          break;

        case 'apropos':
          $this->controleurAccueil->affichageAPropos();
          break;

        case 'creationgroupe':
          $this->controleurGroupes->VerifFormulaire();
          break;

        case 'moderationgroupe':
          $this->controleurGroupes->affichageCaracteristiquesGroupe($_GET['nom']);
          break;

        case 'mesgroupes':
          $this->controleurGroupes->affichageMesGroupes();
          break;

        case 'groupes':
          $this->controleurGroupes->affichageGroupes();
          break;

        case 'groupe':
          $this->controleurGroupes->affichageCaracteristiquesGroupe($_GET['nom']);
          break;

        case 'confirmationgroupe':
          $this->controleurGroupes->rejoindreGroupe($_GET['nom']);
          break;

        case 'mesinfos':
          $this->controleurMembres->affichageMesInfos();
          break;

        case 'modifmescoordonnees':
          $this->controleurMembres->modificationMesCoordonnees();
          break;

        case 'modifmonadresse';
          $this->controleurMembres->affichageModificationMonAdresse();
          break;

        case 'modifmonmdp':
          $this->controleurMembres->affichageModificationMonMdp();
          break;

        case 'resultatsrecherche':
          $this->controleurRecherche->rechercheGroupes();
          break;

        default:
          $_SESSION = array();
          session_destroy();
          $this->controleurAccueil->affichageAccueil();
          break;
        }

    }

  }
 ?>
