<?php

require '/TeamHub/Vues/vueInscription.php'

function verifMdp(){
  $MotDePasse=$_POST['MotDePasse'];
  $confirmMotDePasse = $_POST['ConfirmMotDePasse'];
  if ($MotDePasse != $confirmMotDePasse){
    echo "Les mots de passe saisis sont différents";
  }
}

function Validation(){
  $Nom=$_POST['Nom'];
		$Prenom=$_POST['Prenom'];
		$Email=$_POST['Email'];
		$confirmemail = $_POST['ConfirmEmail'];
		$Pseudo=$_POST['Pseudo'];
		$MotDePasse=$_POST['MotDePasse'];
		$confirmMotDePasse = $_POST['ConfirmMotDePasse'];
    if (($Nom != "") && ($Prenom != "") && ($Email != "") && ($confirmemail != "") && ($Pseudo != "") && ($MotDePasse != "") && ($confirmMotDePasse != "")) {
			if (($Email == $confirmemail) && ($MotDePasse == $confirmMotDePasse)){
				echo "Merci de vous être inscrit, ". $Prenom,. " ! ";
				echo "<br>";
				echo '<br>';
				echo " Votre adresse mail : " .$Email. ".";
				echo "<br>";
				echo '<br>';
				echo " Pour ajouter un sport à votre Profil, Rendez vous dans la rubrique : Gérer mon Profil.";
      	exit;
      }
		}
}

?>
