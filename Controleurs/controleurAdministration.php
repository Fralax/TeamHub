<?php

require_once 'Modeles/administration.php';
require_once 'Vues/vue.php';

class controleurAdministration{

  public function affichageAdministration(){
    $admin = new administration();
    $user = new utilisateurs();
    $groupe = new groupes();
    $club = new clubs();

    //Désigner un nouvel administrateur
    $afficherPossiblesAdmins = $user->listerMembresNouvelAdmin()->fetchAll();
    $afficherAdmins = $admin->afficherAdmins()->fetchAll();

    if (isset($_POST['designer'])){
      if($_POST['nouvelAdmin'] != ""){
        $nouveauAdmin = $admin->nouvelAdmin($_POST['nouvelAdmin']);
        header("Location: index.php?page=administration");
      }
    }

    //Bannir un membre
    $mail = $admin->recupMail()->fetch();
    $groupesAdmin = $admin->ListerGroupesAdmin($_POST['banni'])->fetchAll();
    $groupesNonAdmin = $admin->ListerGroupesNonAdmin($_POST['banni'])->fetchAll();
    if (isset($_POST['bannir'])){
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

    //Envoyer un mail à un membre
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
        if($_COOKIE['langue'] == "English"){
          ?> <script> alert("Some fields have not been filled !")</script> <?php
        } else {
          ?> <script> alert("Des champs n'ont pas été rempli !")</script> <?php
        }
      }
    }

    //Envoyer un mail à tous les membres
    if(isset($_POST['envoyerMailATousLesMembres'])){
      if ($_POST['mailMembres'] != " " && $_POST['sujetMembres'] != ""){
        foreach($membresSite as list($nomMembre)){
          $envoiMailMembres = $admin->envoiMail($nomMembre)->fetch();
          $destinataireMembres = $envoiMailMembres[0];
          $sujetMembres = $_POST['sujetMembres'];
          $messageMembres = $_POST['mailMembres']."
  --------------------------------
  Merci de ne pas répondre à ce mail.";
          mail($destinataireMembres, $sujetMembres, $messageMembres);
        }
        header("Location: index.php?page=administration");
      } else {
        if($_COOKIE['langue'] == "English"){
          ?> <script> alert("Some fields have not been filled !")</script> <?php
        } else {
          ?> <script> alert("Des champs n'ont pas été rempli !")</script> <?php
        }
      }
    }

    // Supprimer un groupe + désigner nouvel Admin
    $groupes = $admin->ListerGroupes()->fetchAll();

    // Supprimer un événement
    $evenements = $admin->ListerEvenements()->fetchAll();

    //Modification des clubs
    $clubs = $admin->ListerClub()->fetchAll();

    // Ajout Question faq
    if (isset($_POST['Ajouter'])){
      if ($_POST['question'] != " " && $_POST['reponse'] != " "){
        $admin->ajouterQuestion();
        header("Location: index.php?page=administration");
      } else {
        if($_COOKIE['langue'] == "English"){
          ?> <script> alert("Some fields have not been filled !")</script> <?php
        } else {
          ?> <script> alert("Des champs n'ont pas été rempli !")</script> <?php
        }
      }
    }

    $vue = new Vue('Admin');
    $vue->generer(array('nouveauxAdmins'=>$afficherPossiblesAdmins, 'admins' => $afficherAdmins, 'abannir'=>$banniPossible, 'membreBanni'=>$banni, 'membres' => $membresSite, 'membres' => $membresSite, 'listeGroupes'=>$groupes, 'listeEvenements'=>$evenements, 'listeClubs'=>$clubs));
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

  public function modificationClub($nomClub){
    $club = new clubs();
    $admin = new administration();
    $infos = $club->afficherCaracteristiquesClub($nomClub)->fetch();

    if (isset ($_POST['Modifier'])){
      if($_POST['nomClub'] != "" && $_POST['adresseClub'] != "" && $_POST['cpClub'] !="" && $_POST['numeroClub'] !="" && $_POST['c_hoLundiDebut'] !="" && $_POST['c_hoMardiDebut'] !="" && $_POST['c_hoMercrediDebut'] !="" && $_POST['c_hoJeudiDebut'] !="" && $_POST['c_hoVendrediDebut'] !=""
      && $_POST['c_hoSamediDebut'] !="" && $_POST['c_hoDimancheDebut'] !="" && $_POST['c_hoLundiFin'] !="" && $_POST['c_hoMardiFin'] !=""
      && $_POST['c_hoMercrediFin'] !="" && $_POST['c_hoJeudiFin'] !="" && $_POST['c_hoVendrediFin'] !=""
      && $_POST['c_hoSamediFin'] !="" && $_POST['c_hoDimancheFin'] !=""){
        $resultatC = $club->verifClub2($nomClub)->fetch();
        $resultatCP = $club->verifCPClub()->fetch();
        if (!$resultatC){
          if ($resultatCP){
            $modif = $admin->modifierCaracteristiquesClub($nomClub);
            header("Location: index.php?page=administration");
          } else {
            if($_COOKIE['langue'] == "English"){
              ?> <script> alert("This Postal Code doesn't exist !")</script> <?php
            } else {
              ?> <script> alert("Ce Code Postal n'existe pas !")</script> <?php
            }
          }
        } else {
          if($_COOKIE['langue'] == "English"){
            ?> <script> alert("This club already exists !")</script> <?php
          } else {
            ?> <script> alert("Ce club existe déjà !")</script> <?php
          }
        }
      } else {
        if($_COOKIE['langue'] == "English"){
          ?> <script> alert("Some fields have not been filled !")</script> <?php
        } else {
          ?> <script> alert("Des champs n'ont pas été rempli !")</script> <?php
        }
      }
    }
    $vue = new Vue('ModifClub');
    $vue->generer(array('caractClub'=>$infos));

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

  public function moderationCommentairesClub($nomClub){
    $club = new clubs();
    $admin = new administration();
    $infos = $club->afficherCaracteristiquesClub($nomClub)->fetch();
    $notes = $admin->afficherCommentairesClub($nomClub)->fetchAll();
    $vue = new Vue('ModerationCommentairesClub');
    $vue->generer(array('caractClub'=>$infos, 'NoteClub'=>$notes));
  }

  public function suppressionCommentaire($id){
    $admin = new administration();
    $admin->supprimerCommentaireClub($id);
    header("Location: index.php?page=administration");
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
    if (isset($_POST['Ajouter'])){
      if ($_POST['question'] != " " && $_POST['reponse'] != " "){
        $admin->ajouterQuestion();
        header("Location: index.php?page=administration");
      } else {
        if($_COOKIE['langue'] == "English"){
          ?> <script> alert("Some fields have not been filled !")</script> <?php
        } else {
          ?> <script> alert("Des champs n'ont pas été rempli !")</script> <?php
        }
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
