<?php

require_once 'Modeles/groupes.php';
require_once 'Modeles/utilisateurs.php';
require_once 'Modeles/evenements.php';
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
        if($placesLibres < 2){
          echo "Votre groupe doit contenir au moins deux places !";
        } else{
          if ($placesLibres > 100){
          echo "Votre groupe ne peut pas contenir plus de 100 places !";
          } else{
            $groupe = new groupes();
            $groupe->ajoutGroupeBdd();
            $appartient = new utilisateurs();
            $appartient->ajoutAppartientBdd($_POST['nomGroupe'], "admin");
            $groupe->diminuerPlacesLibres($nomGroupe);
            header("Location: index.php?page=groupe&nom=".$_POST['nomGroupe']);
          }
        }
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
    $user = new utilisateurs();
    $evenements = new evenements();
    $afficherCaracteristiquesGroupe = $groupe->afficherCaracteristiquesGroupe($nom)->fetch();
    $afficherMembresGroupe = $user->listerMembresGroupe($nom)->fetchAll();
    $afficherEvenementsUtilisateur = $evenements->listerEvenementsUtilisateur($nom)->fetchAll();
    $afficherEvenementsGroupe = $evenements->listerEvenementsGroupe($nom)->fetchAll();

    $vue = new Vue('Groupe');
    $vue->generer(array('caract' => $afficherCaracteristiquesGroupe, 'membres' => $afficherMembresGroupe, 'evenementsGroupe' => $afficherEvenementsGroupe, 'afficherMesEvenements' => $afficherEvenementsUtilisateur));
  }

  public function modificationDescriptionGroupe($nom){
    $groupe = new groupes();
    if (isset($_POST['Modifier']) && $_POST['Modifier'] == 'Modifier la Description'){
      $modifierDescriptionGroupe = $groupe->modifierDescriptionGroupe($nom);
      header("Location: index.php?page=groupe&nom=".$_GET['nom']);
    }
    $vue = new Vue('ModifDescription');
    $vue->generer();
  }

  public function modificationAdminGroupe($nom){
    $groupe = new groupes();

    if (isset($_POST['Modifier']) && $_POST['Modifier'] == 'Modifier'){
      $modificationAdminGroupe = $groupe->modifierAdminGroupe($nom);
      header("Location: index.php?page=groupe&nom=".$_GET['nom']);
    }

    $adminPossible = $groupe->afficherAdminPossible($nom)->fetchAll();
    $vue = new Vue('ModifAdmin');
    $vue->generer(['admin' => $adminPossible]);
  }

  public function modificationPlacesGroupe($nom){
    $groupe = new groupes();
    if (isset($_POST['Modifier']) && $_POST['Modifier'] == 'Modifier'){
      if($placesLibres < 2) {
        echo "Votre groupe doit contenir au moins deux places !";
      } else{
        if ($placesLibres > 100){
          echo "Votre groupe ne peut pas contenir plus de 100 places !";
        } else{
        $groupe->modifierPlacesGroupe($nom);
        header("Location: index.php?page=groupe&nom=".$_GET['nom']);
        }
      }
    }

    $vue = new Vue('ModifPlaces');
    $vue->generer();
  }

  public function affichageMesGroupes(){
    $groupe = new groupes();
    $event = new evenements();
    $afficherMesGroupes = $groupe->afficherMesGroupes()->fetchAll();
    $afficherMesGroupesAdmin = $groupe->afficherMesGroupesAdmin()->fetchAll();
    $vue = new Vue('MesGroupes');
    $vue->generer(array("groupes" => $afficherMesGroupes, "groupesAdmin" => $afficherMesGroupesAdmin));
  }

  public function affichageGroupes(){
    $groupe = new groupes();
    $afficherGroupes = $groupe->afficherGroupes()->fetchAll();
    $vue = new Vue('Groupes');
    $vue->generer(["groupes" => $afficherGroupes]);
  }

  public function rejoindreGroupe($nom){
    $appartient = new utilisateurs();
    $appartient->ajoutAppartientBdd($nom, "nonAdmin");
    $groupe = new groupes();
    $groupe->diminuerPlacesLibres($nom);
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
