<?php $this->titre = "Mot de Passe Oublié"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueMdpOublie.css" />
		<title>Mot de Passe oublié</title>
	</head>

  <body>
    <div class="mdpOublie">
      <h3>Vous avez oublié votre mot de passe ?</h3>
      <form class="formulaireMdpOublie" action="" method="post">
        <p> Insérer l'adresse mail associée à votre compte : </p>
        <p><input type="text" name="mail"> </p>
        <p> <input type="submit" name="valider" value="Réinitialiser mon Mot de Passe"> </p>
      </form>
    </div>
  </body>

</html>
