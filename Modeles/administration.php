<?php

require_once "Modeles/modele.php";

class administration extends modele {

  public function listerAbannir(){
    $sql = 'SELECT u_pseudo FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo != ? AND u_pseudo NOT IN (SELECT b_nom FROM teamhubp_teamhub.Banni )';
    $listerAbannir = $this->executerRequete ($sql, array($_SESSION['pseudo']));
    return $listerAbannir;
  }

  public function listerBanni(){
    $sql = 'SELECT b_nom FROM teamhubp_teamhub.Banni';
    $listerBanni = $this->executerRequete ($sql);
    return $listerBanni;
  }

  public function recupMail(){
    $sql = 'SELECT u_email FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo = ?';
    $mailbanni = $this->executerRequete ($sql, array($_POST['banni']));
    return $mailbanni;
  }

  public function bannirMembre($mail){
    $sql = 'INSERT INTO teamhubp_teamhub.Banni(b_nom, b_email) VALUES (:nomAbannir, :mailAbannir)';
    $bannirMembre = $this->executerRequete ($sql, array('nomAbannir'=>$_POST['banni'], 'mailAbannir'=>$mail));
  }
}
?>
