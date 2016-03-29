<!DOCTYPE html>



<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Inscription</title>
	</head>
	<body>
		<p> </p>
		<h2>Création d'un nouveau groupe</h2>


		<form  name = "formulaireNouveauGroupe" method="post" action = "">
			<p><input type="text" name="admin" placeholder="admin" size="25" value = "<?= $_POST['admin'] ?>"/> </p>
			<p><input type="text" name="nomgroupe" placeholder="Nom du Groupe" size="25" value = "<?= $_POST['nomgroupe'] ?>"/> </p>

		  <p> <input type="text" name="placelibre" placeholder="Nombre de place libre" size="25" value = "<?= $_POST['placelibre'] ?>" /> </p>

			<p> <input name="creer" type="submit" value="Créer"> </p>
		</form>
	</body>
</html>
