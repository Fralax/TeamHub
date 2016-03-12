<?php

require "Modeles/modele.php";

function connexionUtilisateurs(){
$connexion = $_POST['connexion'];

  if (isset($connexion) && $connexion == 'Connexion'){
    $pass_hache = sha1($_POST['passwordaccueil']);

    $bdd = getBdd();
    $req = $bdd->prepare('SELECT u_id FROM Utilisateurs WHERE u_pseudo = :pseudo AND u_mdp = :passwordaccueil');
    $req->execute(array(
        'pseudo' => $_POST['pseudo'],
        'passwordaccueil' => $pass_hache));

    $resultat = $req->fetch();

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
?>
