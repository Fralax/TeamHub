<?php

require_once "Modeles/modele.php";

class groupes extends modele {

  public function ajoutGroupeBdd(){

    $sql = 'INSERT INTO Groupes(g_admin, g_nom, g_placesLibres, g_sport, g_departement)
            VALUES (:admin, :nomGroupe, :placesLibres, :sport, :departement)';

    $ajoutGroupeBdd = $this->executerRequete ($sql, array('admin'=> $_SESSION['pseudo'], 'nomGroupe'=> $_POST['nomGroupe'], 'placesLibres'=> $_POST['placesLibres'], 'sport'=> $_POST['sport'], 'departement'=> $_POST['departement']));
  }

  public function afficherCaracteristiquesGroupe($nom){
    $sql = 'SELECT g_nom, g_admin, g_sport, g_departement, g_placesLibres FROM Groupes WHERE g_nom = ?';
    $afficherCaracteristiquesGroupe = $this->executerRequete ($sql, array($nom));
    return $afficherCaracteristiquesGroupe;
  }

  public function afficherMesGroupes(){

    $sql = 'SELECT g_nom FROM Appartient WHERE u_pseudo = ? ';

    $afficherMesGroupes = $this->executerRequete ($sql, array($_SESSION['pseudo']));
    return $afficherMesGroupes;
  }

  public function afficherGroupes(){

    $sql = 'SELECT g_nom, g_admin FROM Groupes';
    $afficherGroupes = $this->executerRequete ($sql);
    return $afficherGroupes;
  }
}
?>
