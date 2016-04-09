<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Recherche</title>
	</head>

	<body>

		<h2>Recherche</h2>
    <?php foreach ($groupes as list($groupes)) { ?>
    	<p> <?php echo $groupes?> </p>
    <?php } ?>
		<?php foreach ($membres as list($membres)) { ?>
			<p> <?php echo $membres ?> </p>
		<?php } ?>
  </body>
</html>
