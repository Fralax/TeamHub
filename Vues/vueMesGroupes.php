<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Mes Groupes</title>
	</head>
	<body>

		<h2>Mes Groupes</h2>

    <?php foreach ($groupe as list($nomGroupe)) { ?>
    	<p> <?php echo $nomGroupe?> </p>
    <?php } ?>

  </body>
</html>
