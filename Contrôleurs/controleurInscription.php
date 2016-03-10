<?php

function verif(){

  $Nom=$_POST['Nom'];
  $Prenom=$_POST['Prenom'];
  $Email=$_POST['Email'];
  $confirmemail = $_POST['ConfirmEmail'];
  $Pseudo=$_POST['Pseudo'];
  $MotDePasse=$_POST['MotDePasse'];
  $confirmMotDePasse = $_POST['ConfirmMotDePasse'];

  if (($Nom != "") && ($Prenom != "") && ($Email != "") && ($confirmemail != "") && ($Pseudo != "") && ($MotDePasse != "") && ($confirmMotDePasse != "")){
    if(($email == $confirmemail) && ($MotDePasse == $confirmMotDePasse)){
      return true;
    }
    else{
      if ($email != $confirmemail){
        echo "Les adresses mail saisies ne sont pas identiques.";
      }
      else{
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

try {
  $testVerif = verif();
  require '/TeamHub/Vues/vueInscription.php';
}

catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'Vues/vueErreur.php';
}

?>
