<?php

require_once "Modeles/modele.php";

class groupes extends modele {

  public function ajoutGroupeBdd(){

    $sql = 'INSERT INTO Groupes(g_admin, g_nom, g_placesLibres, g_sport, g_departement)
            VALUES (:admin, :nomGroupe, :placesLibres, :sport, :departement)';

    $ajoutGroupeBdd = $this->executerRequete ($sql, array('admin'=> $_SESSION['pseudo'], 'nomGroupe'=> $_POST['nomGroupe'], 'placesLibres'=> $_POST['placesLibres'], 'sport'=> $_POST['sport'], 'departement'=> $_POST['departement']));
  }

  public function afficherCaracteristiqueGroupe($idGroupe){

    $sql = 'SELECT g_admin, g_sport, g_departement, g_placesLibres FROM Groupes WHERE g_nom=?';

    $afficherCaracteristiqueGroupe = $this->executerRequete ($sql, array($idGroupe));
    return $afficherCaracteristiqueGroupe;
  }

  public function afficherMesGroupes(){

    $sql = 'SELECT u_groupe1, u_groupe2, u_groupe3, u_groupe4, u_groupe5 FROM Utilisateurs WHERE u_pseudo = :pseudo ';

    $afficherMesGroupes = $this->executerRequete ($sql, array('pseudo'=>$_SESSION['pseudo']));
    return $afficherMesGroupes;
  }
}
?>
