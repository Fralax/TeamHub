<?php

require_once 'Modeles/clubs.php';
require_once 'Vues/vue.php';

class ControleurClubs{

  public function ajoutClub(){
    $club = new clubs();
    if (isset($_POST['ajouter']) && $_POST['ajouter'] == 'Ajouter'){
      if($_POST['nomClub'] != "" && $_POST['adresseClub'] != "" && $_POST['cpClub'] !="" && isset($_FILES['photo'])){
        $club->ajouterClubBdd();
        header('refresh:1;url=index.php?page=accueil');
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
    $listeNote = $club->listerDerniereNote($nom)->fetchAll();
    echo '<pre>';
    var_dump($listeNote);
    echo '</pre>';
    $vue = new Vue('Club');
    $vue->generer(array('caractClub'=>$CaracteristiquesClub, 'noteClub' =>$listeNote));
  }

  public function notationClub($nom){
    $club = new clubs();
    if (isset($_POST['Noter'])){
      $ajoutNote = $club->noterClub($nom);
    }
  }
}
?>
