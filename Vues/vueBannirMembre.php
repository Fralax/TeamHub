<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueBannirMembre;?>

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
			<h2><?php echo $adminbann ?></h2>

	    <form action="" method="post">
	      <select name="banni">
					<option value =""> -- <?php echo $selectadmin ?> -- </option>
	        <?php foreach ($abannir as list($nomabannir)) { ?>
	        <option value = "<?php echo $nomabannir?>" > <?php echo $nomabannir?> </option>
	        <?php } ?>
	      </select>
	      <input type="submit" name="bannir" value="<?php echo $bani ?>" >
	    </form>

			<h2> <?php $mban ?> </h2>
			<?php foreach ($banni as list($nombanni)){ ?>
				<?php echo $nombanni?> <a href="index.php?page=debanni&pseudo=<?php echo $nombanni?>"> <input type="button" name="Débannir" value ="<?php echo $deban ?>"> </a>
			<?php } ?>
		<?php } ?>

		<?php if($a == 1){ ?>
			<?php echo $nonacces ?>
		<?php } ?>
