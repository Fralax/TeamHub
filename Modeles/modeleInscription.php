<?php

require "Modeles/modele.php";

function ajoutUtilisateurBdd(){

    $pass_hache = sha1($_POST['MotDePasse']);

    $date = "{$_POST['annee']}-{$_POST['mois']}-{$_POST['jour']}";

    $bdd = getBdd();

    $req = $bdd->prepare('INSERT INTO Utilisateurs(u_pseudo, u_nom, u_prenom, u_sexe, u_adresse,
                                            u_ville, u_cp, u_region, u_portable, u_email, u_naissance, u_mdp)
                  VALUES (:pseudo, :nom, :prenom, :sexe, :adresse, :ville, :cp, :departement, :portable, :email, :naissance, :mdp)');
    $req-> execute(array(
      'pseudo' => $_POST['Pseudo'],
      'nom' => $_POST['Nom'],
      'prenom' => $_POST['Prenom'],
      'sexe' => $_POST['Sexe'],
      'adresse' => $_POST['Adresse'],
      'ville' => $_POST['Ville'],
      'cp' => $_POST['CodePostal'],
      'departement' => $_POST['departement'],
      'portable' => $_POST['Portable'],
      'email' => $_POST['Email'],
      'naissance' => $date,
      'mdp' => $pass_hache,
    ));
}

function verifPseudo(){

  $connexion = $_POST['Envoyer'];
    if (isset($connexion) && $connexion == 'Envoyer'){

      $bdd = getBdd();
      $req = $bdd->prepare('SELECT u_id FROM Utilisateurs WHERE u_pseudo = :Pseudo ');
      $req->execute(array(
              'Pseudo' => $_POST['Pseudo']));

      $resultatP = $req->fetch();

      return $resultatP;
    }
}

function verifEmail(){

  $connexion = $_POST['Envoyer'];
    if (isset($connexion) && $connexion == 'Envoyer'){

      $bdd = getBdd();
      $req = $bdd->prepare('SELECT u_id FROM Utilisateurs WHERE u_email = :Email ');
      $req->execute(array(
          'Email' => $_POST['Email']));

      $resultatE = $req->fetch();

      return $resultatE;
    }
}
?>
