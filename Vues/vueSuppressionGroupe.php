<?php $this->titre = "Confirmation - Groupe";
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
    <link rel="stylesheet" href="Contenu/vueSuppressionGroupe.css" />
    <title> Supprimer un groupe </title>
  </head>

  <body>

    <h2> <?php echo $supgrou.$nom ?> ! </h2>

    <p> <?php echo $redir ?> </p>

  </body>

<?php header('refresh:3;url=index.php?page=mesgroupes') ?>
</html>
