<?php

require 'Modeles/utilisateurs.php';
require 'Vues/vue.php';

class connexion{

  public function connexionUtilisateurs(){

    $resultat = verifID();
    $connexion = $_POST['connexion'];

    if (isset($connexion) && $connexion == 'Connexion'){
      if (!$resultat) {
          echo 'Mauvais identifiant ou mot de passe !';
      }
      $connexion = $_POST['connexion'];
      if (isset($connexion) && $connexion == 'Connexion'){
        $resultat = verifID();
        if (!$resultat) {
            echo 'Mauvais identifiant ou mot de passe !';
        }
        else {
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo'] = $_POST['pseudo'];
            echo 'Vous êtes connecté !';
        }
      }
    }
  }

  public function accueil(){

  }

}

try {
  require 'Vues/vueAccueilVisiteurs.php';
  connexionUtilisateurs();
}
catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'Vues/vueErreur.php';
}
?>
