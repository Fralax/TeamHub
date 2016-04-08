<?php

require_once 'Modeles/groupes.php';
require_once 'Vues/vue.php';

class recherche{

  public function rechercheGroupes(){
    $recherche = $_POST['Recherche'];
    if (isset($recherche) && $recherche != NULL){
      header('Location: index.php?page=resultatsrecherche&resultatsrecherche='.$_POST['BarreRecherche']);
    }
  }

  public function affichageResultatsRecherche(){
    $groupe = new groupes();
    $resultatRechercheGroupes = $groupe->rechercherGroupes()->fetchAll();
    var_dump($resultatRechercheGroupes);
    $vue = new Vue('ResultatsRecherche');
    $vue->generer();
  }
}

?>
