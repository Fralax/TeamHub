<?php

require_once "Modeles/modele.php";

class club extends modele {

  public function ajouterClubBdd(){
    $sql = 'INSERT INTO Clubs(c_nom, c_adresse, c_cp) VALUES (:nomClub, :adresseClub, :cpClub)';
    $ajouterClubBdd = $this->executerRequete ($sql, array('nomClub'=>$_POST['nomClub'], 'adresseClub'=>$_POST['adresseClub'], 'cpClub'=>$_POST['cpClub']));
  }

  public function listerClub(){
    $sql = 'SELECT c_nom, c_adresse, c_cp FROM Clubs';
    $listerClub = $this->executerRequete ($sql);
    return $listerClub;
  }

}
?>
