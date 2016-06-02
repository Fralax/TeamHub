<?php $this->titre = "Administration - Administrateur Groupe";
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
		<link rel="stylesheet" href="Contenu/vueModifAdmin.css" />
		<title>Modifier l'Administrateur</title>
	</head>
	<body>

		<?php
      if ($caract['g_admin'] == $_SESSION['pseudo']) {
        $i = 1;
      } else{
        $i = 2;
      }
    ?>

		<?php if( $i == 1){ ?>
		<h2><?php echo $modadmin ?></h2>

    <form action="" method="post">
      <select name="Admin">
        <option value = ""> -- <?php echo $newadmi ?> -- </option>
        <?php foreach ($admin as list($nomAdmin)) { ?>
        <option value = "<?php echo $nomAdmin?>" > <?php echo $nomAdmin?> </option>
        <?php } ?>
      </select>
      <input type="submit" name="Modifier" value="Modifier" >
    </form>
		<?php } ?>
		<?php if($i == 2){ ?>
        <?php echo $nonacces ?>
    <?php } ?>

  </body>
</html>
