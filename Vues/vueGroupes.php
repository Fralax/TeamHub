<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Groupes</title>
	</head>

	<body>

		<h2>Groupes</h2>

		<table>
			<?php for ($i=0; $i < count($groupe); $i++) { ?>
			<tr>
				<td>
					<?php echo $groupe[$i] ?>
				</td>

				<td>
					<?php echo "Créé par ".$admin[$i] ?>
				</td>

				<td>
					<?php
					if($placesLibres[$i] > 1){
						echo $placesLibres[$i]." places restantes" ;
					} else{
						echo $placesLibres[$i]." place restante" ;
					}
					?>
				</td>

				<td>
					<?php if($placesLibres[$i] != 0){ ?>
						<a href="index.php?page=confirmationgroupe&nom=<?php echo $groupe[$i]?>"><input name="Rejoindre" type="button" value="Rejoindre le groupe"> </a>
					<?php } ?>
				</td>

			</tr>
			<?php } ?>
		</table>


  </body>
</html>
