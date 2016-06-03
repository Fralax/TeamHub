<?php $this->titre = $vueNouvelAdmin;
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
		<h2><?php echo $adminnouvad ?></h2>

		<form action="" method="post">
			<select name="nouvelAdmin">
				<option value =""> -- <?php echo $memaselec ?> -- </option>
				<?php foreach ($nouveauxAdmins as list($nom)) { ?>
				<option value = "<?php echo $nom?>" > <?php echo $nom?> </option>
				<?php } ?>
			</select>
			<input type="submit" name="designer" value="<?php echo $vali ?>" >
		</form>

		<h2> <?php echo $administr ?></h2>
		<?php foreach ($admins as list($nom)){ ?>
			<?php echo $nom?> <a href="index.php?page=deop&pseudo=<?php echo $nom?>"> <input type="button" name="plusAdmin" value ="<?php echo $supadmins ?>"> </a>
		<?php } ?>
	<?php } ?>

	<?php if($z == 1){ ?>
		<?php echo $nonacces ?>
	<?php } ?>

	</body>




</html>
