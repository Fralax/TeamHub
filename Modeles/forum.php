<?php

require_once "Modeles/modele.php";

class forum extends modele {

  public function creerSujet($categorie){
    $dateA = date('Y-m-d H:i:s');
    $sql = 'INSERT INTO teamhubp_teamhub.sujetForum(f_categorie, f_sujet, f_message, f_date, f_auteur, f_nombreReponses, f_actif, f_dateDernierCommentaire, f_nbrVues) VALUES (:categorieSujet, :nomSujet, :message, :dateSujet, :auteurSujet, :nombreReponsesSujet, :activiteSujet, :dateDernierCommentaire, :nbrVues)';
    $creationSujet = $this->executerRequete($sql, array(
      'categorieSujet'=>$categorie,
      'nomSujet'=>$_POST['nomSujet'],
      'message'=>nl2br($_POST['message']),
      'dateSujet'=>$dateA,
      'auteurSujet'=>$_SESSION['pseudo'],
      'nombreReponsesSujet'=>"0",
      'activiteSujet'=>"1",
      'dateDernierCommentaire' => $dateA,
      'nbrVues' => "0"));

    $sql3 = 'SELECT f_id FROM teamhubp_teamhub.sujetForum WHERE f_sujet = ?';
    $recupID = $this->executerRequete($sql3, array($_POST['nomSujet']))->fetch();

    $sql2 = 'INSERT INTO teamhubp_teamhub.messageForum (m_auteur, m_message, f_id, m_date) VALUE(:auteur, :message, :id, :dateMessage)';
    $ajoutMessagebddd = $this->executerRequete($sql2, array('auteur' => $_SESSION['pseudo'], 'message'=>nl2br($_POST['message']), 'id' => $recupID[0], 'dateMessage' => $dateA));
  }

  public function afficherSujets($categorie){
    $sql = 'SELECT f_id, f_sujet, f_date, f_auteur, f_nombreReponses, f_actif, f_nbrVues FROM teamhubp_teamhub.sujetForum WHERE f_categorie = ? ORDER BY f_dateDernierCommentaire DESC';
    $afficherSujet = $this->executerRequete ($sql, array($categorie));
    return $afficherSujet;
  }

  public function detailSujet($id){
    $sql = 'SELECT f_auteur, f_sujet, f_message, f_id, f_actif FROM teamhubp_teamhub.sujetForum WHERE f_id = ?';
    $detailSujet = $this->executerRequete ($sql, array($id));
    return $detailSujet;
  }

  public function afficherReponse($id){
    $sql = 'SELECT m_auteur, m_message, m_id FROM teamhubp_teamhub.messageForum WHERE f_id = ? AND m_message NOT IN (SELECT f_message FROM teamhubp_teamhub.sujetForum WHERE f_id = ?) ORDER BY m_date ASC';
    $afficherReponse = $this->executerRequete ($sql, array($id, $id));
    return $afficherReponse;
  }

  public function repondreSujet($id){
    $dateA = date('Y-m-d H:i:s');

    $sql = 'INSERT INTO teamhubp_teamhub.messageForum(m_auteur, m_message, f_id, m_date) VALUES (:auteurReponse, :messageReponse, :idSujet, :dateMessage)';
    $creationSujet = $this->executerRequete($sql, array(
      'auteurReponse'=>$_SESSION['pseudo'],
      'messageReponse'=>nl2br($_POST['message']),
      'idSujet'=>$id,
      'dateMessage'=>$dateA));

    $sql2 = 'UPDATE teamhubp_teamhub.sujetForum SET f_dateDernierCommentaire = :dateDernierCommentaire';
    $dateDernierCommentaire = $this->executerRequete($sql2, array('dateDernierCommentaire' => $dateA));
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

  public function recupSujetsAccueil($categorie){
    $sql = 'SELECT COUNT(*) FROM sujetForum WHERE f_categorie = ?';
    $recupSujetsAccueil = $this->executerRequete($sql, array($categorie));
    return $recupSujetsAccueil;
  }

  public function recupMessagesAccueil($categorie){
    $sql = 'SELECT COUNT(*) FROM teamhubp_teamhub.messageForum WHERE f_id IN (SELECT f_id FROM teamhubp_teamhub.sujetForum WHERE f_categorie = ?)';
    $recupMessagesAccueil = $this->executerRequete($sql, array($categorie));
    return $recupMessagesAccueil;
  }

  public function recupDernierMessageAccueil($categorie){
    $sql = 'SELECT m_auteur, m_date FROM teamhubp_teamhub.messageForum WHERE f_id IN (SELECT f_id FROM teamhubp_teamhub.sujetForum WHERE f_categorie = ?) ORDER BY m_date DESC LIMIT 1';
    $recupDernierMessageAccueil = $this->executerRequete($sql, array($categorie));
    return $recupDernierMessageAccueil;
  }

  public function recupDernierSujetAccueil($categorie){
    $sql = 'SELECT f_id, f_sujet FROM teamhubp_teamhub.sujetForum WHERE f_categorie = ? ORDER BY f_dateDernierCommentaire DESC LIMIT 1';
    $recupDernierSujetAccueil = $this->executerRequete($sql, array($categorie));
    return $recupDernierSujetAccueil;
  }

  public function recupVuesSujet($idSujet){
    $sql = 'SELECT f_nbrVues FROM teamhubp_teamhub.sujetForum WHERE f_id =?';
    $recupVuesSujet = $this->executerRequete($sql, array($idSujet));
    return $recupVuesSujet;
  }

  public function insertVuesSujet($idSujet, $nbrVues){
    $sql = 'UPDATE teamhubp_teamhub.sujetForum SET f_nbrVues = :nbrVues WHERE f_id = :id';
    $insertVuesSujet = $this->executerRequete($sql, array('id' => $idSujet, 'nbrVues' => $nbrVues));
  }

  public function recupDernierMessage($idSujet){
    $sql = 'SELECT m_auteur, m_date FROM teamhubp_teamhub.messageForum WHERE f_id = ? ORDER BY m_date DESC LIMIT 1';
    $dernierMessage = $this->executerRequete($sql, array($idSujet));
    return $dernierMessage;
  }

}
?>
