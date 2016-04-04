<!DOCTYPE html>

<?php $this->titre = "Modifier Mes Informations"; ?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Modifier Mes Coordonnés</title>
	</head>
	<body>
		<p> </p>
		<h2>Modifier Mes Coordonnés</h2>


		<form  name = "formulaireModifMesCoordonnes" method="post" action = "">

			<p> <input type="tel" name="Portable" placeholder="Téléphone Portable" size="25" value = "<?php echo $infos[u_portable] ?>" /> </p>

			<p> <input type="email" name="Email" placeholder="Email" size="25" value = "<?php echo $infos[u_email] ?>"/> </p>
			<p> <input type="email" name="ConfirmEmail" placeholder="Confirmation Email" size="25" value = "<?php echo $infos[u_email] ?>"/> </p>

			<p> <input name="Envoyer" type="submit" value="Envoyer"> </p>
		</form>
	</body>
</html>
