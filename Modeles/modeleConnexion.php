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

    return $resultat;
  }
}
?>
