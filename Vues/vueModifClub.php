<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueModifClub;?>

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
		<div class="vueModifClub">
			<?php if($z == 0){ ?>
			<h2><?php echo $adminmodinfo ?></h2>

			<form action="" method="post">
				<div class="club">
		      <h3><?php echo $formclub1 ?><input type="text" name="nomClub" value="<?php echo $caractClub['c_nom']?>"> </h3>
		      <p><?php echo $formclub2 ?>
		      <input type="text" name="adresseClub" value="<?php echo $caractClub['c_adresse'] ?>">
		      </p>
		      <p> <?php echo $formclub3 ?>
		      <input type="text" name="cpClub" value="<?php echo $caractClub['c_cp'] ?>">
		      </p>
		      <p> <?php echo $formclub4 ?>
		      <input type="text" name="numeroClub" value="<?php echo $caractClub['c_numero'] ?>">
		      </p>
					<div class="horaires">

						<table>
			        <tr>
			          <td> <?php echo $formclub8 ?> </td>
								<td> <?php echo $formclub7 ?> <input type="text" name="c_hoLundiDebut" value="<?php echo $caractClub['c_hoLundiDebut'] ?>">  <?php echo $formclub18 ?> <input type="text" name="c_hoLundiFin" value="<?php echo $caractClub['c_hoLundiFin'] ?>"> </td>
			        </tr>
			        <tr>
								<td> <?php echo $formclub9 ?> </td>
								<td> <?php echo $formclub7 ?> <input type="text" name="c_hoMardiDebut" value="<?php echo $caractClub['c_hoMardiDebut'] ?>"> <?php echo $formclub18 ?> <input type="text" name="c_hoMardiFin" value="<?php echo $caractClub['c_hoMardiFin'] ?>"> </td>
			        </tr>
							<tr>
								<td> <?php echo $formclub10 ?> </td>
								<td> <?php echo $formclub7 ?> <input type="text" name="c_hoMercrediDebut" value="<?php echo $caractClub['c_hoMercrediDebut'] ?>"> <?php echo $formclub18 ?> <input type="text" name="c_hoMercrediFin" value="<?php echo $caractClub['c_hoMercrediFin'] ?>"> </td>
							</tr>
							<tr>
								<td> <?php echo $formclub11 ?> </td>
								<td> <?php echo $formclub7 ?> <input type="text" name="c_hoJeudiDebut" value="<?php echo $caractClub['c_hoJeudiDebut'] ?>"> <?php echo $formclub18 ?> <input type="text" name="c_hoJeudiFin" value="<?php echo $caractClub['c_hoJeudiFin'] ?>"> </td>
							</tr>
							<tr>
								<td> <?php echo $formclub12 ?> </td>
								<td> <?php echo $formclub7 ?> <input type="text" name="c_hoVendrediDebut" value="<?php echo $caractClub['c_hoVendrediDebut'] ?>"> <?php echo $formclub18 ?> <input type="text" name="c_hoVendrediFin" value="<?php echo $caractClub['c_hoVendrediFin'] ?>"> </td>
							</tr>
							<tr>
								<td> <?php echo $formclub13 ?> </td>
								<td> <?php echo $formclub7 ?> <input type="text" name="c_hoSamediDebut" value="<?php echo $caractClub['c_hoSamediDebut'] ?>"> <?php echo $formclub18 ?> <input type="text" name="c_hoSamediFin" value="<?php echo $caractClub['c_hoSamediFin'] ?> "> </td>
							</tr>
							<tr>
								<td> <?php echo $formclub14 ?> </td>
								<td> <?php echo $formclub7 ?> <input type="text" name="c_hoDimancheDebut" value="<?php echo $caractClub['c_hoDimancheDebut'] ?>"> <?php echo $formclub18 ?> <input type="text" name="c_hoDimancheFin" value="<?php echo $caractClub['c_hoDimancheFin'] ?>"> </td>
							</tr>
			      </table>
						<p> <?php echo $commodifclub ?> <input type="text" name="c_hoCommentaire" value="<?php echo $caractClub['c_hoCommentaire'] ?>" size="40"> </p>
					</div>
					<input type="submit" name="Modifier" value="<?php echo $modifi ?>" >
				</form>
				<?php } ?>
				<?php if($z == 1){ ?>
					<?php echo $nonacces ?>
				<?php } ?>
		</div>
