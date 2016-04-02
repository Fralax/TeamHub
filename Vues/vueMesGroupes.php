<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Mes Groupes</title>
	</head>
	<body>

		<h2>Mes Groupes</h2>

    <?php foreach ($groupe as list($nomMesGroupe)) { ?>
    	<p> <a href="index.php?page=moderationgroupe&nom=<?php echo $nomMesGroupe?>"> <?php echo $nomMesGroupe?> </a>
        <input name="voirMembres" type="button" value="Voir les Membres">
        <input name="Supprimer" type="button" value="Supprimer"> </p>
    <?php } ?>

  </body>
</html>
