<?php $this->titre = "Groupe - Membres"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueVoirLesMembres.css" />
		<title>Listes des Membres </title>
	</head>
	<body>
		<div class="membres">
			<h2>Listes des Membres de <?php echo $nom?> </h2>

	    <?php foreach ($membres as list($nomMembre)) { ?>
	    	<a href="index.php?page=profil&nom=<?php echo $nomMembre ?>"> <p> <?php echo $nomMembre?></p></a>
	    <?php } ?>
		</div>

  </body>
</html>
