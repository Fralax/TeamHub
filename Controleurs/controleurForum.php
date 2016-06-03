<?php

require_once 'Modeles/forum.php';
require_once 'Vues/vue.php';

class controleurForum{

  public function afficherAccueilForum(){
    $vue = new Vue('AccueilForum');
    $vue->generer();
  }

  public function afficherSujet($categorie){
    $_SESSION['currentPage'] = $_SERVER['REQUEST_URI'];
    $forum = new forum();
    $sujets = $forum->afficherSujets($categorie)->fetchAll();
    $vue = new Vue('CategorieForum');
    $vue->generer(array('sujets'=>$sujets, 'categorie' => $_GET['categorie']));
  }

  public function creationSujet($categorie){
    $forum = new forum();
    if (isset($_POST['Creer'])){
      if ($_POST['nomSujet'] != "" && $_POST['message'] != " "){
        $forum->creerSujet($categorie);
        header("Location: index.php?page=forum&categorie=".$categorie);
      } else {
        if($_COOKIE['langue'] == "English"){
          ?> <script> alert("Some fields have not been filled !")</script> <?php
        } else {
          ?> <script> alert("Des champs n'ont pas été rempli !")</script> <?php
        }
      }
    }
    $vue = new Vue('CreationSujetForum');
    $vue->generer();
  }

  public function affichageDetailsSujet($id){
    $forum = new forum();
    if (isset($_POST['Repondre'])){
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
    $categorie = $forum->recupCategorie($id)->fetch();
    header("Location: index.php?page=forum&categorie=".$categorie[0]);
  }

  public function affichageFAQ(){
    $forum = new forum();
    $faq = $forum->afficherFAQ()->fetchAll();

    $vue = new Vue('FAQ');
    $vue->generer(array('faq'=>$faq));
  }

  public function modificationVues($idSujet){
    $forum = new forum();
    $currentPage = $_SERVER['REQUEST_URI'];

    if ($_SESSION['currentPage'] != $currentPage){
      $_SESSION['currentPage'] = $currentPage;
      $recupVues = $forum->recupVuesSujet($idSujet)->fetch();

      settype($recupVues[0], "integer");
      $nbrVues = $recupVues[0] + 1;

      $insertVues = $forum->insertVuesSujet($idSujet, $nbrVues);
      $currentPage = $_SERVER['REQUEST_URI'];
    }
  }

}
?>
