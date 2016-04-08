<?php

require_once "Modeles/modele.php";

class groupes extends modele {

  public function ajoutGroupeBdd(){

    $sql = 'INSERT INTO Groupes(g_admin, g_nom, g_placesTotal, g_placesLibres ,g_sport, g_departement)
            VALUES (:admin, :nomGroupe, :placesLibres, :placesLibres, :sport, :departement)';

    $ajoutGroupeBdd = $this->executerRequete ($sql, array('admin'=> $_SESSION['pseudo'], 'nomGroupe'=> $_POST['nomGroupe'], 'placesLibres'=> $_POST['placesLibres'], 'sport'=> $_POST['sport'], 'departement'=> $_POST['departement']));
  }

  public function supprimerGroupeBdd($nom){
    $sql = 'DELETE FROM Groupes WHERE g_nom = ?';
    $supprimerGroupeBdd = $this ->executerRequete ($sql, array($nom));
  }

  public function afficherCaracteristiquesGroupe($nom){
    $sql = 'SELECT g_nom, g_admin, g_sport, g_departement, g_description, g_placesLibres FROM Groupes WHERE g_nom = ?';
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
    $sql = 'SELECT DISTINCT(g_nom) FROM Groupes WHERE g_nom NOT IN (SELECT g_nom FROM Appartient WHERE u_pseudo = ?) ORDER BY g_placesLibres DESC';
    $afficherGroupes = $this->executerRequete ($sql, array($_SESSION['pseudo']));
    return $afficherGroupes;
  }

  public function recupererPlacesLibresGroupes(){
    $sql1='SELECT g_placesLibres FROM Groupes WHERE g_nom NOT IN (SELECT g_nom FROM Appartient WHERE u_pseudo = :pseudo) ORDER BY g_placesLibres DESC';
    $recupPlacesLibres = $this->executerRequete ($sql1, array('pseudo' => $_SESSION['pseudo']));
    return $recupPlacesLibres;
  }

  public function modifierDescriptionGroupe($nom){
    $sql='UPDATE Groupes SET g_description = :description WHERE g_nom = :nom';
    $modifierDescriptionGroupe = $this->executerRequete ($sql, array('description' => $_POST['Description'], 'nom'=>$nom ));
  }

  public function modifierAdminGroupe($nom){
    $sql = 'UPDATE Groupes SET g_admin = :admin  WHERE g_nom = :nom' ;
    $modifierAdminGroupe = $this->executerRequete ($sql, array('admin'=>$_POST['Admin'] ,'nom'=>$nom));
  }

  public function modifierAdminAppartient($nom, $admin){
    $sql = 'UPDATE Appartient SET a_admin = :admin  WHERE g_nom = :nom AND u_pseudo = :pseudo' ;
    $modifierAdminAppartient = $this->executerRequete ($sql, array('admin'=>$admin,'nom'=>$nom ,'pseudo'=>$_POST['Admin']));
  }

  public function modifierNonAdminAppartient($nom, $admin){
    $sql = 'UPDATE Appartient SET a_admin = :admin  WHERE g_nom = :nom AND u_pseudo = :pseudo' ;
    $modifierAdminAppartient = $this->executerRequete ($sql, array('admin'=>$admin,'nom'=>$nom ,'pseudo'=>$_SESSION['pseudo']));
  }

  public function afficherAdminPossible($nom){
    $sql = 'SELECT u_pseudo FROM Appartient WHERE u_pseudo != :pseudo AND g_nom = :nom' ;
    $afficherAdminPossible = $this->executerRequete ($sql, array('pseudo' =>$_SESSION['pseudo'], 'nom' => $nom));
    return $afficherAdminPossible;
  }

  public function rechercherGroupes(){
    $sql = 'SELECT g_nom FROM Groupes WHERE g_nom LIKE :requete';
    $rechercherGroupes = $this->executerRequete($sql, array('requete' => $_POST['BarreRecherche']));
    return $rechercherGroupes;
  }

  public function modifierPlacesLibres($nom){
    $sql1='SELECT g_placesLibres FROM Groupes WHERE g_nom = :nom';
    $recupPlacesLibres = $this->executerRequete ($sql1, array('nom'=>$nom ));
    $placesLibres = $recupPlacesLibres->fetch();
    settype($placesLibres[0], "integer");
    $placesLibres[0] = $placesLibres[0] - 1;
    $sql2='UPDATE Groupes SET g_placesLibres = :placesLibres WHERE g_nom = :nom';
    $modifierPlacesLibres = $this->executerRequete ($sql2, array('placesLibres'=>$placesLibres[0], 'nom'=>$nom ));
  }

  public function augmenterPlacesLibres($nom){
    $sql1='SELECT g_placesLibres FROM Groupes WHERE g_nom = :nom';
    $recupPlacesLibres = $this->executerRequete ($sql1, array('nom'=>$nom ));
    $placesLibres = $recupPlacesLibres->fetch();
    settype($placesLibres[0], "integer");
    $placesLibres[0] = $placesLibres[0] + 1;
    $sql2='UPDATE Groupes SET g_placesLibres = :placesLibres WHERE g_nom = :nom';
    $modifierPlacesLibres = $this->executerRequete ($sql2, array('placesLibres'=>$placesLibres[0], 'nom'=>$nom ));
  }

}
