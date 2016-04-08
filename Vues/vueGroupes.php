<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Groupes</title>
	</head>
	<body>

		<h2>Groupes</h2>

		<table>
			<td>
				<table>
					<?php foreach ($groupe as list($nomGroupe)){ ?>
					<tr>
						<td>
							<?php echo $nomGroupe ?>
						</td>
					</tr>
					<?php } ?>
				</table>
			</td>

			<td>
				<table>
					<?php foreach ($placesLibres as list($placesLibres)){ ?>
					<tr>
						<td>
							<?php
								if ($placesLibres != 1){
									echo $placesLibres.' places restantes';
								} else{
									echo $placesLibres.' place restante';
								}
							?>
						</td>

						<td>
							<a href="index.php?page=confirmationgroupe&nom=<?php echo $nomGroupe?>"><input name="Rejoindre" type="button" value="Rejoindre le groupe"> </a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</td>
		</table>
  </body>
</html>
