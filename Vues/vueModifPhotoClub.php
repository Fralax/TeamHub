<?php $this->titre = "Administration - Club"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueModifPhotoClub.css" />
		<title>Modifier Photo du Club</title>
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
			<div class="formulaire" >
				<h2>Modifer la photo de <?php echo $caractClub['c_nom']?> </h2>
	      <img src="imagesClubs/<?php echo $caractClub['c_image']; ?>"/>
				<form name = "formulaireModifClub" method="post" action = "" enctype="multipart/form-data" >
					<p> <input type="file" name="photo" /> </p>

					<p> <input name="Modifier" type="submit" value="Modifier"> </p>
				</form>
			</div>
		<?php } ?>

		<?php if($a == 1){ ?>
			Vous n'avez pas accès à cette page.
		<?php } ?>

	</body>
</html>
