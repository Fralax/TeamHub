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
        $appartient = new utilisateurs();
        $appartient->ajoutAppartientBdd($_POST['nomGroupe'], "admin");
        $groupe->modifierPlacesLibres($nomGroupe);
        header("Location: index.php?page=moderationgroupe&nom=".$_POST['nomGroupe']);
      } else{
          echo "Des champs n'ont pas été remplis";
      }
    }
    $vue = new Vue('CreationGroupe');
    $vue->generer();
  }

  public function suppressionGroupe($nom){
    $groupe = new groupes();
    $groupe->supprimerGroupeBdd($nom);
    $appartient = new utilisateurs();
    $appartient->supprimerAppartientBddAdmin($nom);
    $vue = new Vue('SuppressionGroupe');
    $vue->generer(["nom"=>$nom]);
  }

  public function affichageCaracteristiquesGroupe($nom){
    $groupe = new groupes();
    $afficherCaracteristiquesGroupe = $groupe->afficherCaracteristiquesGroupe($nom)->fetch();
    $vue = new Vue('Groupe');
    $vue->generer(["caract" => $afficherCaracteristiquesGroupe]);
  }

  public function modificationDescriptionGroupe($nom){
    $groupe = new groupes();
    if (isset($_POST['Modifier']) && $_POST['Modifier'] == 'Modifier la Description'){
      $modifierDescriptionGroupe = $groupe->modifierDescriptionGroupe($nom);
      header("Location: index.php?page=accueil");
    }
    $vue = new Vue('ModifDescription');
    $vue->generer();
  }

  public function modificationAdminGroupe($nom){
    $groupe = new groupes();
    if (isset($_POST['Modifier']) && $_POST['Modifier'] == 'Modifier'){
      $modificationAdminGroupe = $groupe->modifierAdminGroupe($nom);
      $modificationAdminAppartient = $groupe->modifierAdminAppartient($nom, "admin");
      $modificationNonAdminAppartient = $groupe->modifierNonAdminAppartient($nom, "nonAdmin");
      header("Location: index.php?page=accueil");
    }
    $adminPossible = $groupe->afficherAdminPossible($nom)->fetchAll();
    $vue = new Vue('ModifAdmin');
    $vue->generer(["admin" => $adminPossible]);
  }

  public function affichageMesGroupes(){
    $groupe = new groupes();
    $afficherMesGroupes = $groupe->afficherMesGroupes()->fetchAll();
    $afficherMesGroupesAdmin = $groupe->afficherMesGroupesAdmin()->fetchAll();
    $vue = new Vue('MesGroupes');
    $vue->generer(array("groupes" => $afficherMesGroupes, "groupesAdmin" => $afficherMesGroupesAdmin));
  }

  public function affichageGroupes(){
    $groupe = new groupes();
    $arrayNomsGroupes = array();
    $arrayPlacesLibres = array();

    $afficherNomsGroupes = $groupe->afficherGroupes()->fetchAll();
    $afficherPlacesLibresGroupes = $groupe->recupererPlacesLibresGroupes()->fetchAll();

    foreach ($afficherNomsGroupes as list($nomGroupe)) {
      array_push($arrayNomsGroupes, $nomGroupe);
    }
    foreach ($afficherPlacesLibresGroupes as list($placesLibres)) {
      array_push($arrayPlacesLibres, $placesLibres);
    }
    $vue = new Vue('Groupes');
    $vue->generer(["groupe" => $arrayNomsGroupes, "placesLibres" => $arrayPlacesLibres]);
  }

  public function rejoindreGroupe($nom){
    $appartient = new utilisateurs();
    $appartient->ajoutAppartientBdd($nom, "nonAdmin");
    $groupe = new groupes();
    $groupe->modifierPlacesLibres($nom);
    $vue = new Vue('ConfirmationGroupe');
    $vue->generer(["nom"=>$nom]);
  }

  public function quitterGroupe($nom){
    $appartient = new utilisateurs();
    $appartient->supprimerAppartientBddNonAdmin($nom);
    $groupe = new groupes();
    $groupe->augmenterPlacesLibres($nom);
    $vue = new Vue('QuitterGroupe');
    $vue->generer(["nom"=>$nom]);
  }

}

?>
