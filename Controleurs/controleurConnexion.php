<?php

require 'Modeles/modeleConnexion.php';

function connexionUtilisateurs(){
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

try {
  require 'Vues/vueAccueilVisiteurs.php';
  connexionUtilisateurs();
}
catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'Vues/vueErreur.php';
}
?>
