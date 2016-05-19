<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Modifer un Club </title>
	</head>
	<body>

		<h2>Choisir quel Club modifier </h2>

    <?php foreach ($listeClubs as list($nomclubs)) { ?>
			<table>
				<tr>
					<td> <?php echo $nomclubs?> </td>
					<td> <a href="index.php?page=modifclub&club=<?php echo $nomclubs?>" > <input type="button" name="Modifier" value="Modifier"> </a> </td>
				</tr>
			</table>
    <?php } ?>

    </form>
  </body>
</html>
