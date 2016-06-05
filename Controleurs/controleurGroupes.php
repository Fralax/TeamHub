<?php

require_once 'Modeles/groupes.php';
require_once 'Modeles/utilisateurs.php';
require_once 'Modeles/evenements.php';
require_once 'Controleurs/controleurAdministration.php';
require_once 'Vues/vue.php';

class controleurGroupes{

  public function VerifFormulaire(){
    $admin = $_SESSION['pseudo'];
    $nomGroupe=$_POST['nomGroupe'];
    $sport=$_POST['sport'];
    $departement=$_POST['departement'];
    $placesLibres=$_POST['placesLibres'];
    $creer = $_POST['creer'];
    $groupe = new groupes();
    $appartient = new utilisateurs();
    $departements = $appartient->recupDepartements()->fetchAll();
    $recupSports = $appartient->sportsPraticables()->fetchAll();

    if(!empty($creer)){
      if($nomGroupe != "" && $placesLibres != "" && $sport !="" && $departement!="" && $_POST['Description'] != " "){
        $resultatG = $groupe->verifGroupe()->fetch();
        if (!$resultatG){
          if($placesLibres < 2){
            if($_COOKIE['langue'] == "English"){
              ?> <script> alert("Your group must contain at least two places !")</script> <?php
            } else {
              ?> <script> alert("Votre groupe doit contenir au moins deux places !")</script> <?php
            }
          } else{
            if ($placesLibres > 1000000){
              if($_COOKIE['langue'] == "English"){
                ?> <script> alert("Your group can not contain more than 1000000 places !")</script> <?php
              } else {
                ?> <script> alert("Votre groupe ne peut pas contenir plus de 1000000 places !")</script> <?php
              }
            } else{
              $groupe->ajoutGroupeBdd();
              $appartient->ajoutAppartientBdd($_SESSION['pseudo'], $_POST['nomGroupe'], "admin");
              $groupe->diminuerPlacesLibres($nomGroupe);
              $groupe->nouveauGroupe($nomGroupe, $departement, $sport);
              header("Location: index.php?page=groupe&nom=".$_POST['nomGroupe']);
            }
          }
        } else {
          if($_COOKIE['langue'] == "English"){
            ?> <script> alert("This group name already exists !")</script> <?php
          } else {
            ?> <script> alert("Ce nom de groupe existe déjà !")</script> <?php
          }
        }
      } else{
        if($_COOKIE['langue'] == "English"){
          ?> <script> alert("Some fields have not been filled !")</script> <?php
        } else {
          ?> <script> alert("Des champs n'ont pas été rempli !")</script> <?php
        }
      }
    }
    $vue = new Vue('CreationGroupe');
    $vue->generer(array('sports'=>$recupSports, 'departements'=>$departements));

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
    $afficherImageSport = $groupe->afficherImage($nom)->fetch();
    $recupGroupesAttend = $groupe->recupGroupesAttend()->fetchAll();

    //MODIFICATION DESCRIPTION GROUPE
    if (isset($_POST['Modifier'])){
      if ($_POST['Description'] != " ") {
        $modifierDescriptionGroupe = $groupe->modifierDescriptionGroupe($nom);
        header("Location: index.php?page=groupe&nom=".$_GET['nom']);
      } else{
        if($_COOKIE['langue'] == "English"){
          ?> <script> alert("Some fields have not been filled !")</script> <?php
        } else {
          ?> <script> alert("Des champs n'ont pas été rempli !")</script> <?php
        }
      }
    }

    //MODIFICATION ADMIN GROUPE
    if (isset($_POST['ModifierAdmin'])){
      if ($_POST['Admin']) {
        $modificationAdminGroupe = $groupe->modifierAdminGroupe($nom);
        $admin = new controleurAdministration();
        $verifAdmin = $admin->verifAdmin();
        if ($verifAdmin == true){
          header("Location: index.php?page=administration");
        } else {
          header("Location: index.php?page=groupe&nom=".$_GET['nom']);
        }
      } else{
        if($_COOKIE['langue'] == "English"){
          ?> <script> alert("Some fields have not been filled !")</script> <?php
        } else {
          ?> <script> alert("Des champs n'ont pas été rempli !")</script> <?php
        }
      }
    }

    //MODIFICATION PLACES GROUPE
    if (isset($_POST['ModifierPlaces'])){
      if($_POST['placesTotales'] < 2) {
        if($_COOKIE['langue'] == "English"){
          ?> <script> alert("Your group must contain at least two places !")</script> <?php
        } else {
          ?> <script> alert("Votre groupe doit contenir au moins deux places !")</script> <?php
        }
      } else{
        if ($_POST['placesTotales'] > 1000000){
          if($_COOKIE['langue'] == "English"){
            ?> <script> alert("Your group can not contain more than 1000000 places !")</script> <?php
          } else {
            ?> <script> alert("Votre groupe ne peut pas contenir plus de 1000000 places !")</script> <?php
          }
        } else{
        $groupe->modifierPlacesGroupe($nom);
        $placesLibres = $groupe->recupPlacesLibres($nom)->fetch();
        settype($placesLibres[0], "integer");
        $membresEnAttente = $groupe->ajouterAutoGroupe($nom, $placesLibres[0])->fetchAll();
        foreach ($membresEnAttente as list($nomMembre)) {
          $appartient->ajoutAppartientBdd($nomMembre, $nom, "nonAdmin");
          $groupe->diminuerPlacesLibres($nom);
          $groupe->supprimerAttendPlace($nom, $nomMembre);
        }
        header("Location: index.php?page=groupe&nom=".$_GET['nom']);
        }
      }
    }

    //Invitation Membre dans le groupe
    $invite = $groupe->invitePossible($_GET['nom'])->fetchAll();
    if (isset($_POST['EnvoyerInvitation'])){
      if ($_POST['nomInvite'] != ""){
        $groupe->inviterUtilisateur($_GET['nom']);
        header("Location: index.php?page=groupe&nom=".$_GET['nom']);
      } else {
        if($_COOKIE['langue'] == "English"){
          ?> <script> alert("Some fields have not been filled !")</script> <?php
        } else {
          ?> <script> alert("Des champs n'ont pas été rempli !")</script> <?php
        }
      }
    }

    //Bannissement Membre groupe
    $afficherMembres = $user->listerMembresGroupe($nom)-> fetchAll();
    $afficherCaracteristiquesGroupe = $groupe->afficherCaracteristiquesGroupe($nom)->fetch();

    $adminPossible = $groupe->afficherAdminPossible($nom)->fetchAll();

    $vue = new Vue('Groupe');
    $vue->generer(array('caract' => $afficherCaracteristiquesGroupe, 'membres' => $afficherMembresGroupe, 'evenementsGroupe' => $afficherEvenementsGroupe, 'afficherMesEvenements' => $afficherEvenementsUtilisateur, 'image'=>$afficherImageSport, 'admin' => $adminPossible, "groupesAttend" => $recupGroupesAttend, 'aInvite'=>$invite, "nom"=>$nom, "membresBan" => $afficherMembres));
  }

  public function modificationAdminGroupe($nom){
    $groupe = new groupes();
    if (isset($_POST['Modifier'])){
      $modificationAdminGroupe = $groupe->modifierAdminGroupe($nom);
      $admin = new controleurAdministration();
      $verifAdmin = $admin->verifAdmin();
      if ($verifAdmin == true){
        header("Location: index.php?page=administration");
      } else {
        header("Location: index.php?page=groupe&nom=".$_GET['nom']);
      }
    }
    $adminPossible = $groupe->afficherAdminPossible($nom)->fetchAll();
    $vue = new Vue('ModifAdmin');
    $vue->generer(['adminPossible' => $adminPossible]);
  }

  public function affichageMesGroupes(){
    $groupe = new groupes();
    $event = new evenements();
    $afficherMesGroupes = $groupe->afficherMesGroupes()->fetchAll();
    $afficherMesGroupesAdmin = $groupe->afficherMesGroupesAdmin()->fetchAll();
    $afficherGroupesAccueil = $groupe->afficherGroupesAccueil()->fetchAll();
    $vue = new Vue('MesGroupes');
    $vue->generer(array("groupes" => $afficherMesGroupes, "groupesAdmin" => $afficherMesGroupesAdmin, 'groupesAccueil'=>$afficherGroupesAccueil));
  }

  public function affichageGroupes(){
    $groupe = new groupes();
    $recupGroupesAttend = $groupe->recupGroupesAttend()->fetchAll();
    $afficherGroupes = $groupe->afficherGroupes()->fetchAll();
    $vue = new Vue('Groupes');
    $vue->generer(["groupes" => $afficherGroupes, "groupesAttend" => $recupGroupesAttend]);
  }

  public function rejoindreGroupe($nom){
    $appartient = new utilisateurs();
    $appartient->ajoutAppartientBdd($_SESSION['pseudo'], $nom, "nonAdmin");
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
    $placesLibres = $groupe->recupPlacesLibres($nom)->fetch();
    settype($placesLibres[0], "integer");
    $membresEnAttente = $groupe->ajouterAutoGroupe($nom, $placesLibres[0])->fetchAll();
    foreach ($membresEnAttente as list($nomMembre)) {
      $appartient->ajoutAppartientBdd($nomMembre, $nom, "nonAdmin");
      $groupe->diminuerPlacesLibres($nom);
      $groupe->supprimerAttendPlace($nom, $nomMembre);
      $groupe->notificationNouveauMembre($nom, $nomMembre);
    }
    $vue = new Vue('QuitterGroupe');
    $vue->generer(["nom"=>$nom]);
  }

  public function bannissementMembre(){
    $groupe = new groupes();
    $appartient = new utilisateurs();
    $bannirMembre = $groupe->bannirMembre($_GET['nom'], $_GET['pseudo']);
    $placesLibres = $groupe->recupPlacesLibres($_GET['nom'])->fetch();
    settype($placesLibres[0], "integer");
    $membresEnAttente = $groupe->ajouterAutoGroupe($_GET['nom'], $placesLibres[0])->fetchAll();
    foreach ($membresEnAttente as list($nomMembre)) {
      $appartient->ajoutAppartientBdd($nomMembre, $_GET['nom'], "nonAdmin");
      $groupe->diminuerPlacesLibres($_GET['nom']);
      $groupe->supprimerAttendPlace($_GET['nom'], $nomMembre);
    }
    $vue = new Vue('ConfirmationBannissementMembre');
    $vue->generer(array('pseudo' => $_GET['pseudo'], 'nom' => $_GET['nom']));
  }

  public function rejointAutoGroupe(){
    $groupe = new groupes();
    $dateBouton = Date('Y-m-d H:i:s');
    $ajoutAttendPlace = $groupe->ajouterAttendPlace($_GET['nom'], $_GET['pseudo'], $dateBouton);

    $vue = new Vue('ConfirmationNotifGroupe');
    $vue->generer(array('nom' => $_GET['nom']));
  }

  public function neRejointPlusAutoGroupe(){
    $groupe = new groupes();
    $supprimeAttendPlace = $groupe->supprimerAttendPlace($_GET['nom'], $_GET['pseudo']);
    $vue = new Vue('AnnulationNotifGroupe');
    $vue->generer(array('nom' => $_GET['nom']));
  }


}

?>
