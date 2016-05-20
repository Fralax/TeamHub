<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

 class inscription{

   public function verif(){

     $nom=$_POST['nom'];
     $prenom=$_POST['Prenom'];
     $email=$_POST['Email'];
     $confirmEmail = $_POST['ConfirmEmail'];
     $pseudo=$_POST['pseudo'];
     $motDePasse=$_POST['MotDePasse'];
     $confirmMotDePasse = $_POST['ConfirmMotDePasse'];
     $envoyer = $_POST['Envoyer'];
     $jour = $_POST['jour'];
     $mois = $_POST['mois'];
     $annee = $_POST['annee'];
     $sexe = $_POST['Sexe'];
     $user = new utilisateurs();
     $departements = $user->recupDepartements()->fetchAll();

     if(isset($envoyer) && $envoyer == 'Envoyer'){
       if (($nom != "") && ($prenom != "") && ($sexe != "") && ($email != "") && ($confirmEmail != "") && ($pseudo != "") && ($motDePasse != "")
       && ($confirmMotDePasse != "")){
         $resultatP = $user->verifPseudo()->fetch();
         $resultatE = $user->verifEmail()->fetch();
         if(($email == $confirmEmail) && ($motDePasse == $confirmMotDePasse)){
           if (!$resultatP && !$resultatE){
             if (iconv_strlen($motDePasse)>=8){
               if (iconv_strlen($pseudo)<=12){
                 $cle = md5(microtime(TRUE)*100000);
                 $user->ajoutUtilisateurBdd($cle);

                 $destinataire = $email;
                 $sujet = "Confirmation d'inscription" ;
                 $entete = "Inscription sur le site" ;
                 $message = "Bienvenue sur TeamHub,

Merci de votre inscription et bienvenue sur TeamHub !
Pour confirmer votre inscription, veuillez cliquer sur le lien ci-dessous :
http://teamhub.pingfiles.fr/index.php?page=validationcompte&pseudo=".$_POST['pseudo']."&cle=".$cle."
---------------
Ceci est un mail automatique, Merci de ne pas y répondre.";

                 mail($destinataire, $sujet, $message, $entete);

                 header("Location: index.php?page=mailnonconfirme");
               } else {
                 echo "Votre Pseudo ne doit pas dépasser 12 caractères !";
               }
             } else {
               echo "Votre mot de passe doit comporter plus de 8 caractères !";
             }
           }
           else{
             if ($resultatP) {
                echo "Ce pseudo est déjà utilisé";
              }
             elseif ($resultatE) {
                echo "Vous êtes déjà inscrit";
              }
           }
         }
         else{
           if ($email != $confirmemail){
             echo "Les adresses mail saisies ne sont pas identiques.";
           }
           if ($motDePasse != $confirmMotDePasse){
             echo "Les mots de passe saisis ne sont pas identiques.";
           }
         }
       }

       else{
         echo "Des champs n'ont pas été remplis";
       }
     }
     $vue = new Vue('Inscription');
     $vue->generer(['departements'=>$departements]);
   }

   public function affichageNonConfirme(){
     $vue = new Vue('MailNonConfirme');
     $vue->generer();
   }

   public function validationCompte(){
     $user = new utilisateurs();
     $cleActif = $user->recupCleActifCompte()->fetch();
     if (isset($_POST['validation'])){
       if ($cleActif[u_cle] == $_GET['cle']){
         $activationCompte = $user->validerCompte();
         header("Location: index.php?page=accueil");
       }
     }
     $vue = new Vue('ValidationCompte');
     $vue->generer();
   }
 }
 ?>
