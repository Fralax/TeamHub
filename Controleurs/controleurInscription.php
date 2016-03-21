<?php

require_once 'Modeles/utilisateurs.php';

class inscription{

  public function verif(){

    $nom=$_POST['nom'];
    $prenom=$_POST['Prenom'];
    $email=$_POST['Email'];
    $confirmemail = $_POST['ConfirmEmail'];
    $pseudo=$_POST['Pseudo'];
    $motDePasse=$_POST['MotDePasse'];
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

    require 'Vues/vueInscription.php';

    if(isset($envoyer) && $envoyer == 'Envoyer'){
      if (($nom != "") && ($prenom != "") && ($sexe != "") && ($email != "") && ($confirmemail != "") && ($pseudo != "") && ($motDePasse != "")
      && ($confirmMotDePasse != "") && ($cp != "") && ($ville != "") && ($adresse != "")){
        if(($email == $confirmemail) && ($motDePasse == $confirmMotDePasse)){
          if (!$resultatP){
            if(!$resultatE){
              $util=new utilisateurs();
              $util->ajoutUtilisateurBdd();
              $verif = true;
            }
          }

          elseif ($resultatP) {
            echo "Ce pseudo est déjà utilisé";
            $verif = false;
          }

          elseif ($resultatE) {
            echo "Vous êtes déjà inscrit";
            $verif = false;
          }
        }

        else{
          if ($email != $confirmemail){
            echo "Les adresses mail saisies ne sont pas identiques.";
          }

          if ($motDePasse != $confirmMotDePasse){
            echo "Les mots de passe saisis ne sont pas identiques.";
          }
          $verif = false;
        }
      }

      else{
        echo "Des champs n'ont pas été remplis";
        $verif = false;
      }
    }
  }
}
?>
