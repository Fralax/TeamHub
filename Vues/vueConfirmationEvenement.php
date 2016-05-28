<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="Contenu/vueConfirmationEvenement.css" />
    <title> Confirmation Evénement </title>
  </head>

  <body>

    <h2> Vous participez à <?php echo $evenement ?> ! </h2>

    <p> Vous allez être redirigé vers vos groupes. </p>

  </body>

  <?php header('refresh:3;url=index.php?page=mesgroupes') ?>
</html>
