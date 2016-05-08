<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueVoirLesMembres.css" />
		<title>Liste des Clubs </title>
	</head>
	<body>
		<div class="club">
			<h2>Liste des Clubs </h2>

	    <?php foreach ($club as list($nomClub, $adresseClub, $cpClub)) { ?>
	    	<p> <?php echo $nomClub?> situé au <?php echo $adresseClub?> <?php echo $cpClub?> </p>
	    <?php } ?>
		</div>

  </body>
</html>
