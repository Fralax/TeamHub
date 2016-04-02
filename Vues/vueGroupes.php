<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Groupes</title>
	</head>
	<body>

		<h2>Groupes</h2>

    <?php foreach ($groupe as list($nomGroupe)) { ?>
    	<p> <?php echo $nomGroupe?>
        <input name="Rejoindre" type="button" value="Rejoindre le groupe"> </p>
    <?php } ?>

  </body>
</html>
