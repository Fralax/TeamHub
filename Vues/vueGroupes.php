<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="Contenu/vueGroupes.css" />
		<title>Groupes</title>
	</head>

	<body>
    <div class="groupes">
  		<h2>Groupes</h2>

  		<table>
  			<?php foreach ($groupes as list($nom, $admin, $placesLibres)){ ?>
  			<tr>
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
  					<?php } ?>
  				</td>
  			</tr>
  			<?php } ?>
  		</table>
    </div>
  </body>
</html>
