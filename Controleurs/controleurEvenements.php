<?php

require_once 'Modeles/evenements.php';
require_once 'Vues/vue.php';

class controleurEvenements{
  public function creationEvenements($groupe){
    $evenement = new evenements();
    if (isset($_POST['Créer']) && $_POST['Créer'] == 'Créer'){
      $evenement->ajouterEvenementsBdd($groupe);
      header('refresh:3;url=index.php?page=mesgroupes');
    }
    $vue = new Vue('CreationEvenements');
    $vue->generer();
  }



}
?>
