<?php $this->titre = "Recherche Avancée - Groupe";
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>

<body>
	<div class="conteneurVueRechAvanceeGroupes">
		<h2><?php echo"Résultats pour la recherche : "?></h2>
			<table>
				<caption> <h3><?php echo $grous ?></h3> </caption>
				<?php if ($groupes == array()){ ?>
					<tr>
						<td>
							<?php echo $nonegr ?>
						</td>
					</tr>
				<?php } else{ ?>
				<?php foreach ($groupes as list($nom, $admin, $sport, $departement, $placesLibres)){ ?>
				<tr>
					<td>
						<?php $groupe = new groupes() ?>
						<?php $afficherImageSport = $groupe->afficherImage($nom)->fetch(); ?>
						<img src="imageSports/<?php echo $afficherImageSport['s_image']; ?>"/>
					</td>
					<td>
						<a href="index.php?page=groupe&nom=<?php echo $nom?>"> <?php echo $nom?> </a>
					</td>
					<td>
						<?php echo $sport?>
					</td>
					<td>
						<?php
						if($placesLibres > 1){
							echo $placesLibres.$plrests;
						} else {
							echo $placesLibres.$plrest;
						}
						?>
					</td>
					<?php if (isset($_SESSION['pseudo'])) { ?>
					<td>
						<?php if($placesLibres != 0){ ?>
						<a href="#" onclick="if (confirm('<?php echo $surrejgr.addslashes($nom) ?> ?')) window.location='index.php?page=confirmationgroupe&nom=<?php echo addslashes($nom) ?>'; return false"> <input name="Rejoindre" type="button" value="Rejoindre le groupe"> </a>
						<?php }
							else{
								$g=0;
								if ($groupesAttend == array()) {
									$g=2;
								}
								foreach ($groupesAttend as list($nomGroupeAttend)) {
									if ($nomGroupeAttend == $nom) { ?>
						<a href="#" onclick="if (confirm('<?php echo $surrejgrauto.addslashes($nom) ?> ?')) window.location='index.php?page=annulationnotifgroupe&nom=<?php echo addslashes($nom) ?>&pseudo=<?php echo $_SESSION['pseudo'] ?>'; return false"> <input name="nePlusNotifier" type="button" value="Ne plus Rejoindre"> </a>
						<?php
										$g=1;
										break;
									} else{
										$g=2;
									}
								}
						?>
						<?php if($g == 2){ ?>
							<a href="#" onclick="if (confirm('<?php echo $surrejgrp.addslashes($nom).$pllib ?>?')) window.location='index.php?page=confirmationnotifgroupe&nom=<?php echo addslashes($nom) ?>&pseudo=<?php echo $_SESSION['pseudo'] ?>'; return false"> <input name="notifier" type="button" value="Rejoindre Automatiquement"> </a>
						<?php } ?>
					<?php } ?>
					</td>
					<?php	} ?>
				</tr>
				<?php } ?>
			<?php } ?>
			</table>
		</div>
  </body>
