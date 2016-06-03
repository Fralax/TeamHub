<?php $this->titre = $vueMailNonConfirme;
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
    <link rel="stylesheet" href="Contenu/vueMailNonConfirme.css" />
    <title> Votre compte n'est pas activé ! </title>
  </head>

  <body>

    <h2> <?php echo $nonactif ?> </h2>
    <p> <?php echo $inscritok ?> </p>
    <p> <?php echo $clicklien ?> </p>

  </body>
</html>
