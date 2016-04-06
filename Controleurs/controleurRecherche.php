<?php

require_once 'Modeles/groupes.php';
require_once 'Vues/vue.php';


class recherche{

  public function rechercheGroupes(){

    $recherche = $_POST['Recherche'];

    if (isset($recherche) && $recherche == 'Rechercher'){
      $groupe = new groupes();
      $resultatRechercheGroupes = $groupe->rechercherGroupes()->fetchAll();
      header("Location : index.php");
    }
  }

  public function affichageResultatsRecherche(){
    $vue = new Vue('ResultatsRecherche');
    $vue->generer();
  }
}

?>
