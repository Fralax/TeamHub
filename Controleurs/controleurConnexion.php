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

      if (password_verify($_POST['PasswordAccueil'], $resultatConnexion[0])){
        if (!$resultatBanni){
          session_start();
          $_SESSION['id'] = $resultatConnexion['id'];
          $_SESSION['pseudo'] = $_POST['pseudo'];
          header("Location: index.php?page=accueil");
        } else {
          header("Location: index.php?page=banni");
        }
      } else {
        echo "Mauvais Identifiant ou Mot de Passe !";
      }
    }
  }

  public function affichageAccueil(){
    $vue = new Vue('Accueil');
    $vue->generer();
  }
}

?>
