<?php

require_once 'Modeles/utilisateurs.php';

class inscription{

  public function verif(){

    $Nom=$_POST['Nom'];
    $Prenom=$_POST['Prenom'];
    $Email=$_POST['Email'];
    $confirmemail = $_POST['ConfirmEmail'];
    $Pseudo=$_POST['Pseudo'];
    $MotDePasse=$_POST['MotDePasse'];
    $confirmMotDePasse = $_POST['ConfirmMotDePasse'];
    $envoyer = $_POST['Envoyer'];
    $jour = $_POST['jour'];
    $mois = $_POST['mois'];
    $annee = $_POST['annee'];
    $sexe = $_POST['Sexe'];
    $cp = $_POST['CodePostal'];
    $ville = $_POST['Ville'];
    $adresse = $_POST['Adresse'];
    $resultatP = new utilisateurs();
    $resultatP->verifPseudo();
    $resultatE = new utilisateurs();
    $resultatE->verifEmail();
    $verif = false;

    if(isset($envoyer) && $envoyer == 'Envoyer'){
      if (($Nom != "") && ($Prenom != "") && ($sexe != "") && ($Email != "") && ($confirmemail != "") && ($Pseudo != "") && ($MotDePasse != "")
      && ($confirmMotDePasse != "") && ($cp != "") && ($ville != "") && ($adresse != "")){
        if(($Email == $confirmemail) && ($MotDePasse == $confirmMotDePasse)){
          if (!$resultatP && !$resultatE) {
            $util = new utilisateurs();
            $util->ajoutUtilisateurBdd();
            $verif = true;
          }
          elseif ($resultatP == true) {
            echo "Ce pseudo est déjà utilisé";
            
          }
          elseif ($resultatE == true) {
            echo "Vous êtes déjà inscrit";
          }

        }
        else{
          if ($Email != $confirmemail){
            echo "Les adresses mail saisies ne sont pas identiques.";
          }
          if ($MotDePasse != $ConfirmMotDePasse){
            echo "Les mots de passe saisis ne sont pas identiques.";
          }
        }
      }
      else{
        echo "Des champs n'ont pas été remplis";
      }
    }
    require 'Vues/vueInscription.php';
  }
}

?>
