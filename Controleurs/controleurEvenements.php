<?php

require_once 'Modeles/evenements.php';
require_once "Modeles/clubs.php";
require_once 'Vues/vue.php';

class controleurEvenements{

  public function creationEvenements($groupe){
    $evenement = new evenements();
    $club = new clubs();
    $listeClubs = $club->listerClub()->fetchAll();
    $dateAuj = date("d-m-Y");
    $date = "{$_POST['annee']}-{$_POST['mois']}-{$_POST['jour']}";
    $heureAuj = time("H:i");
    $heure = "{$_POST['heure']}:{$_POST['minute']}:00";

    if (isset($_POST['Créer']) && $_POST['Créer'] == 'Créer'){
      if(strtotime($dateAuj) > strtotime($date)){
        echo "Sélectionnez une date dans le futur !";
      } elseif (strtotime($dateAuj) == strtotime($date)){
        if ($heureAuj > mktime($heure)){
          echo "Sélectionnez une heure dans le futur !";
        } else {
          $evenement->ajouterEvenementsBdd($groupe);
          header('refresh:1;url=index.php?page=mesgroupes');
        }
      } else {
        $evenement->ajouterEvenementsBdd($groupe);
        header('refresh:1;url=index.php?page=mesgroupes');
      }
    }
    $vue = new Vue('CreationEvenements');
    $vue->generer(['clubs'=>$listeClubs]);
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
