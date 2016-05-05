<?php

require_once 'Modeles/evenements.php';
require_once 'Vues/vue.php';

class controleurEvenements{

  public function creationEvenements($groupe){
    $evenement = new evenements();
    if (isset($_POST['Créer']) && $_POST['Créer'] == 'Créer'){
      $evenement->ajouterEvenementsBdd($groupe);
      header('refresh:1;url=index.php?page=mesgroupes');
    }
    $vue = new Vue('CreationEvenements');
    $vue->generer();
  }

  public function suppressionEvenement($nomevenement){
    $evenement = new evenements();
    $evenement->supprimerEvenement($nomevenement);
    $vue = new Vue('SuppressionEvenement');
    $vue->generer(["evenement"=>$nomevenement]);
  }

  public function adhesionEvenements($nomevenement){
    $evenement = new evenements();
    $evenement->adhererEvenements($nomevenement);
    $vue = new Vue('ConfirmationEvenement');
    $vue->generer(["evenement"=>$nomevenement]);
    }

  public function DepartEvenements($nomevenement){
    $evenement = new evenements();
    $evenement->quitterEvenements($nomevenement);
    $vue = new Vue('QuitterEvenement');
    $vue->generer(["evenement"=>$nomevenement]);
  }



}
?>
