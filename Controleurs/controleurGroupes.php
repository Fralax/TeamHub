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

      if($nomGroupe != "" && $placesLibres != "" && $sport !="0" && $departement!="0"){
        $groupe = new groupes();
        $groupe->ajoutGroupeBdd();
        header("Location: index.php?page=moderationgroupe&nom=".$_POST['nomGroupe']);
      }

      else{
          echo "Des champs n'ont pas été remplis";
      }
    }
    $vue = new Vue('CreationGroupe');
    $vue->genererMembres();
  }

  public function afficherModerationGroupe($nom){
    $groupe = new groupes();
    $afficherCaracteristiquesGroupe = $groupe->afficherCaracteristiquesGroupe($nom)->fetch();
    $vue = new Vue('ModerationGroupe');
    $vue->genererMembres(["caract" => $afficherCaracteristiquesGroupe]);
  }
}
?>
