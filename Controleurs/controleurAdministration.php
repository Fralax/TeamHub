<?php

require_once 'Modeles/administration.php';
require_once 'Vues/vue.php';

class controleurAdministration{

  public function affichageAdministration(){
    $vue = new Vue('Admin');
    $vue->generer();
  }

  public function bannissementMembre(){
    $admin = new administration();
    $groupe = new groupes();
    $appartient = new utilisateurs();
    $mail = $admin->recupMail()->fetch();
    $groupesAdmin = $admin->ListerGroupesAdmin($_POST['banni'])->fetchAll();
    $groupesNonAdmin = $admin->ListerGroupesNonAdmin($_POST['banni'])->fetchAll();
    if (isset($_POST['bannir']) && $_POST['bannir'] == 'Bannir'){
      if ($_POST['banni'] != ""){
        $ajouterbanni = $admin->bannirMembre($mail[0]);

        foreach ($groupesAdmin as list($nomGroupesAdmin)){
          $groupe->supprimerGroupeBdd($nomGroupesAdmin);
        }
        foreach ($groupesNonAdmin as list($nomGroupesNonAdmin)){
          $appartient->supprimerAppartientBddNonAdmin($nomGroupesNonAdmin);
          $groupe->augmenterPlacesLibres($nomGroupesNonAdmin);
        }
        header("Location: index.php?page=administration");
      }
    }
    $banniPossible = $admin->listerAbannir()->fetchAll();
    $banni = $admin->listerBanni()->fetchAll();
    $vue = new Vue('BannirMembre');
    $vue->generer(array('abannir'=>$banniPossible, 'banni'=>$banni));
  }

  public function affichageBanni(){
    $vue = new Vue('Banni');
    $vue->generer();
  }

  public function debanni($nom){
    $admin = new administration();
    $debanni = $admin->debannir($nom);
    header("Location: index.php?page=administration");
  }

  public function groupesSupprimables(){
    $admin = new administration();
    $groupes = $admin->ListerGroupes()->fetchAll();
    $vue = new Vue('GroupesASupprimer');
    $vue->generer(array('listeGroupes'=>$groupes));
  }

  public function evenementsSupprimables(){
    $admin = new administration();
    $evenements = $admin->ListerEvenements()->fetchAll();
    $vue = new Vue('EvenementsASupprimer');
    $vue->generer(array('listeEvenements'=>$evenements));
  }

  public function clubsModifiables(){
    $admin = new administration();
    $club = new clubs();
    $clubs = $admin->ListerClub()->fetchAll();

    $vue = new Vue('ClubsAModifierInfos');
    $vue->generer(array('listeClubs'=>$clubs));
  }

  public function modificationClub($nomClub){
    $club = new clubs();
    $admin = new administration();
    $infos = $club->afficherCaracteristiquesClub($nomClub)->fetch();

    if (isset ($_POST['Modifier'])){
      $modif = $admin->modifierCaracteristiquesClub($nomClub);
      header("Location: index.php?page=administration");
    }

    $vue = new Vue('ModifClub');
    $vue->generer(array('caractClub'=>$infos));

  }

  public function photoModifiables(){
    $admin = new administration();
    $club = new clubs();
    $clubs = $admin->ListerClub()->fetchAll();

    $vue = new Vue('ClubsAModifierPhotos');
    $vue->generer(array('listeClubs'=>$clubs));
  }

  public function modificationPhotoClub($nomClub){
    $club = new clubs();
    $admin = new administration();
    $infos = $club->afficherCaracteristiquesClub($nomClub)->fetch();

    if (isset ($_POST['Modifier'])){
      $modif = $admin->modifierPhotoClub($nomClub);
      header("Location: index.php?page=administration");
    }

    $vue = new Vue('ModifPhotoClub');
    $vue->generer(array('caractClub'=>$infos));
  }

  public function commentaireModifiables(){
    $admin = new administration();
    $clubs = $admin->ListerClub()->fetchAll();

    $vue = new Vue('ClubsAModifierCommentaires');
    $vue->generer(array('listeClubs'=>$clubs));
  }

  public function moderationCommentairesClub($nomClub){
    $club = new clubs();
    $admin = new administration();
    $infos = $club->afficherCaracteristiquesClub($nomClub)->fetch();
    $notes = $admin->afficherCommentairesClub($nomClub)->fetchAll();

    $vue = new Vue('moderationCommentairesClub');
    $vue->generer(array('caractClub'=>$infos, 'NoteClub'=>$notes));
  }

  public function suppressionCommentaire($id){
    $admin = new administration();
    $admin->supprimerCommentaireClub($id);
    header("Location: index.php?page=administration");
  }

  public function clubsSupprimables(){
    $admin = new administration();
    $clubs = $admin->ListerClub()->fetchAll();

    $vue = new Vue('ClubsASupprimer');
    $vue->generer(array('listeClubs'=>$clubs));
  }

  public function suppressionClub($nomClub){
    $admin = new administration();
    $admin->supprimerClub($nomClub);
    header("Location: index.php?page=administration");
  }

  public function affichageFondEcran(){
    $admin = new administration();
    $fichier = $admin->afficherFondEcran()->fetch();
  }

  public function designerNouvelAdmin(){
    $admin = new administration();
    $user = new utilisateurs();

    $afficherPossiblesAdmins = $user->listerMembresNouvelAdmin()->fetchAll();
    $afficherAdmins = $admin->afficherAdmins()->fetchAll();

    if (isset($_POST['designer'])){
      $nouveauAdmin = $admin->nouvelAdmin($_POST['nouvelAdmin']);
      header("Location: index.php?page=administration");
    }
    $vue = new Vue('NouvelAdmin');
    $vue->generer(array('nouveauxAdmins'=>$afficherPossiblesAdmins, 'admins' => $afficherAdmins));

  }

  public function verifAdmin(){
    $admin = new administration();
    $verifierAdmins = $admin->verifierAdmins()->fetchAll();
    foreach ($verifierAdmins as list($nom)){
      if ($nom == $_SESSION['pseudo']){
        return true;
      }
    }
  }

  public function adminSupprime($nom){
    $admin = new administration();
    $deop = $admin->deop($nom);
    header("Location: index.php?page=administration");
  }


}


?>
