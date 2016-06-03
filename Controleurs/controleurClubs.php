<?php

require_once 'Modeles/clubs.php';
require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class ControleurClubs{

  public function ajoutClub(){
    $club = new clubs();
    if (isset($_POST['ajouter'])){
      if($_POST['nomClub'] != "" && $_POST['adresseClub'] != "" && $_POST['cpClub'] !="" && $_POST['numeroClub'] !="" && $_POST['hLundiDebut'] !="" && $_POST['mLundiDebut'] !="" && $_POST['hMardiDebut'] !=""
      && $_POST['mMardiDebut'] !="" && $_POST['hMercrediDebut'] !="" && $_POST['mMercrediDebut'] !="" && $_POST['hJeudiDebut'] !="" && $_POST['mJeudiDebut'] !="" && $_POST['hVendrediDebut'] !="" && $_POST['mVendrediDebut'] !=""
      && $_POST['hSamediDebut'] !="" && $_POST['mSamediDebut'] !="" && $_POST['hDimancheDebut'] !="" && $_POST['mDimancheDebut'] !="" && $_POST['hLundiFin'] !="" && $_POST['mLundiFin'] !="" && $_POST['hMardiFin'] !=""
      && $_POST['mMardiFin'] !="" && $_POST['hMercrediFin'] !="" && $_POST['mMercrediFin'] !="" && $_POST['hJeudiFin'] !="" && $_POST['mJeudiFin'] !="" && $_POST['hVendrediFin'] !="" && $_POST['mVendrediFin'] !=""
      && $_POST['hSamediFin'] !="" && $_POST['mSamediFin'] !="" && $_POST['hDimancheFin'] !="" && $_POST['mDimancheFin'] !="" && isset($_FILES['photo'])){
        $resultatC = $club->verifClub()->fetch();
        if (!$resultatC){
          $club->ajouterClubBdd();
          header("Location: index.php?page=confirmationclub");
        } else {
          if($_COOKIE['langue'] == "English"){
            ?> <script> alert("This club already exists !")</script> <?php
          } else {
            ?> <script> alert("Ce club existe déjà !")</script> <?php
          }
        }
      }
      else {
        if($_COOKIE['langue'] == "English"){
          ?> <script> alert("Some fields have not been filled !")</script> <?php
        } else {
          ?> <script> alert("Des champs n'ont pas été rempli !")</script> <?php
        }
      }
    }

    $vue = new Vue('AjoutClub');
    $vue->generer();
  }


    public function confirmationClub(){
      $vue = new Vue('ConfirmationClub');
      $vue->generer();
    }

  public function listeclubs(){
    $club = new clubs();
    $listeclubs = $club->listerClub()->fetchAll();
    $vue = new Vue('VoirLesClubs');
    $vue->generer(array('club'=>$listeclubs));
  }

  public function affichageCaracteristiquesClub($nom){
    $club = new clubs();
    $user = new Utilisateurs();
    $CaracteristiquesClub = $club->afficherCaracteristiquesClub($nom)->fetch();
    $listeDerniereNote = $club->listerDerniereNote($nom)->fetchAll();
    $listeMeilleureNote = $club->listerMeilleureNote($nom)->fetchAll();
    $listePireNote = $club->listerPireNote($nom)->fetchAll();
    $listeMembresNote = $user->listerMembresNote($nom)->fetchAll();
    $vue = new Vue('Club');
    $vue->generer(array('caractClub'=>$CaracteristiquesClub, 'derniereNoteClub' =>$listeDerniereNote, 'meilleureNoteClub' => $listeMeilleureNote, 'pireNoteClub'=>$listePireNote, 'membresNote' => $listeMembresNote));
  }

  public function notationClub($nom){
    $club = new clubs();
    if (isset($_POST['Noter'])){
      if ($_POST['noteClub'] != "" && $_POST['commentaireClub'] != ""){
        $ajoutNote = $club->noterClub($nom);
      } else {
        if($_COOKIE['langue'] == "English"){
          ?> <script> alert("Some fields have not been filled !")</script> <?php
        } else {
          ?> <script> alert("Des champs n'ont pas été rempli !")</script> <?php
        }
      }
    }
  }

  public function listeNote(){
    $club = new clubs();
    $listeNote = $club->listerNote($nom)->fetchAll();
  }

}
?>
