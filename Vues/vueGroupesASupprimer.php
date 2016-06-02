<?php $this->titre = "Administration - Groupe";
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueGroupesASupprimer.css" />
		<title>Supprimer un groupe</title>
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
			<h2><?php echo $adminsupgroup ?></h2>
	    <table>
			<?php foreach ($listeGroupes as list($nomgroupes)){ ?>
	      <tr>
				  <td> <?php echo $nomgroupes?> </td>
					<td> <a href="#" onclick="if (confirm('<?php echo $sursupgr.addslashes($nomgroupes) ?> ?')) window.location='index.php?page=suppressiongroupe&nom=<?php echo addslashes($nomgroupes) ?>'; return false">  <input type="button" name="Supprimer" value ="Supprimer"> </a></td>
	      </tr>
			<?php } ?>
	    </table>
		<?php } ?>

		<?php if($a == 1){ ?>
			<?php echo $nonacces ?>
		<?php } ?>

  </body>
</html>
