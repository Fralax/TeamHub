<?php

require_once "Modeles/modele.php";

class recherche extends modele {

  public function rechercherGroupes(){
    $sql = 'SELECT g_nom, g_admin, g_placesLibres FROM Groupes WHERE g_nom LIKE :requete AND g_nom NOT IN(SELECT g_nom FROM Appartient WHERE u_pseudo = :pseudo)';
    $rechercherGroupes = $this->executerRequete($sql, array('requete' => '%'.$_GET['resultatsrecherche'].'%', 'pseudo' => $_SESSION['pseudo']));
    return $rechercherGroupes;
  }

  public function rechercherMembres(){
    $sql = 'SELECT u_pseudo FROM Utilisateurs WHERE u_pseudo LIKE :requete';
    $rechercherGroupes = $this->executerRequete($sql, array('requete' => '%'.$_GET['resultatsrecherche'].'%'));
    return $rechercherGroupes;
  }


}



?>
