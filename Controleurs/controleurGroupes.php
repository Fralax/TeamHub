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

      if($nomGroupe != "" && $placesLibres != "" && $sport !="0" && $departement!="0" ){
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
    $afficherCaracteristiqueGroupe = $groupe->afficherCaracteristiqueGroupe($_POST['nomGroupe'])->fetchAll();
    var_dump ($afficherCaracteristiqueGroupe);
  }

  public function affichageMesGroupes(){
    $vue = new Vue('MesGroupes');
    $vue->genererMembres();
    $groupe = new groupes();
    $afficherMesGroupes = $groupe->afficherMesGroupe()->fetchAll();
    var_dump ($afficherMesGroupes);
  }

}
?>
