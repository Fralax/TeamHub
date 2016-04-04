<!DOCTYPE html>

<?php $this->titre = "Modifier Mon Mot de Passe"; ?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Modifier Mon Mot de Passe</title>
	</head>
	<body>
		<p> </p>
		<h2>Modifier Mon Mot de Passe</h2>


		<form  name = "formulaireModifMonMdp" method="post" action = "">

			<p> <input type="password" name="AncienMotDePasse" placeholder="Ancien Mot De Passe" size="25" value = ""/> </p>
      <p> <input type="password" name="NouveauMotDePasse" placeholder="Nouveau Mot De Passe" size="25" value = ""/> </p>
			<p> <input type="password" name="ConfirmNouveauMotDePasse" placeholder="Confirmer Mot De Passe" size="25" value = ""/> </p>
			<p> <input name="Envoyer" type="submit" value="Envoyer"> </p>

		</form>
	</body>
</html>
