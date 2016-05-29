<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueVoirLesClubs.css" />
		<title>Liste des Clubs </title>
	</head>
	<body>
		<div class="clubs">
			<div class="liste">
				<h2>Liste des Clubs </h2>
			</div>

			<table>
				<?php foreach ($club as list($nomClub, $adresseClub, $cpClub, $villeClub, $image)) { ?>
				<tr>
					<td>
						<img src="imagesClubs/<?php echo $image ?>"/>
					</td>
					<td>
						<a href="index.php?page=club&nom=<?php echo $nomClub?>"> <?php echo $nomClub?></a>
					</td>
					<td>
						situé au <?php echo $adresseClub?> <?php echo $cpClub?> <?php echo $villeClub?>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>

  </body>
</html>
