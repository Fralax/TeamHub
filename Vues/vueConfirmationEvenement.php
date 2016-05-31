<?php $this->titre = "Confirmation - Evenement";
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="Contenu/vueConfirmationEvenement.css" />
    <title> Confirmation Evénement </title>
  </head>

  <body>

    <h2> <?php echo $partiok.$evenement ?> ! </h2>

    <p> <?php echo $redir ?> </p>

  </body>

  <?php header('refresh:3;url=index.php?page=mesgroupes') ?>
</html>
