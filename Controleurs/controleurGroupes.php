<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class controleurGroupes{

  public function VerifFormulaire(){
    $admin=$_POST['admin'];
    $nomgroupe=$_POST['nomgroupe'];
    $sport=$_POST['sport'];
    $departement=$_POST['department'];
    $placelibre=$_POST['placelibre'];
    $creer = $_POST['creer'];


    if(isset($creer) && $creer == 'creer'){
      if (($admin != "") && ($nomgroupe != "") && ($sport != "") && ($departement != "") && ($placelibre != "")){
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
