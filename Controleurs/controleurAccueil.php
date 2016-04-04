<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class accueil{

  public function affichageAccueil(){
    $vue = new Vue('Accueil');
    $vue->generer();
  }

  public function affichageAPropos(){
    $vue = new Vue('APropos');
    $vue->generer();
  }

}

?>
