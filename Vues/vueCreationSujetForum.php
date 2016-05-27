<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/" />
		<title>Inscription</title>
	</head>
	<body>
		<div class="formulaire" >
			<h2>Création d'un nouveau sujet</h2>
			<form name = "formulaireNouveauSujet" method="post" action = "">
				<p> Nom du groupe : <input type="text" name="nomSujet" placeholder="Nom du Sujet" size="25" value = "<?= $_POST['nomSujet'] ?>"/> </p>
        <p>
         <textarea name="message" rows="7" cols="70"> </textarea>
       </p>

				<p> <input name="Creer" type="submit" value="Créer"> </p>
			</form>
		</div>
	</body>
</html>
