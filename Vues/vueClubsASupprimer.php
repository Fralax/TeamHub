<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Supprimer un Club </title>
	</head>
	<body>

		<h2>Choisir quel Club supprimer </h2>

    <?php foreach ($listeClubs as list($nomclubs)) { ?>
			<table>
				<tr>
					<td> <?php echo $nomclubs?> </td>
					<td> <a href="#" onclick="if (confirm('Voulez vous vraiment supprimer ce club : <?php echo $nomclubs?> ?')) window.location='index.php?page=suppressionclub&club=<?php echo $nomclubs?>'; return false"> <input type="button" name="Supprimer" value="Supprimer"> </a> </td>
				</tr>
			</table>
    <?php } ?>

    </form>
  </body>
</html>
