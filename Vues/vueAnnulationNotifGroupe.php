<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Vous ne rejoindrez plus ce groupe automatiquement </title>
    <link rel="stylesheet" href="Contenu/vueAnnulationNotifGroupe.css" />
  </head>

  <body>

    <h2> Vous ne rejoindrez plus automatiquement le groupe <?php echo $nom ?> ! </h2>

    <p> Vous allez être redirigé vers vos groupes. </p>

  </body>

  <?php header('refresh:3;url=index.php?page=mesgroupes') ?>
</html>