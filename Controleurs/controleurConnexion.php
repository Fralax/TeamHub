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

  public function affichageAccueil(){
    $vue = new Vue('Accueil');
    $vue->generer();
  }
}

?>
