<?php

require_once "Modeles/modele.php";

class administration extends modele {

  public function listerAbannir(){
    $sql = 'SELECT u_pseudo FROM Utilisateurs WHERE u_pseudo != ?';
    $listerAbannir = $this->executerRequete ($sql, array($_SESSION['pseudo']));
    return $listerAbannir;
  }

  public function recupMail(){
    $sql = 'SELECT u_email FROM Utilisateurs WHERE u_pseudo = ?';
    $mailbanni = $this->executerRequete ($sql, array($_POST['banni']));
    return $mailbanni;
  }

  public function bannirMembre($mail){
    $sql = 'INSERT INTO Bannis(b_nom, b_email) VALUES (:nomAbannir, :mailAbannir)';
    $bannirMembre = $this->executerRequete ($sql, array('nomAbannir'=>$_POST['banni'], 'mailAbannir'=>$mail));
  }
}
?>
