<?php

require_once "Modeles/modele.php";

class groupes extends modele {

  public function ajoutGroupeBdd(){

    $sql = 'INSERT INTO Groupes(g_admin, g_nom, g_sport, g_departement, g_placelibre)
            VALUES (:admin, :nomgroupe, :sport, :department, :placelibre)';

    $ajoutGroupeBdd = $this->executerRequete ($sql, array('admin'=> $_POST['admin'], 'nomgroupe'=> $_POST['nomgroupe'], 'sport'=> $_POST['sport'], 'department'=> $_POST['department'], 'placelibre'=> $_POST['placelibre']));
  }

}
?>
