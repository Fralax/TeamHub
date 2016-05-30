<?php $this->titre = "Confirmation - Bannissement"; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="Contenu/vueConfirmationBannissement.css" />
    <title> Confirmation de Bannissement de Membre </title>
  </head>

  <body>

    <h2> <?php echo $pseudo ?> a bien été banni du groupe. </h2>

    <p> Vous allez être redirigé vers le groupe <?php echo $nom ?>. </p>

  </body>

  <?php header('refresh:3;url=index.php?page=groupe&nom='.$nom) ?>
</html>
