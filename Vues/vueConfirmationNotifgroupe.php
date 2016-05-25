<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Confirmation de Notification Groupe </title>
  </head>

  <body>

    <h2> Vous recevrez une notification quand une place se libèrera dans le groupe <?php echo $nom ?> ! </h2>

    <p> Vous allez être redirigé vers vos groupes. </p>

  </body>

  <?php header('refresh:3;url=index.php?page=mesgroupes') ?>
</html>
