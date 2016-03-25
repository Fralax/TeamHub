<!DOCTYPE html>

<?php $this->titre = "Accueil"; ?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Accueil</title>
	</head>

	<body>
		<p>

			<img src="/TeamHub/Autres/Logo.png" width="306" height="172" >
  		<form action="" id="formulaireAccueil" name="formulaireAccueil" method="post">
  			<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
    		<input type="password" name="PasswordAccueil" id="passwordaccueil" placeholder="Mot de Passe" required>
    		<input name="connexion" type="submit" id="connexion" value = "Connexion">
  		</form>
			<a href="index.php?page=inscription"> <input name="inscription" type="button" id="inscription" value = "Inscription"> </a>

		</p>

	</body>
</html>
