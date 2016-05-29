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
    $vue = new Vue('CategorieForum');
    $vue->generer(array('sujets'=>$sujets, 'categorie' => $_GET['categorie']));
  }

  public function creationSujet($categorie){
    $forum = new forum();
    if (isset($_POST['Creer']) && $_POST['Creer'] == 'Créer'){
      $forum->creerSujet($categorie);
      header("Location: index.php?page=forum&categorie=".$categorie);
    }
    $vue = new Vue('CreationSujetForum');
    $vue->generer();
  }

  public function affichageDetailleSujet($id){
    $forum = new forum();
    if (isset($_POST['Repondre']) && $_POST['Repondre'] == 'Répondre'){
      if ($_POST['message'] != ""){
        $forum->repondreSujet($id);
        $forum->incrementeNbReponses($id);
        header("Location: index.php?page=sujetforum&id=".$id);
      }
    }
    $detailSujet = $forum->detailSujet($id)->fetch();
    $reponse = $forum->afficherReponse($id)->fetchAll();

    $vue = new Vue('SujetForum');
    $vue->generer(array('message'=>$detailSujet, 'reponses'=>$reponse));
  }

  public function fermetureSujet($id){
    $forum = new forum();
    $forum->fermerSujet($id);
    header("Location: index.php?page=afficherAccueilForum");
  }

  public function affichageFAQ(){
    $forum = new forum();
    $faq = $forum->afficherFAQ()->fetchAll();

    $vue = new Vue('FAQ');
    $vue->generer(array('faq'=>$faq));
  }

}
?>
