<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Groupes</title>
	</head>

	<body>

		<h2>Groupes</h2>

		<table>
			<?php foreach ($groupes as list($nom, $admin, $placesLibres)){ ?>
			<tr>
				<td>
					<?php echo $nom ?>
				</td>

				<td>
					<?php echo "créé par ".$admin ?>
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
					<?php if($placesLibres != 0){ ?>
					<a href="index.php?page=confirmationgroupe&nom=<?php echo $nom?>"><input name="Rejoindre" type="button" value="Rejoindre le groupe"> </a>
					<?php } ?>
				</td>
			</tr>
			<?php } ?>
		</table>


  </body>
</html>
