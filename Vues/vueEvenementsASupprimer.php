<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
 $this->titre = $vueEvenementsASupprimer;?>

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
			<h2><?php echo $supev ?></h2>
	    <table>
			<?php foreach ($listeEvenements as list($nomevenements)){ ?>
	      <tr>
				  <td> <?php echo $nomevenements?> </td>
					<td> <a href="#" onclick="if (confirm('<?php echo $sursupeve.addslashes($nomevenements) ?> ?')) window.location='index.php?page=suppressionevenement&evenement=<?php echo addslashes($nomevenements) ?>'; return false">  <input type="button" name="Supprimer" value ="<?php echo $sup ?>"> </a></td>
	      </tr>
			<?php } ?>
	    </table>
		<?php } ?>

		<?php if($a == 1){ ?>
				<?php echo $nonacces ?>
		<?php } ?>
