<?php $this->titre = $vueClubsASupprimer;
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
		<link rel="stylesheet" href="Contenu/vueClubsASupprimer.css" />
		<title>Supprimer un Club </title>
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
			<h2> <?php echo $clubsuppchoix ?> </h2>
	    <?php foreach ($listeClubs as list($nomclubs)) { ?>
				<table>
					<tr>
						<td> <?php echo $nomclubs?> </td>
						<td> <a href="#" onclick="if (confirm('<?php echo $sursupp.addslashes($nomclubs)?> ?')) window.location='index.php?page=suppressionclub&club=<?php echo addslashes($nomclubs)?>'; return false"> <input type="button" name="Supprimer" value="<?php echo $sup ?>"> </a> </td>
					</tr>
				</table>
	    <?php } ?>
		<?php } ?>

		<?php if($a == 1){ ?>
				<?php echo $nonacces ?>
		<?php } ?>

  </body>
</html>
