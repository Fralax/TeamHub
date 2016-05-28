<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Contenu/vueSuppressionEvenement.css" />
    <title> Supprimer un Evénement </title>
  </head>

  <body>

    <h2> Vous avez supprimé l'événement : <?php echo $evenement ?> ! </h2>

    <p> Vous allez être redirigé vers vos groupes. </p>

  </body>

<?php header('refresh:3;url=index.php?page=mesgroupes') ?>
</html>
