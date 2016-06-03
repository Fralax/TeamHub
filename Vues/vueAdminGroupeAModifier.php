<?php $this->titre = $vueAdminGroupeAModifier;
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}?>

	<body>

		<div class="adminGroupeAModifier">
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
				<h2><?php echo $groupmodifadmin ?></h2>
		    <table>
				<?php foreach ($listeGroupes as list($nomgroupes)){ ?>
		      <tr>
					  <td> <?php echo $nomgroupes?> </td>
						<td> <a href="index.php?page=affichagemodificationadmin&nom=<?php echo $nomgroupes?>" >  <input type="button" name="Modifier" value ="<?php echo $modiadmin ?>"> </a></td>
		      </tr>
				<?php } ?>
		    </table>
			<?php } ?>

			<?php if($a == 1){ ?>
				<?php echo $nonacces?>
			<?php } ?>
		</div>

  </body>
