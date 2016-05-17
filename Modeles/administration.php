<?php

require_once "Modeles/modele.php";

class administration extends modele {

  public function listerAbannir(){
    $sql = 'SELECT u_pseudo FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo != ? AND u_pseudo NOT IN (SELECT b_nom FROM teamhubp_teamhub.Bannis )';
    $listerAbannir = $this->executerRequete ($sql, array($_SESSION['pseudo']));
    return $listerAbannir;
  }

  public function listerBanni(){
    $sql = 'SELECT b_nom FROM teamhubp_teamhub.Bannis';
    $listerBanni = $this->executerRequete ($sql);
    return $listerBanni;
  }

  public function recupMail(){
    $sql = 'SELECT u_email FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo = ?';
    $mailbanni = $this->executerRequete ($sql, array($_POST['banni']));
    return $mailbanni;
  }

  public function bannirMembre($mail){
    $sql = 'INSERT INTO teamhubp_teamhub.Bannis (b_nom, b_email) VALUES (:nomAbannir, :mailAbannir)';
    $bannirMembre = $this->executerRequete ($sql, array('nomAbannir'=>$_POST['banni'], 'mailAbannir'=>$mail));
  }

  public function debannir($nom){
    $sql = 'DELETE FROM teamhubp_teamhub.Bannis WHERE b_nom = ?';
    $debannir = $this->executerRequete ($sql, array($nom));
  }

  public function ListerGroupes(){
    $sql ='SELECT g_nom FROM teamhubp_teamhub.Groupes';
    $ListerGroupes = $this->executerRequete ($sql);
    return $ListerGroupes;
  }

  public function ListerGroupesAdmin($nomBanni){
    $sql = 'SELECT g_nom FROM teamhubp_teamhub.Appartient WHERE u_pseudo = ? AND a_admin = ?';
    $ListerGroupesAdmin = $this->executerRequete ($sql, array($nomBanni, "admin"));
    return $ListerGroupesAdmin;
  }

  public function ListerGroupesNonAdmin($nomBanni){
    $sql = 'SELECT g_nom FROM teamhubp_teamhub.Appartient WHERE u_pseudo = ? AND a_admin = ?';
    $ListerGroupesNonAdmin = $this->executerRequete ($sql, array($nomBanni, "nonAdmin"));
    return $ListerGroupesNonAdmin;
  }

  public function ListerEvenements(){
    $sql = 'SELECT e_nom FROM teamhubp_teamhub.Evenements';
    $ListerEvenements = $this->executerRequete ($sql);
    return $ListerEvenements;
  }

}
?>
