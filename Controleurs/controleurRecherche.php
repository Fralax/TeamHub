<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Modeles/groupes.php';
require_once 'Vues/vue.php';

class recherche{

  public function affichageRecherche(){
    if(isset($_POST['Recherche'])){
      header("Location : index.php?page=resultatsrecherche");
      var_dump($_POST['BarreRecherche']);
    }
  }

  public function affichageResultatsRecherche(){
    $vue = new Vue('ResultatsRecherche');
    $vue->generer();
  }

}



?>
