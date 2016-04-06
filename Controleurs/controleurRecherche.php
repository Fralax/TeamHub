<?php

require_once 'Modeles/groupes.php';
require_once 'Vues/vue.php';


class recherche{

  public function rechercheGroupes(){

    if (isset($_POST['Recherche']) && $_POST['Recherche'] == 'Rechercher'){
      $groupe = new groupes();
      $resultatRechercheGroupes = $groupe->rechercherGroupes()->fetchAll();
      header("Location : index.php?page=resultatsrecherche");
    }
  }

  public function affichageResultatsRecherche(){
    $vue = new Vue('ResultatsRecherche');
    $vue->generer();
  }
}

?>
