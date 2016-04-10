<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Quitter Groupe </title>
  </head>

  <body>
    Vous avez quitté : <?php echo $nom ?> !
    <p> Vous allez être redirigé vers vos groupes. </p>
  </body>
  
<?php header('refresh:3;url=index.php?page=mesgroupes') ?>
</html>
