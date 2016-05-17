<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Supprimer un Evenement </title>
	</head>
	<body>

		<h2>Supprimer un Evenement</h2>
    <table>
		<?php foreach ($listeEvenements as list($nomevenements)){ ?>
      <tr>
			  <td> <?php echo $nomevenements?> <a href="#" onclick="if (confirm('Voulez vous vraiment supprimer l\'évenement : <?php echo $nomevenements ?> ?')) window.location='index.php?page=suppressionevenement&evenement=<?php echo $nomevenements?>'; return false">  <input type="button" name="Supprimer" value ="Supprimer"> </a> </td>
      </tr>
		<?php } ?>
    </table>

  </body>
</html>
