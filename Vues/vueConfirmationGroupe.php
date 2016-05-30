<?php $this->titre = "Confirmation - Groupe"; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="Contenu/vueConfirmationGroupe.css" />
    <title> Confirmation Groupe </title>
  </head>

  <body>

    <h2> Bienvenue dans le groupe <?php echo $nom ?> ! </h2>

    <p> Vous allez être redirigé vers vos groupes. </p>

  </body>

  <?php header('refresh:3;url=index.php?page=mesgroupes') ?>
</html>
