<?php

require_once "Modeles/modele.php";

class groupes extends modele {

  public function ajoutGroupeBdd(){

    $sql = 'INSERT INTO Groupes(g_admin, g_nom, g_placesTotales, g_placesLibres ,g_sport, g_departement)
            VALUES (:admin, :nomGroupe, :placesLibres, :placesLibres, :sport, :departement)';

    $ajoutGroupeBdd = $this->executerRequete ($sql, array('admin'=> $_SESSION['pseudo'], 'nomGroupe'=> $_POST['nomGroupe'], 'placesLibres'=> $_POST['placesLibres'], 'sport'=> $_POST['sport'], 'departement'=> $_POST['departement']));
  }

  public function supprimerGroupeBdd($nom){
    $sql = 'DELETE FROM Groupes WHERE g_nom = ?';
    $supprimerGroupeBdd = $this ->executerRequete ($sql, array($nom));
  }

  public function afficherCaracteristiquesGroupe($nom){
    $sql = 'SELECT g_nom, g_admin, g_sport, g_departement, g_description, g_placesTotales FROM Groupes WHERE g_nom = ?';
    $afficherCaracteristiquesGroupe = $this->executerRequete ($sql, array($nom));
    return $afficherCaracteristiquesGroupe;
  }

  public function afficherMesGroupes(){
    $sql = 'SELECT g_nom FROM Appartient WHERE u_pseudo = ? AND a_admin = ?';
    $afficherMesGroupes = $this->executerRequete ($sql, array($_SESSION['pseudo'], "nonAdmin"));
    return $afficherMesGroupes;
  }

  public function afficherMesGroupesAdmin(){
    $sql = 'SELECT g_nom FROM Appartient WHERE u_pseudo = ? AND a_admin = ?';
    $afficherMesGroupes = $this->executerRequete ($sql, array($_SESSION['pseudo'], "admin"));
    return $afficherMesGroupes;
  }

  public function afficherGroupes(){
    $sql = 'SELECT DISTINCT(g_nom) FROM Appartient WHERE g_nom NOT IN (SELECT g_nom from Appartient where u_pseudo = ?)';
    $afficherGroupes = $this->executerRequete ($sql, array($_SESSION['pseudo']));
    return $afficherGroupes;
  }

  public function modifierDescriptionGroupe($nom){
    $sql='UPDATE Groupes SET g_description = :description WHERE g_nom = :nom';
    $modifierDescriptionGroupe = $this->executerRequete ($sql, array('description' => $_POST['Description'], 'nom'=>$nom ));
  }

  public function rechercherGroupes(){
    $sql = 'SELECT g_nom FROM Groupes WHERE g_nom LIKE :requete' ;
    $rechercherGroupes = $this->executerRequete ($sql, array('requete' =>'%'.$_POST['BarreRecherche'].'%'));
    return $rechercherGroupes;
  }

  public function modifierPlacesLibres($nom){
    $sql1='SELECT g_placesLibres FROM Groupes WHERE g_nom = :nom';
    $récupPlacesLibres = $this->executerRequete ($sql1, array('nom'=>$nom ));
    $récupPlacesLibres = $récupPlacesLibres - 1;
    $sql2='UPDATE Groupes SET g_placesLibres = :placesLibres WHERE g_nom = :nom';
    $modifierPlacesLibres = $this->executerRequete ($sql2, array('placesLibres'=>$récupPlacesLibres, 'nom'=>$nom ));
  }

}
?>
