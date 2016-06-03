<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueClubsAModifierPhotos;?>

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
		<h2> <?php echo $clubmodifphoto ?> </h2>
    <?php foreach ($listeClubs as list($nomclubs)) { ?>
			<table>
				<tr>
					<td> <?php echo $nomclubs?> </td>
					<td> <a href="index.php?page=modifphotoclub&club=<?php echo $nomclubs?>" > <input type="button" name="Modifier" value="<?php echo $mod ?>"> </a> </td>
				</tr>
			</table>
    <?php } ?>
	<?php } ?>

	<?php if($a == 1){ ?>
		<?php echo $nonacces ?>
	<?php } ?>
