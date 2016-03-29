<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';


class connexion{

  public function connexionUtilisateurs(){

    $connexion = $_POST['connexion'];


    if (isset($connexion) && $connexion == 'Connexion'){

      $user = new utilisateurs();
      $resultatConnexion = $user->verifConnexion()->fetch();

      if (!$resultatConnexion) {
        echo 'Mauvais identifiant ou mot de passe !';
      }

      else {

        session_start();
        $_SESSION['id'] = $resultatConnexion['id'];
        $_SESSION['pseudo'] = $_POST['Pseudo'];

        $vue = new Vue('AccueilMembres');
        $vue->genererMembres();
        header("Location: index.php?page=accueilmembres");

      }
    }

    if (!$resultatConnexion) {
      $vue = new Vue('AccueilVisiteurs');
      $vue->genererVisiteurs();
    }
  }

  public function afficherAProposVisiteurs(){
    $vue = new Vue('APropos');
    $vue->genererVisiteurs();

  }
}

?>
