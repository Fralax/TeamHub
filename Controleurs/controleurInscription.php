<?php

 require_once 'Modeles/utilisateurs.php';

 class inscription{

   public function verif(){

     $nom=$_POST['nom'];
     $prenom=$_POST['Prenom'];
     $email=$_POST['Email'];
     $confirmEmail = $_POST['ConfirmEmail'];
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

     if(isset($envoyer) && $envoyer == 'Envoyer'){
       if (($nom != "") && ($prenom != "") && ($sexe != "") && ($email != "") && ($confirmEmail != "") && ($pseudo != "") && ($motDePasse != "")
       && ($confirmMotDePasse != "") && ($cp != "") && ($ville != "") && ($adresse != "")){
         $user = new utilisateurs();
         $resultatP = $user->verifPseudo()->fetch();
         $resultatE = $user->verifEmail()->fetch();
         if(($email == $confirmEmail) && ($motDePasse == $confirmMotDePasse)){
           if (!$resultatP && !$resultatE){
             $user->ajoutUtilisateurBdd();
             $destinataire = $_POST['Email'];
             $sujet = "Confirmation d'inscription" ;
             $entete = "De: inscription@TeamHub.com" ;

             $message = 'Bienvenue sur TeamHub,

             Merci de votre inscription !

             ---------------
             Ceci est un mail automatique, Merci de ne pas y répondre.';

             mail($destinataire, $sujet, $message, $entete) ;
             $verif = true;
           }

           else{
             if ($resultatP) {
                echo "Ce pseudo est déjà utilisé";
              }

             elseif ($resultatE) {
                echo "Vous êtes déjà inscrit";
              }
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
     require 'Vues/vueInscription.php';
   }
 }
 ?>
