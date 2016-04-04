<?php

require_once 'Modeles/groupes.php';
require_once 'Vues/vue.php';


class recherche{

  public function rechercheGroupes(){

    $recherche = $_POST['Recherche'];

    if (isset($recherche) && $recherche == 'Recherche'){
      $groupe = new groupes();
      $resultatRechercheGroupes = $groupe->rechercherGroupes()->fetchAll();
      $vue = new Vue('ResultatsRecherche');
      $vue->generer(["resultats" => $resultatRechercheGroupes]);
    }
  }
}
