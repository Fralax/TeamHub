<?php

require_once "Modeles/modele.php";

class messagerie extends modele {

  public function recupDestinatairesPossibles(){
    $sql = 'SELECT u_pseudo FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo NOT IN (SELECT u_pseudo FROM teamhubp_teamhub.Bannis)';
    $recupDestinatairesPossibles = $this->executerRequete($sql);
    return $recupDestinatairesPossibles;
  }

  public function envoyerMessage($expediteur, $destinataire, $dateEnvoi, $message){
    $sql = 'INSERT INTO teamhubp_teamhub.Messages (mi_expediteur, mi_destinataire, mi_date, mi_message) VALUES (:expediteur, :destinataire, :dateEnvoi, :message)';
    $envoyerMessage = $this->executerRequete($sql, array('expediteur' => $expediteur, 'destinataire' => $destinataire, 'dateEnvoi' => $dateEnvoi, 'message' => $message));
  }

  public function nouvelleConversation($correspondantA, $correspondantB){
    $sql = 'INSERT INTO teamhubp_teamhub.Conversations (c_correspondantA, c_correspondantB) VALUES (:correspondantA, :correspondantB)';
    $nouvelleConversation = $this->executerRequete($sql, array('correspondantA' => $correspondantA, 'correspondantB' => $correspondantB));
  }

  public function recupConversation($pseudo){
    $sql = 'SELECT c_correspondantA, c_correspondantB FROM teamhubp_teamhub.Conversations WHERE c_correspondantA = ? OR c_correspondantB = ?';
    $recupConversation = $this->executerRequete($sql, array($pseudo, $pseudo));
    return $recupConversation;
  }

  public function recupDetailsConversation($correspondantA, $correspondantB){
    $sql = 'SELECT mi_id, mi_expediteur, mi_destinataire, mi_date, mi_message FROM teamhubp_teamhub.Messages WHERE (mi_expediteur = :correspondantB AND mi_destinataire = :correspondantA) OR (mi_expediteur = :correspondantA AND mi_destinataire = :correspondantB) ORDER BY mi_date ASC';
    $recupDetailsConversation = $this->executerRequete($sql, array('correspondantA' => $correspondantA, 'correspondantB' => $correspondantB));
    return $recupDetailsConversation;
  }

  public function repondreConversation($reponse, $expediteur, $destinataire, $date){
    $sql = 'INSERT INTO teamhubp_teamhub.Messages (mi_message, mi_expediteur, mi_destinataire, mi_date) VALUES (:message, :expediteur, :destinataire, :dateEnvoi)';
    $repondreConversation = $this->executerRequete($sql, array('message' => $reponse, 'expediteur' => $expediteur, 'destinataire' => $destinataire, 'dateEnvoi' => $date));
  }

  public function IDDernierMessage($correspondantA, $correspondantB){
    $sql = 'SELECT mi_id, mi_message, mi_expediteur, mi_destinataire, mi_date FROM teamhubp_teamhub.Messages WHERE (mi_expediteur = :correspondantB AND mi_destinataire = :correspondantA) OR (mi_expediteur = :correspondantA AND mi_destinataire = :correspondantB) ORDER BY mi_date DESC LIMIT 1';
    $IDDernierMessage = $this->executerRequete($sql, array('correspondantA' => $correspondantA, 'correspondantB' => $correspondantB));
    return $IDDernierMessage;
  }

  public function recupNouveauxMessages($id, $expediteur, $destinataire){
    $sql = 'SELECT mi_id, mi_expediteur, mi_destinataire, mi_date, mi_message FROM teamhubp_teamhub.Messages WHERE ((mi_expediteur = :expediteur AND mi_destinataire = :destinataire) OR (mi_expediteur = :destinataire AND mi_destinataire = :expediteur)) AND mi_id > :id ORDER BY mi_date ASC';
    $recupNouveauxMessages = $this->executerRequete($sql, array('expediteur' => $expediteur, 'destinataire' => $destinataire, 'id' => $id));
    return $recupNouveauxMessages;
  }

  public function updateSatutMessageDirect($id){
    $sql = 'UPDATE teamhubp_teamhub.Messages set mi_lu = :statut WHERE mi_id = :id';
    $updateSatutMessage = $this->executerRequete($sql, array("statut" => 1, "id" => $id));
  }

  public function updateSatutMessageAbsent(){
    $sql = 'UPDATE teamhubp_teamhub.Messages set mi_lu = :statut WHERE mi_id <= :id AND mi_destinataire = :sessionPseudo AND mi_expediteur = :expediteur';
    $updateSatutMessage = $this->executerRequete($sql, array("statut" => 1, "id" => $_GET['id'], "sessionPseudo" => $_SESSION['pseudo'], "expediteur" => $_GET['correspondantB']));
  }

  public function recupMessagesNonLus(){
    $sql = 'SELECT COUNT(mi_id) FROM teamhubp_teamhub.Messages WHERE mi_destinataire = ? AND mi_lu = ?';
    $recupMessagesNonLus = $this->executerRequete($sql, array($_SESSION['pseudo'], 0));
    return $recupMessagesNonLus;
  }

  public function recupMessagesConversationsNonLus($expediteur){
    $sql = 'SELECT COUNT(mi_id) FROM teamhubp_teamhub.Messages WHERE mi_destinataire = ? AND mi_expediteur = ? AND mi_lu = ?';
    $recupMessagesConversationsNonLus = $this->executerRequete($sql, array($_SESSION['pseudo'], $expediteur, 0));
    return $recupMessagesConversationsNonLus;
  }
}
