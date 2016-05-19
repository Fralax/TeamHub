<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>bannir un membre </title>
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
			<h2>Bannir un membre</h2>

	    <form action="" method="post">
	      <select name="banni">
					<option value =""> -- Selectionnez un membre à bannir -- </option>
	        <?php foreach ($abannir as list($nomabannir)) { ?>
	        <option value = "<?php echo $nomabannir?>" > <?php echo $nomabannir?> </option>
	        <?php } ?>
	      </select>
	      <input type="submit" name="bannir" value="Bannir" >
	    </form>

			<h2>Membres Bannis </h2>
			<?php foreach ($banni as list($nombanni)){ ?>
				<?php echo $nombanni?> <a href="index.php?page=debanni&pseudo=<?php echo $nombanni?>"> <input type="button" name="Débannir" value ="Débannir"> </a>
			<?php } ?>
		<?php } ?>

		<?php if($a == 1){ ?>
			Vous n'avez pas accès à cette page.
		<?php } ?>


  </body>
</html>
