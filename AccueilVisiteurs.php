<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Accueil</title>
<link href="AccueilVisiteurs.css" rel="stylesheet" type="text/css">
</head>
	
<body>
	<p><a href="AccueilVisiteurs.php"><img src="Logo.png" width="306" height="172" alt=""></a>
    	<form id="FormulaireAccueil" name="FormulaireAccueil" method="post">
   			<input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
     		<input type="password" name="PasswordAccueil" id="passwordaccueil" placeholder="Mot de Passe" required>
     	 	<input name="connexion" type="button" id="connexion" value = "Connexion">
			<input type="checkbox">Connexion Automatique
        </form>
		<a href="Inscription.php">
			<input name="inscription" type="button" id="inscription" value = "Inscription">
		</a>
	</p>
</body>
</html>