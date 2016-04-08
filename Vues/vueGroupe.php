<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Groupe</title>
	</head>
	<body>

		<h2>Groupe <?php echo $caract['g_nom']?> </h2>

		<p> Description du groupe :
			<?php echo $caract['g_description'] ?> </p>
    <p> Administrateur : <?php echo $caract['g_admin'] ?></p>
		<p> Sport : <?php echo $caract['g_sport'] ?></p>
		<p> Lieu : <?php echo $caract['g_departement'] ?></p>
		<p> Nombre de places : <?php echo $caract['g_placesLibres'] ?></p>
		<?php if ($caract['g_admin'] == $_SESSION['pseudo']) {?>
			<p> <a href = "index.php?page=affichagemodificationdescription&nom=<?php echo $caract['g_nom']?>" > <input type="button" name="Description" value="Modifier la description"> </a>
			<a href = "index.php?page=affichagemodificationadmin&nom=<?php echo $caract['g_nom']?>" > <input type="button" name="Admin" value="Désigner un nouvel Admin"> </a> </p>
		<?php }?>
  </body>
</html>
