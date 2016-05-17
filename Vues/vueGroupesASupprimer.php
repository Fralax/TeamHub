<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Supprimer un groupe </title>
	</head>
	<body>

		<h2>Supprimer un groupe</h2>
    <table>
		<?php foreach ($listeGroupes as list($nomgroupes)){ ?>
			<td> <?php echo $nomgroupes?> <a href="index.php?page=debanni&pseudo=<?php echo $nomgroupes?>"> <input type="button" name="Supprimer" value ="Supprimer"> </a> </td>
		<?php } ?>
    </table>


  </body>
</html>
