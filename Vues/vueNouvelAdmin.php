<?php $this->titre = "Administration - Administrateur"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueNouvelAdmin.css" />
		<title>Administrateurs </title>
	</head>

	<?php
		require_once 'Controleurs/controleurAdministration.php';
		$admin = new controleurAdministration();
		$verifAdmin = $admin->verifAdmin();
			if($verifAdmin == true){
				$z=0;
			} else{
				$z=1;
			}
	?>

	<body>

		<?php if($z == 0){ ?>
		<h2>Désigner un Administrateur</h2>

		<form action="" method="post">
			<select name="nouvelAdmin">
				<option value =""> -- Sélectionnez un membre à désigner comme administrateur -- </option>
				<?php foreach ($nouveauxAdmins as list($nom)) { ?>
				<option value = "<?php echo $nom?>" > <?php echo $nom?> </option>
				<?php } ?>
			</select>
			<input type="submit" name="designer" value="Valider" >
		</form>

		<h2>Administrateurs</h2>
		<?php foreach ($admins as list($nom)){ ?>
			<?php echo $nom?> <a href="index.php?page=deop&pseudo=<?php echo $nom?>"> <input type="button" name="plusAdmin" value ="Supprimer des Administrateurs"> </a>
		<?php } ?>
	<?php } ?>

	<?php if($z == 1){ ?>
		Vous n'avez pas accès à cette page.
	<?php } ?>

	</body>




</html>
