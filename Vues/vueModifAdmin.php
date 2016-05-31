<?php $this->titre = "Administration - Administrateur Groupe"; ?>
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
		<h2>Modifier l'administrateur</h2>

    <form action="" method="post">
      <select name="Admin">
        <option value = ""> -- Selectionnez un nouvel admin -- </option>
        <?php foreach ($admin as list($nomAdmin)) { ?>
        <option value = "<?php echo $nomAdmin?>" > <?php echo $nomAdmin?> </option>
        <?php } ?>
      </select>
      <input type="submit" name="Modifier" value="Modifier" >
    </form>
		<?php } ?>
		<?php if($i == 2){ ?>
        Vous n'avez pas accès à cette page.
    <?php } ?>

  </body>
</html>
