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
      if($_POST['nomClub'] != "" && $_POST['adresseClub'] != "" && $_POST['cpClub'] !="" && $_POST['numeroClub'] !="" && $_POST['c_hoLundiDebut'] !="" && $_POST['c_hoMardiDebut'] !="" && $_POST['c_hoMercrediDebut'] !="" && $_POST['c_hoJeudiDebut'] !="" && $_POST['c_hoVendrediDebut'] !=""
      && $_POST['c_hoSamediDebut'] !="" && $_POST['c_hoDimancheDebut'] !="" && $_POST['c_hoLundiFin'] !="" && $_POST['c_hoMardiFin'] !=""
      && $_POST['c_hoMercrediFin'] !="" && $_POST['c_hoJeudiFin'] !="" && $_POST['c_hoVendrediFin'] !=""
      && $_POST['c_hoSamediFin'] !="" && $_POST['c_hoDimancheFin'] !=""){
        $modif = $admin->modifierCaracteristiquesClub($nomClub);
        header("Location: index.php?page=administration");
      } else {
        ?> <script> alert("Des champs n'ont pas été rempli !")</script> <?php
      }
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
      if($_POST['nouvelAdmin'] != ""){
        $nouveauAdmin = $admin->nouvelAdmin($_POST['nouvelAdmin']);
        header("Location: index.php?page=administration");
      }
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

  public function envoiMail(){
    $user = new utilisateurs();
    $admin = new administration();
    $membresSite = $user->listerMembresSite()->fetchAll();
    if(isset($_POST['envoyer'])){
      if($_POST['membresSite'] != "" && $_POST['mail'] != " " && $_POST['sujet'] != ""){
        $envoiMail = $admin->envoiMail($_POST['membresSite'])->fetch();
        $destinataire = $envoiMail[0];
        $sujet = $_POST['sujet'] ;
        $message = $_POST['mail']."
--------------------------------
Merci de ne pas répondre à ce mail.";
        mail($destinataire, $sujet, $message);
        header("Location: index.php?page=administration");
      } else {
        ?> <script> alert("Des champs n'ont pas été remplis")</script> <?php
      }
    }
    $vue = new Vue('EnvoiMail');
    $vue->generer(array('membres' => $membresSite));
  }

  public function envoiMailMembres(){
    $user = new utilisateurs();
    $admin = new administration();
    $membresSite = $user->listerMembresSite()->fetchAll();
    if(isset($_POST['envoyer'])){
      if ($_POST['membresSite'] != "" && $_POST['mail'] != " " && $_POST['sujet'] != ""){
        foreach($membresSite as list($membre)){
          $envoiMail = $admin->envoiMail($membre)->fetch();
          $destinataire = $envoiMail[0];
          $sujet = $_POST['sujet'] ;
          $message = $_POST['mail']."
  --------------------------------
  Merci de ne pas répondre à ce mail.";
          mail($destinataire, $sujet, $message);
        }
        header("Location: index.php?page=administration");
      } else {
        ?> <script> alert("Des champs n'ont pas été remplis")</script> <?php
      }
    }
    $vue = new Vue('EnvoiMailMembres');
    $vue->generer(array('membres' => $membresSite));
  }

  public function suppressionMessageForum($id){
    $admin = new administration();
    $forum = new forum();
    $idSujet = $forum->recupIdSujet($id)->fetch();
    $forum->decrementeNbReponses($idSujet[0]);
    $categorie = $forum->recupCategorie($idSujet[0])->fetch();
    $admin->supprimerMessageForum($id);
    header("Location: index.php?page=forum&categorie=".$categorie[0]);
  }

  public function suppressionSujetForum($id){
    $admin = new administration();
    $forum = new forum();
    $categorie = $forum->recupCategorie($id)->fetch();
    $admin->supprimerSujetForum($id);
    header("Location: index.php?page=forum&categorie=".$categorie[0]);
  }

  public function ajoutQuestion(){
    $admin = new administration();
    if (isset($_POST['Ajouter']) && $_POST['Ajouter'] == "Ajouter"){
      if ($_POST['question'] != " " && $_POST['reponse'] != " "){
        $admin->ajouterQuestion();
        header("Location: index.php?page=administration");
      } else {
        ?> <script> alert("Des champs n'ont pas été remplis")</script> <?php
      }
    }

    $vue = new Vue('AjoutFAQ');
    $vue->generer(array('membres' => $membresSite));
  }

  public function suppressionQuestion($id){
    $admin = new administration();
    $admin->supprimerQuestion($id);
    header("Location: index.php?page=administration");
  }

  public function adminGroupeModifiable(){
    $admin = new administration();
    $groupes = $admin->ListerGroupes()->fetchAll();
    $vue = new Vue('AdminGroupeAModifier');
    $vue->generer(array('listeGroupes'=>$groupes));
  }

}


?>
