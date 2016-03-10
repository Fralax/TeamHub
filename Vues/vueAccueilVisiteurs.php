<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Accueil</title>
</head>

<body>
	<p>
  <a href="Index.php"><img src="Autres/Logo.png" width="306" height="172" alt=""></a>

  <form action="#" id="formulaireAccueil" name="formulaireAccueil" method="post">
  	<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
    <input type="password" name="PasswordAccueil" id="passwordaccueil" placeholder="Mot de Passe" required>
    <input name="connexion" type="button" id="connexion" value = "Connexion">
		<input type="checkbox">Connexion Automatique
  </form>

	<a href="Vues/vueInscription.php" >	<input name="inscription" type="button" id="inscription" value = "Inscription"> </a>
	</p>

</body>
</html>
