<?php

require_once 'Modeles/evenements.php';
require_once 'Modeles/groupes.php';
require_once "Modeles/clubs.php";
require_once 'Vues/vue.php';

class controleurEvenements{

  public function creationEvenements($groupe){
    $evenement = new evenements();
    $groupes = new groupes();
    $club = new clubs();
    $listeClubs = $club->listerClubDepartement($groupe)->fetchAll();
    $dateAuj = date("d-m-Y");
    $date = "{$_POST['annee']}-{$_POST['mois']}-{$_POST['jour']}";
    $heureAuj = date("H:i:s");
    $heure = "{$_POST['heure']}:{$_POST['minute']}:00";

    if (isset($_POST['Créer']) && $_POST['Créer'] == 'Créer'){
      if (($_POST['nbrPlaces'] && $_POST['nomEvenement'] != "") && ($_POST['jour'] != "") && ($_POST['mois'] != "") && ($_POST['annee'] != "") && ($_POST['heure'] != "") && ($_POST['minute'] != "") && ($_POST['club'] != "")){
        $resultatG = $evenement->verifEvenement($groupe)->fetch();
        if(!$resultatG){
          if(strtotime($dateAuj) > strtotime($date)){
            ?> <script> alert("Sélectionnez une date dans le futur !")</script> <?php
          } elseif (strtotime($dateAuj) == strtotime($date)){
            if ($heureAuj > $heure){
              ?> <script> alert("Sélectionnez une heure dans le futur !")</script> <?php
            } else {
              $placesGroupe = $groupes->recupPlacesTotal($groupe)->fetch();
              settype($placesGroupe[0], "integer");
              if ($_POST['nbrPlaces'] <= $placesGroupe[0]){
                $evenement->ajouterEvenementsBdd($groupe);
                $evenement->diminuerPlacesLibresEvenement($_POST['nomEvenement']);
                header("Location: index.php?page=mesgroupes");
              } else{
                ?> <script> alert("Vous ne pouvez pas créer un événement avec plus de places qu'il n'y en a dans le groupe !")</script> <?php
              }
            }
          } else {
            $placesGroupe = $groupes->recupPlacesTotal($groupe)->fetch();
            settype($placesGroupe[0], "integer");
            if ($_POST['nbrPlaces'] <= $placesGroupe[0]){
              $evenement->ajouterEvenementsBdd($groupe);
              $evenement->diminuerPlacesLibresEvenement($_POST['nomEvenement']);
              header("Location: index.php?page=mesgroupes");
            } else{
              ?> <script> alert("Vous ne pouvez pas créer un événement avec plus de places qu'il n'y en a dans le groupe !")</script> <?php
            }
          }
        } else {
          ?> <script> alert("Il y déjà un événement du même nom associé à ce groupe !")</script> <?php
        }
      } else {
        ?> <script> alert("Des champs n'ont pas été remplis !")</script> <?php
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
    $evenement->diminuerPlacesLibresEvenement($nomevenement);
    $evenement->adhererEvenements($nomevenement);
    $vue = new Vue('ConfirmationEvenement');
    $vue->generer(["evenement"=>$nomevenement]);
    }

  public function DepartEvenements($nomevenement){
    $evenement = new evenements();
    $evenement->augmenterPlacesLibresEvenement($nomevenement);
    $evenement->quitterEvenements($nomevenement);
    $vue = new Vue('QuitterEvenement');
    $vue->generer(["evenement"=>$nomevenement]);
  }

  public function suppressionEvenementsPasses(){
    $evenements = new evenements();
    $afficherEvenements = $evenements->listerEvenements()->fetchAll();
    $nb = count($afficherEvenements);
    $dateAuj = date("d-m-Y");
    $heureAuj = date("H:i:s");

    for ($i=0; $i < $nb; $i++) {
      $date = $evenements->dateEvenement($afficherEvenements[$i][0])->fetch();
      $heure = $evenements->heureEvenement($afficherEvenements[$i][0])->fetch();

      if(strtotime($dateAuj) > strtotime($date[0])){
        $evenements->supprimerEvenement($afficherEvenements[$i][0]);
      } elseif (strtotime($dateAuj) == strtotime($date[0])){
        if ($heureAuj > $heure[0]){
          $evenements->supprimerEvenement($afficherEvenements[$i][0]);
        }
      }
    }
  }

}
?>
