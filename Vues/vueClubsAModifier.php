<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Modifer un Club </title>
	</head>
	<body>

		<h2>Modifer un Club</h2>
    <table>
		<?php foreach ($listeClubs as list($nomclubs)){ ?>
      <tr>
			  <td> <?php echo $nomclubs?> </td>
				<td> <a href="#" onclick="if (confirm('Voulez vous vraiment modifier le club: <?php echo $nomclubs ?> ?')) window.location='index.php?page=suppressionevenement&evenement=<?php echo $nomclubs?>'; return false">  <input type="button" name="Modifier" value ="Modifier"> </a></td>
      </tr>
		<?php } ?>
    </table>

  </body>
</html>
