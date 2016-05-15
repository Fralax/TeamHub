<?php

require_once "Modeles/modele.php";

class administration extends modele {

  public function listerABanir(){
    $sql = 'SELECT u_pseudo FROM Utilisateurs WHERE u_pseudo != ?';
    $listerABanir = $this->executerRequete ($sql, array($_SESSION['pseudo']));
    return $listerABanir;
  }

  public function recupMail(){
    $sql = 'SELECT u_email FROM Utilisateurs WHERE u_pseudo = ?';
    $mailBani = $this->executerRequete ($sql, array($_POST['Bani']));
    return $mailBani;
  }

  public function banirMembre($mail){
    $sql = 'INSERT INTO Bani(b_nomn b_email) VALUES (:nomABanir, :mailABanir)';
    $banirMembre = $this->executerRequete ($sql, array('nomABanir'=>$_POST['Bani'], 'mailABanir'=>$mail));
  }
}
?>
