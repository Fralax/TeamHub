<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Contenu/vueSuppressionGroupe.css" />
    <title> Supprimer un groupe </title>
  </head>

  <body>

    <h2> Vous avez supprimé le groupe : <?php echo $nom ?> ! </h2>

    <p> Vous allez être redirigé vers vos groupes. </p>

  </body>

<?php header('refresh:3;url=index.php?page=mesgroupes') ?>
</html>
