<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Recherche</title>
	</head>

	<body>

		<h2><?php echo"Résultats pour la recherche : ".$_GET['resultatsrecherche'] ?></h2>

		<h3> Groupes </h3>

		<?php if($groupes == array()){
			echo "Aucun Groupe n'a été trouvé !";
		} else{
		?>

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
					<?php if(isset($_SESSION['pseudo']) && $placesLibres !=0){ ?>
					<a href="index.php?page=confirmationgroupe&nom=<?php echo $nom ?>"><input name="Rejoindre" type="button" value="Rejoindre le groupe"> </a>
					<?php } ?>
				</td>
			</tr>
			<?php } ?>
		</table>
		<?php } ?>

		<h3> Membres </h3>

		<?php if ($membres == array()){
			echo "Aucun Membre n'a été trouvé !";
			} else{
		?>

		<table>
			<?php foreach ($membres as list($nom)){ ?>
				<tr>
					<td>
						<?php echo $nom ?>
					</td>
				</tr>
				<?php } ?>
		</table>

		<?php } ?>

  </body>
</html>
