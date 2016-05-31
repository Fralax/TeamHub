<?php $this->titre = "Confirmation - Bannissement";
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
    <link rel="stylesheet" href="Contenu/vueConfirmationBannissementMembre.css" />
    <title> Confirmation de Bannissement de Membre </title>
  </head>

  <body>

    <h2> <?php echo $pseudo.$banok ?> </h2>

    <p>  <?php echo $redirgr.$nom ?>. </p>

  </body>

  <?php header('refresh:3;url=index.php?page=groupe&nom='.$nom) ?>
</html>
