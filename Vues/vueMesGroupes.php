<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueMesGroupes.css" />
		<title>Mes Groupes</title>
	</head>
	<body>

		<h2>Mes Groupes</h2>

			<table>
				<?php foreach ($groupesAdmin as list($nomMesGroupeAdmin)) { ?>
						<tr>
							<td>
								<a href="index.php?page=groupe&nom=<?php echo $nomMesGroupeAdmin?>"> <?php echo $nomMesGroupeAdmin?> </a>
							</td>
							<td>
								<a href ="index.php?page=listemembres&nom=<?php echo $nomMesGroupeAdmin?>"> <input name="voirMembres" type="button" value="Voir les Membres"> </a>
							</td>
							<td>
								<a href ="index.php?page=suppressiongroupe&nom=<?php echo $nomMesGroupeAdmin?>"> <input name="Supprimer" type="button" value="Supprimer le groupe"> </a>
							</td>
						</tr>

				<?php } ?>
				<?php foreach ($groupes as list($nomMesGroupe)) { ?>
					<tr>
						<td>
							<a href="index.php?page=groupe&nom=<?php echo $nomMesGroupe?>"> <?php echo $nomMesGroupe?> </a>
						</td>
						<td>
							<a href ="index.php?page=listemembres&nom=<?php echo $nomMesGroupe?>"> <input name="voirMembres" type="button" value="Voir les Membres"> </a>
						</td>
						<td>
							<a href ="index.php?page=quittergroupe&nom=<?php echo $nomMesGroupe?>"> <input name="quitter" type="submit" value="Quitter le groupe"> </a>
						</td>
					</tr>
				<?php } ?>
			</table>

  </body>
</html>
