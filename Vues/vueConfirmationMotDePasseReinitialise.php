<?php $this->titre = "Confirmation - Mot de Passe"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueConfirmationMotDePasseReinitialise.css" />
		<title>Mot de Passe Réinitialisé</title>
	</head>

  <body>
    <div class="mdpConfirm">
      <h3>Votre Mot de Passe a bien été réinitialisé.</h3>
      <p>
        Vous pouvez à présent vous connecter.
      </p>
      <p>
        Vous allez être redirigé vers l'accueil.
      </p>
    </div>
  </body>
<?php header('refresh:3;url=index.php?') ?>
</html>
