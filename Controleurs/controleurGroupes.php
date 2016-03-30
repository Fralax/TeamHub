<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class controleurGroupes{

  public function VerifFormulaire(){
    $admin = $_SESSION['pseudo'];
    $nomGroupe=$_POST['nomGroupe'];
    //$sport=$_POST['sport'];
    //$departement=$_POST['departement'];
    $placesLibres=$_POST['placesLibres'];
    $creer = $_POST['creer'];


    if(isset($creer) && $creer == 'creer'){
      if (($nomGroupe != "") && ($placesLibre != "")){
        $groupe = new groupes();
        $groupe->ajoutGroupeBdd();
        header("Location: index.php?page=accueilmembres");
      }
      else{
        echo "Des champs n'ont pas été remplis";
      }
    }
    $vue = new Vue('CreationGroupe');
    $vue->genererMembres();
  }
}
?>
