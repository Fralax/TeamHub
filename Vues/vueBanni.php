<?php $this->titre = "Banni";
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
    <link rel="stylesheet" href="Contenu/vueBanni.css" />
    <title> Vous êtes Banni ! </title>
  </head>

  <body>

    <h2> <?php echo $ba ?> </h2>

    <p> <?php echo $contactadmi ?> </p>

  </body>
</html>
