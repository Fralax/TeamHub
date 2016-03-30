<?php

require_once 'Modeles/groupes.php';
require_once 'Vues/vue.php';

class controleurGroupes{

  public function VerifFormulaire(){
    $admin = $_SESSION['pseudo'];
    $nomGroupe=$_POST['nomGroupe'];
    $sport=$_POST['sport'];
    $departement=$_POST['departement'];
    $placesLibres=$_POST['placesLibres'];
    $creer = $_POST['creer'];


    if(!empty($creer)){

      if($nomGroupe != "" && $placesLibres != "" && $sport !="" && $departement!="" ){
        $groupe = new groupes();
        $groupe->ajoutGroupeBdd();
        header("Location: index.php?page=moderationgroupe");
      }

      else{
          echo "Des champs n'ont pas été remplis";
      }
    }
    $vue = new Vue('CreationGroupe');
    $vue->genererMembres();
  }

  public function afficherModerationGroupe(){
    $vue = new Vue('ModerationGroupe');
    $vue->genererMembres();
    $groupe = new groupes();
    while ($afficherCaracteristiqueGroupe = $groupe->afficherCaracteristiqueGroupe()->fetch_All(PDO::FETCH_COLUMN)){
      $data = $afficherCaracteristiqueGroupe[0] . "\t" . $afficherCaracteristiqueGroupe[1] . "\t" . $afficherCaracteristiqueGroupe[2] . "\n";
      var_dump ($data);
    }

  }

}
?>
