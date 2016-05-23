<!DOCTYPE html>

<?php $this->titre = "Modifier Mon Adresse"; ?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Modifier Mon Adresse</title>
	</head>
	<body>
		<p> </p>
		<h2>Modifier Mon Adresse</h2>


		<form  name = "formulaireModifMonAdresse" method="post" action = "">

			<p>
				<select name="departement" required>
					<option value=""> -- Sélectionner votre Département -- </option>
					<?php foreach ($departements as list($nom)): ?>
						<option value="<?php echo $nom ?>" <?php if ($_POST['departement']== $nom){?> selected <?php }?>> <?php echo $nom ?> </option>
					<?php endforeach; ?>
				</select>
			</p>

			<p> <input name="Envoyer" type="submit" value="Envoyer"> </p>
		</form>
	</body>
</html>
