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
    <meta charset="utf-8">
    <link rel="stylesheet" href="Contenu/vueSuppressionEvenement.css" />
    <title> Supprimer un Evénement </title>
  </head>

  <body>

    <h2> <?php echo $supevene.$evenement ?> ! </h2>

    <p> <?php echo $redir ?> </p>

  </body>

<?php header('refresh:3;url=index.php?page=mesgroupes') ?>
</html>
