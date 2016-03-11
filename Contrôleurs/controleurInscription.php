<?php

require 'Modèles/modeleInscription.php';

function verif(){


  $Nom=$_POST['Nom'];
  $Prenom=$_POST['Prenom'];
  $Email=$_POST['Email'];
  $confirmemail = $_POST['ConfirmEmail'];
  $Pseudo=$_POST['Pseudo'];
  $MotDePasse=$_POST['MotDePasse'];
  $confirmMotDePasse = $_POST['ConfirmMotDePasse'];
  $envoyer = $_POST['Envoyer'];
  $jour = $POST['jour'];
  $mois = $POST['mois'];
  $annee = $POST['annee'];

  if(isset($envoyer) && $envoyer == 'Envoyer'){
    if (($Nom != "") && ($Prenom != "") && ($Email != "") && ($confirmemail != "") && ($Pseudo != "") && ($MotDePasse != "") && ($confirmMotDePasse != "")){
      if(($Email == $confirmemail) && ($MotDePasse == $confirmMotDePasse)){
        ajoutUtilisateurBdd();
        return true;
      }
      else{
        if ($Email != $confirmemail){
          echo "Les adresses mail saisies ne sont pas identiques.";
        }
        if ($MotDePasse != $ConfirmMotDePasse){
          echo "Les mots de passe saisis ne sont pas identiques.";
        }
        return false;
      }
    }
    else{
      echo "Des champs n'ont pas été remplis";
      return false;
    }
  }
}

try {

  $testVerif = verif();
  require 'Vues/vueInscription.php';
}

catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'Vues/vueErreur.php';
}

?>
