<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueMesGroupes.css" />
		<title>Mes Groupes</title>
	</head>
	<body>
		<div class="mesGroupes">
			<h2>Mes Groupes</h2>
				<table>
					<?php if ($groupesAccueil[0][0] == ""){ ?>
						<tr>
							<td>
								<b>Vous n'avez encore rejoint aucun groupe ... </b>
							</td>
						</tr>
						<tr>
							<td>
								Rejoignez-en un vite ! <a href="index.php?page=groupes"><input type="button" name="rejoindreGroupe" value="Rejoindre un Groupe"></a>
							</td>
						</tr>
						<tr>
							<td>
								Ou créez votre propre groupe ! <a href="index.php?page=creationgroupe"><input type="button" name="creerGroupe" value="Créer un groupe"></a>
							</td>
						</tr>
					<?php } ?>

					<?php foreach ($groupesAdmin as list($nomMesGroupeAdmin, $nbrEvenements)) { ?>
							<tr>
								<td>
									<a href="index.php?page=groupe&nom=<?php echo $nomMesGroupeAdmin?>"> <?php echo $nomMesGroupeAdmin?> </a>
								</td>
								<td>
									<?php echo $nbrEvenements." événements en cours" ?>
								</td>
								<td>
									<a href="#" onclick="if (confirm('Voulez vraiment supprimer le groupe : <?php echo $nomMesGroupeAdmin ?> ?')) window.location='index.php?page=suppressiongroupe&nom=<?php echo $nomMesGroupeAdmin?>'; return false"> <input name="Supprimer" type="button" value="Supprimer le groupe"> </a>
								</td>
							</tr>

					<?php } ?>
					<?php foreach ($groupes as list($nomMesGroupe, $nbrEvenements)) { ?>
						<tr>
							<td>
								<a href="index.php?page=groupe&nom=<?php echo $nomMesGroupe?>"> <?php echo $nomMesGroupe?> </a>
							</td>
							<td>
								<?php echo $nbrEvenements." événements en cours" ?>
							</td>
							<td>
								<a href="#" onclick="if (confirm('Voulez vraiment quitter le groupe : <?php echo $nomMesGroupe ?> ?')) window.location='index.php?page=quittergroupe&nom=<?php echo $nomMesGroupe?>'; return false"> <input name="quitter" type="submit" value="Quitter le groupe"> </a>
							</td>
						</tr>
					<?php } ?>
				</table>

			</div>
  </body>
</html>
