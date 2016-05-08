<?php

require_once 'Modeles/club.php';
require_once 'Vues/vue.php';

class controleurClub{

  public function ajoutClub(){
    $club = new club();
    if (isset($_POST['ajouter']) && $_POST['ajouter'] == 'Ajouter'){
      if($_POST['nomClub'] != "" && $_POST['adresseClub'] != "" && $_POST['cpClub'] !=""){
        $club->ajouterClubBdd();
        header('refresh:1;url=index.php?page=accueil');
      }
    }

    $vue = new Vue('AjoutClub');
    $vue->generer();
  }

  public function listeClub(){
    $club = new club();
    $ListeClubs = $club->listerClub()->fetchAll();
    $vue = new Vue('VoirLesClubs');
    $vue->generer(array('club'=>$ListeClubs));
  }
}
?>
