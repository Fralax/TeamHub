<?php

require_once "Modeles/modele.php";

class groupes extends modele {

  public function ajoutGroupeBdd(){

    $sql = 'INSERT INTO teamhubp_teamhub.Groupes(g_admin, g_nom, g_placesTotal, g_placesLibres ,g_sport, g_departement)
            VALUES (:admin, :nomGroupe, :placesLibres, :placesLibres, :sport, :departement)';

    $ajoutGroupeBdd = $this->executerRequete ($sql, array('admin'=> $_SESSION['pseudo'], 'nomGroupe'=> $_POST['nomGroupe'], 'placesLibres'=> $_POST['placesLibres'], 'sport'=> $_POST['sport'], 'departement'=> $_POST['departement']));
  }

  public function verifGroupe(){
    if (isset($_POST['creer']) && $_POST['creer'] == 'Créer'){
      $sql = 'SELECT g_nom FROM teamhubp_teamhub.Groupes WHERE g_nom = :nomGroupe ';
      $resultatGroupe = $this->executerRequete($sql, array('nomGroupe' => $_POST['nomGroupe']));
      return $resultatGroupe;
    }
  }

  public function supprimerGroupeBdd($nom){
    $sql = 'DELETE FROM teamhubp_teamhub.Groupes WHERE g_nom = ?';
    $supprimerGroupeGroupes = $this ->executerRequete ($sql, array($nom));
    $sql1 = 'DELETE FROM teamhubp_teamhub.Appartient WHERE g_nom = ?';
    $supprimerGroupeAppatient = $this->executerRequete ($sql1, array($nom));
    $sql2 = 'SELECT e_nom FROM teamhubp_teamhub.Evenements WHERE g_nom = ?';
    $recupEvenementASupprimer = $this->executerRequete ($sql2, array($nom));
    $evenements = $recupEvenementASupprimer->fetchAll();
    $nb = count($evenements);
    for ($i = 0; $i < 2; $i++){
      $sql3 = 'DELETE FROM teamhubp_teamhub.Participe WHERE e_nom = ?';
      $supprimerGroupeParticipe = $this->executerRequete ($sql3, array($evenements[$i][0]));
    }
    $sql3 = 'DELETE FROM teamhubp_teamhub.Evenements WHERE g_nom = ?';
    $supprimerGroupeEvenement = $this->executerRequete ($sql3, array($nom));
  }

  public function afficherCaracteristiquesGroupe($nom){
    $sql = 'SELECT g_nom, g_admin, g_sport, g_departement, g_description, g_placesLibres, g_placesTotal FROM teamhubp_teamhub.Groupes WHERE g_nom = ?';
    $afficherCaracteristiquesGroupe = $this->executerRequete ($sql, array($nom));
    return $afficherCaracteristiquesGroupe;
  }

  public function afficherMesGroupes(){
    $sql = 'SELECT DISTINCT (Groupes.g_nom), g_nbrEvenements FROM teamhubp_teamhub.Appartient, teamhubp_teamhub.Groupes WHERE u_pseudo = ? AND a_admin = ? AND Groupes.g_nom IN (SELECT DISTINCT(g_nom) FROM teamhubp_teamhub.Appartient WHERE u_pseudo = ? AND a_admin = ?)';
    $afficherMesGroupes = $this->executerRequete ($sql, array($_SESSION['pseudo'], "nonAdmin", $_SESSION['pseudo'], "nonAdmin"));
    return $afficherMesGroupes;
  }

  public function afficherMesGroupesAdmin(){
    $sql = 'SELECT DISTINCT (Groupes.g_nom), g_nbrEvenements FROM teamhubp_teamhub.Appartient, teamhubp_teamhub.Groupes WHERE u_pseudo = ? AND a_admin = ? AND Groupes.g_nom IN (SELECT DISTINCT(g_nom) FROM teamhubp_teamhub.Appartient WHERE u_pseudo = ? AND a_admin = ?)';
    $afficherMesGroupes = $this->executerRequete ($sql, array($_SESSION['pseudo'], "admin", $_SESSION['pseudo'], "admin"));
    return $afficherMesGroupes;
  }

  public function afficherGroupes(){
    $sql = 'SELECT DISTINCT(g_nom), g_admin, g_placesLibres FROM teamhubp_teamhub.Groupes WHERE g_nom NOT IN (SELECT g_nom FROM teamhubp_teamhub.Appartient WHERE u_pseudo = ?) ORDER BY g_placesLibres DESC';
    $afficherGroupes = $this->executerRequete ($sql, array($_SESSION['pseudo']));
    return $afficherGroupes;
  }

  public function afficherGroupesAccueil(){
    $sql = 'SELECT g_nom, g_admin, g_sport FROM teamhubp_teamhub.Groupes WHERE g_nom IN (SELECT DISTINCT(g_nom) FROM teamhubp_teamhub.Appartient WHERE u_pseudo = ?)';
    $afficherGroupesAccueil = $this ->executerRequete($sql, array($_SESSION['pseudo']));
    return $afficherGroupesAccueil;
  }

  public function modifierDescriptionGroupe($nom){
    $sql='UPDATE teamhubp_teamhub.Groupes SET g_description = :description WHERE g_nom = :nom';
    $modifierDescriptionGroupe = $this->executerRequete ($sql, array('description' => $_POST['Description'], 'nom'=>$nom ));
  }

  public function modifierAdminGroupe($nom){
    $sql = 'UPDATE teamhubp_teamhub.Groupes SET g_admin = :admin  WHERE g_nom = :nom' ;
    $modifierAdminGroupe = $this->executerRequete ($sql, array('admin' => $_POST['Admin'] ,'nom' => $nom));

    $sql2 = 'UPDATE teamhubp_teamhub.Appartient SET a_admin = :admin  WHERE g_nom = :nom AND u_pseudo = :pseudo' ;
    $modifierNonAdminAppartient = $this->executerRequete ($sql2, array('admin' => "nonAdmin", 'nom' => $nom , 'pseudo' => $_SESSION['pseudo']));

    $sql3 = 'UPDATE teamhubp_teamhub.Appartient SET a_admin = :admin  WHERE g_nom = :nom AND u_pseudo = :pseudo';
    $modifierAdminAppartient = $this->executerRequete ($sql3, array('admin' => "admin", 'nom' => $nom, 'pseudo' => $_POST['Admin']));
  }

  public function afficherAdminPossible($nom){
    $sql = 'SELECT u_pseudo FROM teamhubp_teamhub.Appartient WHERE u_pseudo NOT IN (SELECT g_admin FROM teamhubp_teamhub.Groupes WHERE g_nom = :nom) AND g_nom = :nom' ;
    $afficherAdminPossible = $this->executerRequete ($sql, array('nom' => $nom));
    return $afficherAdminPossible;
  }

  public function diminuerPlacesLibres($nom){
    $sql1='SELECT g_placesLibres FROM teamhubp_teamhub.Groupes WHERE g_nom = :nom';
    $recupPlacesLibres = $this->executerRequete ($sql1, array('nom'=>$nom ));

    $placesLibres = $recupPlacesLibres->fetch();
    settype($placesLibres[0], "integer");
    $placesLibres[0] = $placesLibres[0] - 1;

    $sql2='UPDATE teamhubp_teamhub.Groupes SET g_placesLibres = :placesLibres WHERE g_nom = :nom';
    $diminuerPlacesLibres = $this->executerRequete ($sql2, array('placesLibres'=>$placesLibres[0], 'nom'=>$nom ));
  }

  public function augmenterPlacesLibres($nom){
    $sql1='SELECT g_placesLibres FROM teamhubp_teamhub.Groupes WHERE g_nom = :nom';
    $recupPlacesLibres = $this->executerRequete ($sql1, array('nom'=>$nom ));
    $placesLibres = $recupPlacesLibres->fetch();
    settype($placesLibres[0], "integer");
    $placesLibres[0] = $placesLibres[0] + 1;
    $sql2='UPDATE teamhubp_teamhub.Groupes SET g_placesLibres = :placesLibres WHERE g_nom = :nom';
    $diminuerPlacesLibres = $this->executerRequete ($sql2, array('placesLibres'=>$placesLibres[0], 'nom'=>$nom ));
  }

  public function modifierPlacesGroupe($nom){
    $sql1 = 'UPDATE teamhubp_teamhub.Groupes SET g_placesTotal = :total WHERE g_nom = :nom';
    $modifierPlacesGroupes = $this->executerRequete ($sql1, array('total'=>$_POST['placesTotales'] ,'nom'=>$nom));

    if ($_POST['placesTotales'] <= 0){

      echo "Vous ne pouvez pas avoir un nombre de places inférieur à 0 dans votre groupe !";

    } else{

      $comptePlacesOccupées = 'SELECT COUNT(u_pseudo) FROM teamhubp_teamhub.Appartient WHERE g_nom = :nom';
      $recupPlacesOccupées = $this->executerRequete ($comptePlacesOccupées, array('nom'=>$nom));
      $anciennesPlacesOccupées = $recupPlacesOccupées->fetch();
      $placesLibres = $_POST['placesTotales'] - $anciennesPlacesOccupées[0];

      if ($placesLibres < 0){

        echo "Vous ne pouvez pas avoir moins de places qu'il n'y a de membres dans votre groupe !";

      } else{

        $sql2 = 'UPDATE teamhubp_teamhub.Groupes SET g_placesLibres = :libres WHERE g_nom = :nom';
        $diminuerPlacesLibresGroupes = $this->executerRequete ($sql2, array('libres'=> $placesLibres,'nom'=>$nom));

      }
    }
  }

  public function recupPlacesTotal($nom){
    $sql= 'SELECT g_placesTotal FROM teamhubp_teamhub.Groupes WHERE g_nom = :nom';
    $recupPlacesTotal = $this->executerRequete ($sql, array('nom'=>$nom));
    return $recupPlacesTotal;
  }

  public function afficherGroupeRegion(){
    $sql = 'SELECT u_region FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo = ?';
    $recupDepartement = $this->executerRequete ($sql, array($_SESSION['pseudo']));
    $departement = $recupDepartement->fetch();
    $sql1 = 'SELECT DISTINCT(g_nom), g_sport, g_admin, g_placesLibres FROM teamhubp_teamhub.Groupes WHERE g_nom NOT IN (SELECT g_nom FROM teamhubp_teamhub.Appartient WHERE u_pseudo = ?) AND g_sport NOT IN (SELECT s_nom FROM teamhubp_teamhub.Pratique WHERE u_pseudo = ?) AND g_departement = ? ORDER BY g_placesLibres DESC LIMIT 5';
    $afficherGroupeRegion = $this->executerRequete ($sql1, array($_SESSION['pseudo'], $_SESSION['pseudo'], $departement[0]));
    return $afficherGroupeRegion;
  }

  public function recupDepartement(){
    $sql = 'SELECT u_region FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo = ?';
    $recupDepartement = $this->executerRequete ($sql, array($_SESSION['pseudo']));
    return $recupDepartement;
  }

  public function recupSportRandom(){
    $sql = 'SELECT s_nom FROM teamhubp_teamhub.Pratique WHERE u_pseudo = ? ORDER BY rand() LIMIT 1';
    $recupSportRandom = $this->executerRequete ($sql, array($_SESSION['pseudo']));
    return $recupSportRandom;
  }

  public function afficherGroupeSport($sport){
    $sql = 'SELECT u_region FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo = ?';
    $recupDepartement = $this->executerRequete ($sql, array($_SESSION['pseudo']));
    $departement = $recupDepartement->fetch();

    $sql1 = 'SELECT DISTINCT(g_nom), g_sport, g_admin, g_placesLibres FROM teamhubp_teamhub.Groupes WHERE g_nom NOT IN (SELECT g_nom FROM teamhubp_teamhub.Appartient WHERE u_pseudo = ?) AND g_sport = ? AND g_departement = ? ORDER BY g_placesLibres DESC LIMIT 5';
    $afficherGroupeRegion = $this->executerRequete ($sql1, array($_SESSION['pseudo'], $sport, $departement[0]));
    return $afficherGroupeRegion;
  }

  public function afficherImage($nomGroupe){
    $sql = 'SELECT g_sport FROM teamhubp_teamhub.Groupes WHERE g_nom = ?';
    $recupSport = $this->executerRequete ($sql, array($nomGroupe));
    $sport = $recupSport->fetch();

    $sql1 = 'SELECT s_image FROM teamhubp_teamhub.Sports WHERE s_nom = ?';
    $afficherImage = $this->executerRequete ($sql1, array($sport[0]));
    return $afficherImage;
  }

  public function inviterUtilisateur($nomGroupe){
    $sql = 'INSERT INTO teamhubp_teamhub.Invite(g_admin, u_pseudo, g_nom) VALUES (:nomAdmin, :nomInvite, :nomGroupe)';
    $inviterUtilisateur = $this->executerRequete ($sql, array('nomAdmin'=>$_SESSION['pseudo'], 'nomInvite'=>$_POST['nomInvite'], 'nomGroupe'=>$nomGroupe));
  }

  public function invitePossible($nomGroupe){
    $sql = 'SELECT u_pseudo FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo NOT IN (SELECT u_pseudo FROM teamhubp_teamhub.Appartient WHERE g_nom = ?) AND u_pseudo NOT IN (SELECT u_pseudo FROM teamhubp_teamhub.Invite WHERE g_nom = ?)';
    $invitePossible = $this->executerRequete ($sql, array($nomGroupe, $nomGroupe));
    return $invitePossible;
  }

  public function invitation(){
    $sql = 'SELECT g_admin, g_nom, u_pseudo FROM teamhubp_teamhub.Invite WHERE u_pseudo = ?';
    $invitation = $this->executerRequete ($sql, array($_SESSION['pseudo']));
    return $invitation;
  }

  public function supprimerInvitation($nomGroupe){
    $sql = 'DELETE FROM teamhubp_teamhub.Invite WHERE u_pseudo = ? AND g_nom = ?';
    $supprimerInvitation= $this->executerRequete ($sql, array($_SESSION['pseudo'], $nomGroupe));
  }

  public function confirmerInvitation($nomGroupe){
    $sql = 'SELECT g_admin FROM teamhubp_teamhub.Groupes WHERE g_nom = ?';
    $recupAdmin = $this->executerRequete ($sql, array($nomGroupe));
    $adminGroupe = $recupAdmin->fetch();

    $sql1 = 'INSERT INTO teamhubp_teamhub.Invite(g_admin, u_pseudo, g_nom) VALUES (:nomAdmin, :nomInvite, :nomGroupe)';
    $inviterUtilisateur = $this->executerRequete ($sql1, array('nomAdmin'=>$adminGroupe['0'], 'nomInvite'=>$_SESSION['pseudo'], 'nomGroupe'=>$nomGroupe));
  }
}
