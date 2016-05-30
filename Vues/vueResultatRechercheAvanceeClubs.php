<?php $this->titre = "Recherche Avancée - Club"; ?>
<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueResultatsRecherche.css" />
		<title>Recherche</title>
	</head>

	<body>
		<div class="conteneur">
			<h2><?php echo"Résultats pour la recherche : "?></h2>
			<div class="resultats">
				<div class="resultatClubs">
					<table>
						<caption> <h3>CLUBS</h3> </caption>
						<?php if ($clubs == array()){ ?>
							<tr>
								<td>
									Aucun Club n'a été trouvé !
								</td>
							</tr>

						<?php } else{ ?>
						<?php foreach ($clubs as list($nom)){ ?>
							<tr>
								<td>
									<a href="index.php?page=club&nom=<?php echo $nom?>"> <?php echo $nom?> </a>
								</td>
							</tr>
							<?php } ?>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
  </body>
</html>
