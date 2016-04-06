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
				<a href ="index.php?page=listemembres&nom=<?php echo $nomMesGroupeAdmin?>"> <input name="voirMembres" type="button" value="Voir les Membres"> </a>
				<a href ="index.php?page=suppressiongroupe&nom=<?php echo $nomMesGroupeAdmin?>"> <input name="Supprimer" type="button" value="Supprimer le groupe"> </a> </p>
		<?php } ?>

		<?php foreach ($groupes as list($nomMesGroupe)) { ?>
			<p> <a href="index.php?page=groupe&nom=<?php echo $nomMesGroupe?>"> <?php echo $nomMesGroupe?> </a>
				<a href ="index.php?page=listemembres&nom=<?php echo $nomMesGroupe?>"> <input name="voirMembres" type="button" value="Voir les Membres"> </a>
				<a href ="index.php?page=quittergroupe&nom=<?php echo $nomMesGroupe?>"> <input name="quitter" type="button" value="Quitter le groupe"> </a> </p>
		<?php } ?>

  </body>
</html>
