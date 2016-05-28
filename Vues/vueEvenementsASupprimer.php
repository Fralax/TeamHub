<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueEvenementsASupprimer.css" />
		<title>Supprimer un Evénement</title>
	</head>
	<body>

		<?php
			require_once 'Controleurs/controleurAdministration.php';
			$admin = new controleurAdministration();
			$verifAdmin = $admin->verifAdmin();
				if($verifAdmin == true){
					$a=0;
				} else{
					$a=1;
				}
		?>

		<?php if($a == 0){ ?>
			<h2>Supprimer un Evénement</h2>
	    <table>
			<?php foreach ($listeEvenements as list($nomevenements)){ ?>
	      <tr>
				  <td> <?php echo $nomevenements?> </td>
					<td> <a href="#" onclick="if (confirm('Voulez vous vraiment supprimer l\'évenement : <?php echo $nomevenements ?> ?')) window.location='index.php?page=suppressionevenement&evenement=<?php echo $nomevenements?>'; return false">  <input type="button" name="Supprimer" value ="Supprimer"> </a></td>
	      </tr>
			<?php } ?>
	    </table>
		<?php } ?>

		<?php if($a == 1){ ?>
				Vous n'avez pas accès à cette page.
		<?php } ?>

  </body>
</html>
