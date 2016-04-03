<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Confirmation Groupe </title>
  </head>

  <body>
    Bienvenue dans le groupe <?php echo $nom ?> !
    <p> <a href="index.php?page=groupe&nom=<?php echo $nom?>"> <input name="voirGroupe" type="button" value="Accéder au groupe"> </a> </p>
    <p> <a href="index.php?page=accueilmembres"> <input name="voirAccueil" type="button" value="Retour à l'Accueil"> </a> </p>
  </body>
</html>
