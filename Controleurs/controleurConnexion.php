<<<<<<< HEAD
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
=======
<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';


class connexion{

  public function connexionUtilisateurs(){

    $connexion = $_POST['connexion'];

    if (isset($connexion) && $connexion == 'Connexion'){
      $user = new utilisateurs();
      $resultatConnexion = $user->verifMdp()->fetch();

      if (password_verify($_POST['PasswordAccueil'], $resultatConnexion[0])){
        session_start();
        $_SESSION['id'] = $resultatConnexion['id'];
        $_SESSION['pseudo'] = $_POST['pseudo'];
        header("Location: index.php?page=accueil");
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
>>>>>>> 33c2dcf6fa3c61c857735f20171a690ed1910e92
