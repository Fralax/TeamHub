<?php

require_once "Modeles/modele.php";

class recherche extends modele {

  public function rechercherGroupes(){
    $sql = 'SELECT g_nom, g_admin, g_placesLibres FROM teamhubp_teamhub.Groupes WHERE g_nom LIKE :requete AND g_nom NOT IN(SELECT g_nom FROM teamhubp_teamhub.Appartient WHERE u_pseudo = :pseudo)';
    $rechercherGroupes = $this->executerRequete($sql, array('requete' => '%'.$_GET['resultatsrecherche'].'%', 'pseudo' => $_SESSION['pseudo']));
    return $rechercherGroupes;
  }

  public function rechercherMembres(){
    $sql = 'SELECT u_pseudo, u_photo FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo LIKE :requete';
    $rechercherMembres = $this->executerRequete($sql, array('requete' => '%'.$_GET['resultatsrecherche'].'%'));
    return $rechercherMembres;
  }

  public function rechercherClubs(){
    $sql = 'SELECT c_nom FROM teamhubp_teamhub.Clubs WHERE c_nom LIKE :requete';
    $rechercherClubs = $this->executerRequete($sql, array('requete' => '%'.$_GET['resultatsrecherche'].'%'));
    return $rechercherClubs;
  }

  public function rechercherAvanceeGroupes(){
    $sql = 'SELECT g_nom, g_admin, g_sport, g_departement, g_placesLibres, g_nbrEvenements FROM teamhubp_teamhub.Groupes WHERE g_nom LIKE :requetea';
    $rechercherAvanceeGroupes = $this->executerRequete($sql, array(
      'requetea' => '%'.$_POST['nomGroupe'].'%',
      ));
    return $rechercherAvanceeGroupes;
  }


}



?>
