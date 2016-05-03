<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Listes des Membres </title>
	</head>
	<body>

		<h2>Listes des Membres de <?php echo $nom?> </h2>

    <?php foreach ($membres as list($nomMembre)) { ?>
    	<p> - <?php echo $nomMembre?> </p>
    <?php } ?>

  </body>
</html>
