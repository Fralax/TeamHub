<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Mes Groupes</title>
	</head>
	<body>

		<h2>Mes Groupes</h2>

		<?php foreach ($groupesAdmin as list($nomMesGroupeAdmin)) { ?>
			<p> <a href="index.php?page=moderationgroupe&nom=<?php echo $nomMesGroupeAdmin?>"> <?php echo $nomMesGroupeAdmin?> </a>
				<input name="voirMembres" type="button" value="Voir les Membres">
				<input name="Supprimer" type="button" value="Supprimer le groupe"> </p>
		<?php } ?>

		<?php foreach ($groupes as list($nomMesGroupe)) { ?>
			<p> <a href="index.php?page=groupe&nom=<?php echo $nomMesGroupe?>"> <?php echo $nomMesGroupe?> </a>
				<input name="voirMembres" type="button" value="Voir les Membres">
				<input name="quitter" type="button" value="Quitter le groupe"> </p>
		<?php } ?>

  </body>
</html>
