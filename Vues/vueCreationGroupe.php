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
			<p><input type="text" name="nomGroupe" placeholder="Nom du Groupe" size="25" value = "<?= $_POST['nomGroupe'] ?>"/> </p>
		  <p> <input type="text" name="placesLibres" placeholder="Nombre de places libre" size="25" value = "<?= $_POST['placesLibres'] ?>" /> </p>

			<p> <input name="creer" type="submit" value="Créer"> </p>
		</form>
	</body>
</html>
