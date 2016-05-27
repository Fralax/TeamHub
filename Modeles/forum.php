<?php

require_once "Modeles/modele.php";

class forum extends modele {

  public function creerSujet($categorie){
    $dateA = date('Y-m-d');
    $heureA = date('H:i');
    $sql = 'INSERT INTO teamhubp_teamhub.sujetForum(f_categorie, f_sujet, f_message, f_date, f_heure, f_auteur, f_nombreReponses, f_actif) VALUES (:categorieSujet, :nomSujet, :message, :dateSujet, :heureSujet, :auteurSujet, :nombreReponsesSujet, :activiteSujet)';
    $creationSujet = $this->executerRequete($sql, array(
      'categorieSujet'=>$categorie,
      'nomSujet'=>$_POST['nomSujet'],
      'message'=>$_POST['message'],
      'dateSujet'=>$dateA,
      'heureSujet'=>$heureA,
      'auteurSujet'=>$_SESSION['pseudo'],
      'nombreReponsesSujet'=>"0",
      'activiteSujet'=>"1"));
  }

  public function afficherSujet($categorie){
    $sql = 'SELECT f_id, f_sujet, f_date, f_heure, f_auteur, f_nombreReponses, f_actif FROM teamhubp_teamhub.sujetForum WHERE f_categorie = ?';
    $afficherSujet = $this->executerRequete ($sql, array($categorie));
    return $afficherSujet;
  }
}
?>
