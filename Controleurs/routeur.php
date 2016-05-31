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
  require_once 'Controleurs/controleurForum.php';
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
    private $controleurForum;

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
      $this->controleurForum = new controleurForum();
      session_start();
    }

    public function routerRequete(){
      error_reporting (E_ALL & ~E-NOTICE & ~E-WARNING);
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
          $this->controleurAccueil->suppressionNotif($_GET['nom']);
          $this->controleurAccueil->envoieConfirm($_GET['nom']);
          break;

        case 'acceptgroupe':
          $this->controleurGroupes->rejoindreGroupe($_GET['nom']);
          $this->controleurAccueil->suppressionNotif($_GET['nom']);
          $this->controleurAccueil->envoieConfirm($_GET['nom']);
          break;

        case 'quittergroupe':
          $this->controleurGroupes->quitterGroupe($_GET['nom']);
          break;

        case 'profil':
          $this->controleurMembres->modificationPhoto();
          $this->controleurMembres->affichageMesInfos();
          break;

        case 'suppressionsport':
          $this->controleurMembres->suppressionSport($_GET['sport']);
          break;

        case 'listemembres':
          $this->controleurMembres->listeMembres($_GET['nom']);
          break;

        case 'affichagemodificationadmin':
          $this->controleurGroupes->modificationAdminGroupe($_GET['nom']);
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

        case 'confirmationclub':
          $this->controleurClubs->confirmationClub();
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

        case 'rechercheavancee':
          $this->controleurRecherche->affichageRechercheAvancee();
          break;

        case 'resultatsrechercheavancee1':
          $this->controleurRecherche->resultatRechercheAvanceeGroupes();
          break;

        case 'resultatsrechercheavancee2':
          $this->controleurRecherche->resultatRechercheAvanceeMembres();
          break;

        case 'resultatsrechercheavancee3':
          $this->controleurRecherche->resultatRechercheAvanceeClubs();
          break;

        case 'inviterutilisateur':
          $this->controleurGroupes->invitationUtilisateur($_GET['nom']);
          break;

        case 'supprimernotif':
          $this->controleurAccueil->suppressionNotif($_GET['nom']);
          break;

        case 'supprimeracquittement':
          $this->controleurAccueil->suppressionAcquittement();
          break;

        case 'bannirmembregroupe':
          $this->controleurGroupes->affichageBannissementMembre($_GET['nom']);
          break;

        case 'confirmationbannissementmembre':
          $this->controleurGroupes->bannissementMembre();
          break;

        case 'confirmationnotifgroupe':
          $this->controleurGroupes->rejointAutoGroupe();
          break;

        case 'annulationnotifgroupe':
          $this->controleurGroupes->neRejointPlusAutoGroupe();
          break;

        case 'afficheraccueilforum':
          $this->controleurForum->afficherAccueilForum();
          break;

        case 'forum':
          $this->controleurForum->afficherSujet($_GET['categorie']);
          break;

        case 'creersujet':
          $this->controleurForum->creationSujet($_GET['categorie']);
          break;

        case 'sujetforum':
          $this->controleurForum->modificationVues($_GET['id']);
          $this->controleurForum->affichageDetailsSujet($_GET['id']);
          break;

        case 'cloreSujet':
          $this->controleurForum->fermetureSujet($_GET['id']);
          break;

        case 'supprimermessage':
          $this->controleurAdministration->suppressionMessageForum($_GET['id']);
          break;

        case 'supprimersujet':
          $this->controleurAdministration->suppressionSujetForum($_GET['id']);
          break;

        case 'affichagefaq':
          $this->controleurForum->affichageFAQ();
          break;

        case 'ajouterquestion':
          $this->controleurAdministration->ajoutQuestion();
          break;

        case 'supprimerquestion':
          $this->controleurAdministration->suppressionQuestion($_GET['id']);
          break;

        case 'motdepasseoublie':
          $this->controleurConnexion->motDePasseOublie();
          break;

        case 'confirmationreinitialisationmotdepasse':
          $this->controleurConnexion->affichageConfirmationMdp();
          break;

        case 'reinitialisermotdepasse':
          $this->controleurConnexion->reinitialisationMotDePasse($_GET['cle']);
          break;

        case 'confirmationnouveaumdp':
          $this->controleurConnexion->afficherConfirmationNouveauMdp();
          break;

        case 'changementlangue':
          $this->controleurAccueil->changementLangue($_GET['langue']);
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
