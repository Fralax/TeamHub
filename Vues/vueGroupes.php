<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="Contenu/vueGroupes.css" />
		<title>Groupes</title>
	</head>

	<body>
    <div class="groupes">
			<?php $groupe = new groupes() ?>
  		<h2>Groupes</h2>

  		<table>
				<?php if ($groupes[0] == "" or $groupes == ""){ ?>
					<tr>
						<td>
							Aucun Groupe n'est disponible ...
						</td>
					</tr>
					<tr>
						<td>
							Vous pouvez en créer un ! <a href="index.php?page=creationgroupe"><input type="button" name="creerGroupe" value="Créer un groupe"></a>
						</td>
					</tr>
				<?php } ?>
  			<?php foreach ($groupes as list($nom, $admin, $placesLibres)){ ?>
  			<tr>
					<td>
						<?php $afficherImageSport = $groupe->afficherImage($nom)->fetch(); ?>
						<img src="imageSports/<?php echo $afficherImageSport['s_image']; ?>"/>
					</td>
  				<td>
  					<a href="index.php?page=groupe&nom=<?php echo $nom?>"> <?php echo $nom?> </a>
  				</td>

  				<td>
  					<?php echo "  créé par : ".$admin ?>
  				</td>

  				<td>
  					<?php
  					if($placesLibres > 1){
  						echo "il y a ".$placesLibres." places restantes";
  					} else {
  						echo "il y a ".$placesLibres. " place restante";
  					}
  					?>
  				</td>

  				<td>
  					<?php if($placesLibres != 0){ ?>
						<a href="#" onclick="if (confirm('Voulez vraiment rejoindre le groupe : <?php echo $nom ?> ?')) window.location='index.php?page=confirmationgroupe&nom=<?php echo $nom; ?>'; return false"> <input name="Rejoindre" type="button" value="Rejoindre le groupe"> </a>
  					<?php } else{?>
							<a href="#" onclick="if (confirm('Voulez vraiment être notifié quand une place se libère dans le groupe <?php echo $nom ?> ?')) window.location='index.php?page=confirmationnotifgroupe&nom=<?php echo $nom; ?>'; return false"> <input name="notifier" type="button" value="Me notifier quand une place se libère"> </a>
						<?php } ?>
  				</td>
  			</tr>
  			<?php } ?>
  		</table>
    </div>
  </body>
</html>
