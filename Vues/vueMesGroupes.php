<?php $this->titre = "Groupes - Mes Groupes";
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>
	<body>
		<div class="mesGroupesVueMesGroupes">
			<?php $groupe = new groupes() ?>
			<h2><?php echo $ssmenu3 ?></h2>
				<table>
					<?php if ($groupesAccueil[0][0] == ""){ ?>
						<tr>
							<td>
								<b><?php echo $rienrej ?></b>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo $arejoindre ?><a href="index.php?page=groupes"><input type="button" name="rejoindreGroupe" value="<?php echo $ssmenu2 ?>"></a>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo $oucreationgroupe ?> <a href="index.php?page=creationgroupe"><input type="button" name="creerGroupe" value="<?php echo $ssmenu1 ?>"></a>
							</td>
						</tr>
					<?php } ?>

					<?php foreach ($groupesAdmin as list($nomMesGroupeAdmin, $nbrEvenements)) { ?>
							<tr>
								<td>
									<?php $afficherImageSport = $groupe->afficherImage($nomMesGroupeAdmin)->fetch(); ?>
									<img src="imageSports/<?php echo $afficherImageSport['s_image']; ?>"/>
								</td>
								<td>
									<a href="index.php?page=groupe&nom=<?php echo $nomMesGroupeAdmin?>"> <?php echo $nomMesGroupeAdmin?> </a>
								</td>
								<td>
									<?php echo $nbrEvenements.$evecours ?>
								</td>
								<td>
									<a href="#" onclick="if (confirm('<?php echo $sursupgr.addslashes($nomMesGroupeAdmin) ?> ?')) window.location='index.php?page=suppressiongroupe&nom=<?php echo addslashes($nomMesGroupeAdmin) ?>'; return false"> <input name="Supprimer" type="button" value="<?php echo $sugr ?>"> </a>
								</td>
							</tr>

					<?php } ?>
					<?php foreach ($groupes as list($nomMesGroupe, $nbrEvenements)) { ?>
						<tr>
							<td>
								<?php $afficherImageSport = $groupe->afficherImage($nomMesGroupe)->fetch(); ?>
								<img src="imageSports/<?php echo $afficherImageSport['s_image']; ?>"/>
							</td>
							<td>
								<a href="index.php?page=groupe&nom=<?php echo $nomMesGroupe?>"> <?php echo $nomMesGroupe?> </a>
							</td>
							<td>
								<?php echo $nbrEvenements.$evecours ?>
							</td>
							<td>
								<a href="#" onclick="if (confirm('<?php echo $surquitgr.addslashes($nomMesGroupe) ?> ?')) window.location='index.php?page=quittergroupe&nom=<?php echo addslashes($nomMesGroupe) ?>'; return false"> <input name="quitter" type="submit" value="Quitter le groupe"> </a>
							</td>
						</tr>
					<?php } ?>
				</table>

			</div>
  </body>
