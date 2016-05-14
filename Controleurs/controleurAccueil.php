<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Modeles/groupes.php';
require_once 'Vues/vue.php';

class accueil{

  public function affichageAccueil(){
    $groupe = new groupes();
    $afficherMesGroupes = $groupe->afficherGroupesAccueil()->fetchAll();
    $evenements = new evenements();
    $afficherEvenements = $evenements->listerEvenementsAccueil()->fetchAll();
    $vue = new Vue('Accueil');
    $vue->generer(array("groupes" => $afficherMesGroupes, "evenements" => $afficherEvenements));
  }

  public function affichageAPropos(){
    $vue = new Vue('APropos');
    $vue->generer();
  }
}

?>
