<?php

require 'Modeles/modeleConnexion.php';

function connexionUtilisateurs(){
<<<<<<< HEAD
  $connexion = $_POST['connexion'];
  if (isset($connexion) && $connexion == 'Connexion'){
    $resultat = verifID();
    if (!$resultat) {
        echo 'Mauvais identifiant ou mot de passe !';
    }
=======

  $resultat = verifID();
  $connexion = $_POST['connexion'];

  if (isset($connexion) && $connexion == 'Connexion'){
    if (!$resultat) {
        echo 'Mauvais identifiant ou mot de passe !';
    }

>>>>>>> f48ed8bd5311df03e5c448007350505fca0713c8
    else {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $_POST['pseudo'];
        echo 'Vous êtes connecté !';

    }
  }
}
<<<<<<< HEAD
=======

>>>>>>> f48ed8bd5311df03e5c448007350505fca0713c8

try {
  require 'Vues/vueAccueilVisiteurs.php';
  connexionUtilisateurs();
}

catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'Vues/vueErreur.php';
}
?>
