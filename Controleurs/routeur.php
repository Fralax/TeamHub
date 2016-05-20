<?php

  require_once 'Controleurs/controleurConnexion.php';
  require_once 'Controleurs/controleurInscription.php';
  require_once 'Controleurs/controleurMembres.php';
  require_once 'Controleurs/controleurGroupes.php';
  require_once 'Controleurs/controleurAccueil.php';
  require_once 'Controleurs/controleurRecherche.php';
  require_once 'Controleurs/controleurEvenements.php';
  require_once 'Controleurs/controleurClubs.php';
  require_once 'Controleurs/controleurAdministration.php';
  require_once 'Vues/vue.php';

  class routeur{

    private $controleurConnexion;
    private $controleurInscription;
    private $controleurMembres;
    private $controleurGroupes;
    private $controleurAccueil;
    private $controleurRecherche;
    private $controleurEvenements;
    private $ControleurClubs;
    private $controleurAdministration;

    public function __construct(){
      $this->controleurConnexion = new connexion();
      $this->controleurInscription = new inscription();
      $this->controleurMembres = new membres();
      $this->controleurGroupes = new controleurGroupes();
      $this->controleurAccueil = new accueil();
      $this->controleurRecherche = new controleurRecherche();
      $this->controleurEvenements = new controleurEvenements();
      $this->controleurClubs = new controleurClubs();
      $this->controleurAdministration = new controleurAdministration();
      session_start();
    }

    public function routerRequete(){
      $this->controleurEvenements->suppressionEvenementsPasses();
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

        case 'suppressiongroupe':
          $this->controleurGroupes->suppressionGroupe($_GET['nom']);
          break;

        case 'groupe':
          $this->controleurGroupes->affichageCaracteristiquesGroupe($_GET['nom']);
          break;

        case 'mesgroupes':
          $this->controleurGroupes->affichageMesGroupes();
          break;

        case 'groupes':
          $this->controleurGroupes->affichageGroupes();
          break;

        case 'confirmationgroupe':
          $this->controleurGroupes->rejoindreGroupe($_GET['nom']);
          break;

        case 'quittergroupe':
          $this->controleurGroupes->quitterGroupe($_GET['nom']);
          break;

        case 'profil':
          $this->controleurMembres->modificationPhoto();
          $this->controleurMembres->affichageMesInfos();
          break;

        case 'ajoutsport':
          $this->controleurMembres->ajoutSport();
          break;

        case 'suppressionsport':
          $this->controleurMembres->suppressionSport($_GET['sport']);
          break;

        case 'modifmescoordonnees':
          $this->controleurMembres->modificationMesCoordonnees();
          break;

        case 'modifmonadresse';
          $this->controleurMembres->modificationMonAdresse();
          break;

        case 'modifmonmdp':
          $this->controleurMembres->modificationMonMdp();
          break;

        case 'listemembres':
          $this->controleurMembres->listeMembres($_GET['nom']);
          break;

        case 'affichagemodificationdescription':
          $this->controleurGroupes->modificationDescriptionGroupe($_GET['nom']);
          break;

        case 'affichagemodificationadmin':
          $this->controleurGroupes->modificationAdminGroupe($_GET['nom']);
          break;

        case 'affichagemodificationplaces':
          $this->controleurGroupes->modificationPlacesGroupe($_GET['nom']);
          break;

        case 'resultatsrecherche':
          $this->controleurRecherche->affichageResultatsRecherche();
          break;

        case 'creationevenement':
          $this->controleurEvenements->creationEvenements($_GET['nom']);
          break;

        case 'suppressionevenement':
          $this->controleurEvenements->suppressionevenement($_GET['evenement']);
          break;

        case 'rejoindreevenement':
          $this->controleurEvenements->adhesionEvenements($_GET['evenement']);
          break;

        case 'quitterevenement':
          $this->controleurEvenements->DepartEvenements($_GET['evenement']);
          break;

        case 'ajoutclub':
          $this->controleurClubs->ajoutClub();
          break;

        case 'listeclubs':
          $this->controleurClubs->listeclubs();
          break;

        case 'club':
          $this->controleurClubs->notationClub($_GET['nom']);
          $this->controleurClubs->affichageCaracteristiquesClub($_GET['nom']);
          break;

        case 'administration':
          $this->controleurAdministration->affichageAdministration();
          break;

        case 'bannirmembre':
          $this->controleurAdministration->bannissementMembre();
          break;

        case 'banni':
          $this->controleurAdministration->affichageBanni();
          break;

        case 'debanni':
          $this->controleurAdministration->debanni($_GET['pseudo']);
          break;

        case 'groupesasupprimer':
          $this->controleurAdministration->groupesSupprimables();
          break;

        case 'evenementasupprimer':
          $this->controleurAdministration->evenementsSupprimables();
          break;

        case 'clubsamodifierinfos':
          $this->controleurAdministration->clubsModifiables();
          break;

        case 'modifclub':
          $this->controleurAdministration->modificationClub($_GET['club']);
          break;

        case 'clubsamodifierphotos':
          $this->controleurAdministration->photoModifiables();
          break;

        case 'modifphotoclub':
          $this->controleurAdministration->modificationPhotoClub($_GET['club']);
          break;

        case 'clubsamodifiercommentaires':
          $this->controleurAdministration->commentaireModifiables();
          break;

        case 'moderationcommentaire':
          $this->controleurAdministration->moderationCommentairesClub($_GET['club']);
          break;

        case 'suppressioncommentaire':
          $this->controleurAdministration->suppressionCommentaire($_GET['id']);
          break;

        case 'clubsasupprimer':
          $this->controleurAdministration->clubsSupprimables();
          break;

        case 'suppressionclub':
          $this->controleurAdministration->suppressionClub($_GET['club']);
          break;

        case 'nouveladmin':
          $this->controleurAdministration->designerNouvelAdmin();
          break;

        case 'deop':
          $this->controleurAdministration->adminSupprime($_GET['pseudo']);
          break;

        case 'modifadmingroupes':
          $this->controleurAdministration->adminGroupeModifiable();
          break;

        case 'envoimail':
          $this->controleurAdministration->envoiMail();
          break;

        case 'envoimailmembres':
          $this->controleurAdministration->envoiMailMembres();
          break;

        case 'validationcompte':
        $this->controleurInscription->validationCompte();
        break;

        case 'mailnonconfirme':
          $this->controleurInscription->affichageNonConfirme();
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
