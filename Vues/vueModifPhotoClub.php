<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueModifPhotoClub;?>

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
		<div class="vueModifPhotoClub">
			<?php if($a == 0){ ?>
				<div class="formulaire" >
					<h2><?php echo $modiphoto.$caractClub['c_nom']?> </h2>
		      <img src="imagesClubs/<?php echo $caractClub['c_image']; ?>"/>
					<form name = "formulaireModifClub" method="post" action = "" enctype="multipart/form-data" >
						<p> <input type="file" name="photo" /> </p>

						<p> <input name="Modifier" type="submit" value="<?php echo $modifi ?>"> </p>
					</form>
				</div>
			<?php } ?>

			<?php if($a == 1){ ?>
				<?php echo $nonacces ?>
			<?php } ?>
		</div>
