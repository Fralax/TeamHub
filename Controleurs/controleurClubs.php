<?php

require_once 'Modeles/clubs.php';
require_once 'Vues/vue.php';

class ControleurClubs{

  public function ajoutClub(){
    $club = new clubs();
    if (isset($_POST['ajouter']) && $_POST['ajouter'] == 'Ajouter'){
      if($_POST['nomClub'] != "" && $_POST['adresseClub'] != "" && $_POST['cpClub'] !=""){
        $club->ajouterClubBdd();
        header('refresh:1;url=index.php?page=accueil');
      }
    }

    $vue = new Vue('AjoutClub');
    $vue->generer();
  }

  public function listeclubs(){
    $club = new clubs();
    $listeclubss = $club->listerClub()->fetchAll();
    $vue = new Vue('VoirLesClubs');
    $vue->generer(array('club'=>$listeclubss));
  }
}
?>
