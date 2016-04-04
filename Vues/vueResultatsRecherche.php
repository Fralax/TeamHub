<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Recherche</title>
	</head>
	<body>

		<h2>Recherche</h2>

    <?php foreach ($resultats as list($nomGroupe)) { ?>
    	<p> <?php echo $nomGroupe?> </p>
    <?php } ?>

  </body>
</html>
