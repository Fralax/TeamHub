<?php

require_once 'Modeles/forum.php';
require_once 'Vues/vue.php';

class controleurForum{

  public function afficherAccueilForum(){

    $vue = new Vue('AccueilForum');
    $vue->generer();
  }

  public function afficherSujet($categorie){
    $forum = new forum();
    $sujets = $forum->afficherSujet($categorie)->fetchAll();
    $vue = new Vue($categorie.'Forum');
    $vue->generer(array('sujets'=>$sujets));
  }

  public function creationSujet($categorie){
    $forum = new forum();
    if (isset($_POST['Creer']) && $_POST['Creer'] == 'Créer'){
      $forum->creerSujet($categorie);
      header("Location: index.php?page=forum&categorie=".$categorie);
    }
    $vue = new Vue($categorie.'Forum');
    $vue->generer();
  }

}
?>
