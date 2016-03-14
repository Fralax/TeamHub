<?php

require "Modeles/modele.php";

function verifID(){
$connexion = $_POST['connexion'];
  if (isset($connexion) && $connexion == 'Connexion'){
    $pass_hache = sha1($_POST['PasswordAccueil']);

    $bdd = getBdd();
    $req = $bdd->prepare('SELECT u_id FROM Utilisateurs WHERE u_pseudo = :pseudo AND u_mdp = :passwordaccueil');
    $req->execute(array(
        'pseudo' => $_POST['pseudo'],
        'passwordaccueil' => $pass_hache));

    $resultat = $req->fetch();
<<<<<<< HEAD
=======

    return $resultat;
>>>>>>> 9e1081c3fcc2f8a6060ab59ded713a72c25cf83e
  }
  return $resultat;
}

?>
