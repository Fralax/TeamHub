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
				<div class="resultatGroupes">
					<table>
						<caption> <h3>GROUPES</h3> </caption>
						<?php if ($groupes == array()){ ?>
							<tr>
								<td>
									Aucun Groupe n'a été trouvé !
								</td>
							</tr>
						<?php } else{ ?>
						<?php foreach ($groupes as list($nom, $admin, $placesLibres)){ ?>
						<tr>
							<td>
								<a href="index.php?page=groupe&nom=<?php echo $nom?>"> <?php echo $nom?> </a>
							</td>
							<td>
								<?php
								if($placesLibres > 1){
									echo $placesLibres." places restantes";
								} else {
									echo $placesLibres. " place restante";
								}
								?>
							</td>
							<td>
								<?php if(isset($_SESSION['pseudo']) && $placesLibres !=0){ ?>
								<a href="#" onclick="if (confirm('Voulez vraiment rejoindre le groupe : <?php echo $nom ?> ?')) window.location='index.php?page=confirmationgroupe&nom=<?php echo $nom ?>'; return false"> <input name="Rejoindre" type="button" value="Rejoindre le groupe"> </a>
								<?php } ?>
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
