<?php $this->titre = "Mot de Passe Oublié"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueMdpOublie.css" />
		<title>Réinitialisation Mot de Passe</title>
	</head>

  <body>
    <div class="mdpOublie">
      <h2>Bonjour <?php $_GET['pseudo'] ?> !</h2>
      <h3>Réinitialisez votre Mot de Passe :</h3>
      <form class="formulaireNouveauMdp" action="" method="post">
        <p> Nouveau Mot de Passe : <input type="password" name="mdp"> </p>
        <p> Confirmez le nouveau Mot de Passe : <input type="password" name="mdpConfirm"> </p>
        <p> <input type="submit" name="valider" value="Réinitialiser le Mot de Passe"> </p>
      </form>
    </div>
  </body>

</html>