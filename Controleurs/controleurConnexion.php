<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';


class connexion{

  public function connexionUtilisateurs(){

    $connexion = $_POST['connexion'];

    if (isset($connexion) && $connexion == 'Connexion'){
      $user = new utilisateurs();
      $resultatConnexion = $user->verifMdp()->fetch();
      $resultatBanni = $user->verifbanni()->fetch();
      $resultatActif = $user->verifActif()->fetch();
      if (password_verify($_POST['PasswordAccueil'], $resultatConnexion[0])){
        if (!$resultatBanni){
          if ($resultatActif[0] == 1){
            session_start();
            $_SESSION['pseudo'] = $resultatConnexion['u_pseudo'];
            header("Location: index.php?page=accueil");
          } else{
            header("Location: index.php?page=mailnonconfirme");
          }
        } else {
          header("Location: index.php?page=banni");
        }
      } else {
        ?> <script> alert("Mauvais Identifiant ou Mot de Passe !")</script> <?php
      }
    }
  }

  public function motDePasseOublie(){
    $user = new utilisateurs();
    $cleMdp = $user->recupCleMdp($_POST['mail'])->fetch();
    $pseudo = $user->recupPseudoMdpOublie($_POST['mail'])->fetch();

    if (isset($_POST['valider'])) {
      $destinataire = $_POST['mail'];
      $sujet = "Réinitialisation de votre Mot de Passe" ;
      $entete = "Mot de Passe oublié ..." ;
      $message = "Bonjour ".$pseudo[0]." !
Vous recevez ce message car vous avez effectué une demande de nouveau Mot de Passe.

Veuillez cliquer sur le lien pour procéder à la réinitialisation de votre Mot de Passe :

http://teamhub.pingfiles.fr/index.php?page=reinitialisermotdepasse&pseudo=".$pseudo[0]."&cle=".$cleMdp[0]."

---------------
Ceci est un mail automatique, Merci de ne pas y répondre.";

      mail($destinataire, $sujet, $message, $entete);
      header('Location: index.php?page=confirmationreinitialisationmotdepasse');
    }

    $vue = new Vue('MdpOublie');
    $vue->generer();
  }

  public function affichageConfirmationMdp(){
    $vue = new Vue('ConfirmationNouveauMotDePasse');
    $vue->generer();
  }

  public function reinitialisationMotDePasse($cle){
    $user = new utilisateurs();
    $cleBDD = $user->recupCleMdpVerif($pseudo)->fetch();
    if (isset($_POST['valider'])) {
      if ($cleBDD[0] == $cle) {
        if ($_POST['mdp'] == $_POST['mdpConfirm']) {
          if (iconv_strlen($_POST['mdpConfirm'])>=8){
            $newCleMDP = md5(microtime(TRUE)*100000);
            $newMdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
            $updateMdp = $user->updateMdp($newMdp, $newCleMDP, $_GET['pseudo']);
            header('Location: index.php?page=confirmationnouveaumdp');
          } else{
            ?> <script> alert("Votre Mot de Passe doit contenir au moins 8 caractères !")</script> <?php
          }
        } else{
          ?> <script> alert("Les Mots de Passe saisis sont différents !")</script> <?php
        }
      } else{
        ?> <script> alert("Une erreur est survenue lors de la vérification. Veuillez réessayer ultérieurement")</script> <?php
      }
    }
    $vue = new Vue('MdpOublieFormulaire');
    $vue->generer();
  }

  public function afficherConfirmationNouveauMdp(){
    $vue = new Vue('ConfirmationMotDePasseReinitialise');
    $vue->generer();
  }



  public function affichageAccueil(){
    $vue = new Vue('Accueil');
    $vue->generer();
  }
}

?>
