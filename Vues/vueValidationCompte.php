<?php $this->titre = "Validation Compte";
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
    <link rel="stylesheet" href="Contenu/vueValidationCompte.css" />
    <title> Confirmation du compte </title>
  </head>

  <body>

    <h2> <?php echo $nonactif ?></h2>

    <p> <?php echo $valereco ?> </p>

    <form class="validationCompte" action="" method="post">
      <input type="submit" name="validation" value="<?php echo $conf ?>">
    </form>

  </body>
</html>
