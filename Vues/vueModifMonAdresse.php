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

			<p> Code Postal : <input type="text" name="cp" placeholder="Code Postal" size="25" value = "<?= $_POST['cp'] ?>"/> 

			<p> <input name="Envoyer" type="submit" value="Envoyer"> </p>
		</form>
	</body>
</html>
