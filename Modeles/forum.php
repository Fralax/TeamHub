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

  public function detailSujet($id){
    $sql = 'SELECT f_auteur, f_sujet, f_message, f_id, f_actif FROM teamhubp_teamhub.sujetForum WHERE f_id = ?';
    $detailSujet = $this->executerRequete ($sql, array($id));
    return $detailSujet;
  }

  public function afficherReponse($id){
    $sql = 'SELECT m_auteur, m_message, m_id FROM teamhubp_teamhub.messageForum WHERE f_id = ? ORDER BY m_date ASC';
    $afficherReponse = $this->executerRequete ($sql, array($id));
    return $afficherReponse;
  }

  public function repondreSujet($id){
    $dateA = date('Y-m-d');
    $heureA = date('H:i');

    $sql = 'INSERT INTO teamhubp_teamhub.messageForum(m_auteur, m_message, f_id, m_date, m_heure) VALUES (:auteurReponse, :messageReponse, :idSujet, :dateMessage, :heureMessage)';
    $creationSujet = $this->executerRequete($sql, array(
      'auteurReponse'=>$_SESSION['pseudo'],
      'messageReponse'=>$_POST['message'],
      'idSujet'=>$id,
      'dateMessage'=>$dateA,
      'heureMessage'=>$heureA));
  }

  public function fermerSujet($id){
    $sql = 'UPDATE teamhubp_teamhub.sujetForum SET f_actif = ? WHERE f_id = ?';
    $fermerSujet = $this->executerRequete ($sql, array("0", $id));
  }

  public function incrementeNbReponses($id){
    $sql = 'SELECT f_nombreReponses FROM teamhubp_teamhub.sujetForum WHERE f_id = ?';
    $recupNbReponses = $this->executerRequete ($sql, array($id));
    $nbReponses = $recupNbReponses->fetch();
    settype($nbReponses[0], "integer");
    $nbReponses[0] = $nbReponses[0] + 1;
    $sql1 = 'UPDATE teamhubp_teamhub.sujetForum SET f_nombreReponses = :reponse WHERE f_id = :id';
    $updateNbReponses = $this->executerRequete ($sql1, array('reponse'=>$nbReponses[0], 'id'=>$id));
  }

  public function decrementeNbReponses($id){
    $sql = 'SELECT f_nombreReponses FROM teamhubp_teamhub.sujetForum WHERE f_id = ?';
    $recupNbReponses = $this->executerRequete ($sql, array($id));
    $nbReponses = $recupNbReponses->fetch();
    settype($nbReponses[0], "integer");
    $nbReponses[0] = $nbReponses[0] - 1;
    $sql1 = 'UPDATE teamhubp_teamhub.sujetForum SET f_nombreReponses = :reponse WHERE f_id = :id';
    $updateNbReponses = $this->executerRequete ($sql1, array('reponse'=>$nbReponses[0], 'id'=>$id));
  }

  public function afficherFAQ(){
    $sql = 'SELECT faq_id, faq_question, faq_reponse FROM teamhubp_teamhub.FAQ';
    $faq = $this->executerRequete ($sql);
    return $faq;
  }
}
?>
