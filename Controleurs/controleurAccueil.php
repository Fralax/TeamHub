<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Modeles/groupes.php';
require_once 'Vues/vue.php';

class accueil{

  public function affichageAccueil(){
    $groupe = new groupes();
    $afficherMesGroupes = $groupe->afficherMesGroupes()->fetchAll();
    $afficherMesGroupesAdmin = $groupe->afficherMesGroupesAdmin()->fetchAll();
    $vue = new Vue('Accueil');
    $vue->generer(array("groupes" => $afficherMesGroupes, "groupesAdmin" => $afficherMesGroupesAdmin));
  }

  public function affichageAPropos(){
    $vue = new Vue('APropos');
    $vue->generer();
  }
}

?>
