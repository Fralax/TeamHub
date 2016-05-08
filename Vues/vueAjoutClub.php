<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vue.css" />
		<title>Inscription</title>
	</head>
	<body>
		<div class="formulaire" >
			<h2>Ajout d'un nouveau club</h2>
			<form name = "formulaireNouveauClub" method="post" action = "">
				<p> Nom du club : <input type="text" name="nomClub" placeholder="Nom du Club" size="25" value = "<?= $_POST['nomClub'] ?>"/> </p>
        <p> Adresse : <input type="text" name="adresseClub" placeholder="Adresse du Club" size="25" value = "<?= $_POST['adresseClub'] ?>"/> </p>
        <p> CP : <input type="text" name="cpClub" placeholder="Code Postal" size="25" value = "<?= $_POST['cpClub'] ?>"/> </p>

				<p> <input name="ajouter" type="submit" value="Ajouter"> </p>
			</form>
		</div>
	</body>
</html>
