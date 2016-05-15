<?php

require_once 'Modeles/clubs.php';
require_once 'Vues/vue.php';

class ControleurClubs{

  public function ajoutClub(){
    $club = new clubs();
    if (isset($_POST['ajouter']) && $_POST['ajouter'] == 'Ajouter'){
      if($_POST['nomClub'] != "" && $_POST['adresseClub'] != "" && $_POST['cpClub'] !="" && $_POST['numeroClub'] !="" && $_POST['hLundiDebut'] !="" && $_POST['mLundiDebut'] !="" && $_POST['hMardiDebut'] !=""
      && $_POST['mMardiDebut'] !="" && $_POST['hMercrediDebut'] !="" && $_POST['mMercrediDebut'] !="" && $_POST['hJeudiDebut'] !="" && $_POST['mJeudiDebut'] !="" && $_POST['hVendrediDebut'] !="" && $_POST['mVendrediDebut'] !=""
      && $_POST['hSamediDebut'] !="" && $_POST['mSamediDebut'] !="" && $_POST['hDimancheDebut'] !="" && $_POST['mDimancheDebut'] !=""){
        if ($_POST['hLundiFin'] !="" && $_POST['mLundiFin'] !="" && $_POST['hMardiFin'] !="" && $_POST['mMardiFin'] !="" && $_POST['hMercrediFin'] !="" && $_POST['mMercrediFin'] !="" && $_POST['hJeudiFin'] !=""
        && $_POST['mJeudiFin'] !="" && $_POST['hVendrediFin'] !="" && $_POST['mVendrediFin'] !="" && $_POST['hSamediFin'] !="" && $_POST['mSamediFin'] !="" && $_POST['hDimancheFin'] !="" && $_POST['mDimancheFin'] !=""
        && isset($_FILES['photo'])){
          $resultatC = $club->verifClub()->fetch();
          if (!$resultatC){
            $club->ajouterClubBdd();
            header('refresh:1;url=index.php?page=accueil');
          } else {
            echo "Un club de ce nom existe déjà !";
          }
        } else {
          echo "Des champs n'ont pas été rempli";
        }
      }
      else {
        echo "Des champs n'ont pas été rempli !";
      }
    }

    $vue = new Vue('AjoutClub');
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
    $CaracteristiquesClub = $club->afficherCaracteristiquesClub($nom)->fetch();
    $listeDerniereNote = $club->listerDerniereNote($nom)->fetchAll();
    $listeMeilleureNote = $club->listerMeilleureNote($nom)->fetchAll();
    $listePireNote = $club->listerPireNote($nom)->fetchAll();
    $vue = new Vue('Club');
    $vue->generer(array('caractClub'=>$CaracteristiquesClub, 'derniereNoteClub' =>$listeDerniereNote, 'meilleureNoteClub' => $listeMeilleureNote, 'pireNoteClub'=>$listePireNote));
  }

  public function notationClub($nom){
    $club = new clubs();
    if (isset($_POST['Noter'])){
      $ajoutNote = $club->noterClub($nom);
    }
  }

  public function listeNote(){
    $club = new clubs();
    $listeNote = $club->listerNote($nom)->fetchAll();
  }

}
?>
