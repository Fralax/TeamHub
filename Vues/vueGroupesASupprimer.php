<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Supprimer un groupe </title>
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
			<h2>Supprimer un groupe</h2>
	    <table>
			<?php foreach ($listeGroupes as list($nomgroupes)){ ?>
	      <tr>
				  <td> <?php echo $nomgroupes?> </td>
					<td> <a href="#" onclick="if (confirm('Voulez vous vraiment supprimer le groupe : <?php echo $nomgroupes ?> ?')) window.location='index.php?page=suppressiongroupe&nom=<?php echo $nomgroupes?>'; return false">  <input type="button" name="Supprimer" value ="Supprimer"> </a></td>
	      </tr>
			<?php } ?>
	    </table>
		<?php } ?>

		<?php if($a == 1){ ?>
			Vous n'avez pas accès à cette page.
		<?php } ?>

  </body>
</html>
