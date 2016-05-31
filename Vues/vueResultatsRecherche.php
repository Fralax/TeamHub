<?php $this->titre = "Recherche"; ?>

	<body>
		<div class="resultatsRechercheVueResultatsRecherche">
			<div class="conteneurResultatsRechercheVueResultatsRecherche">
				<?php $groupe = new groupes() ?>
				<h2><?php echo"Résultats pour la recherche : ".$_GET['resultatsrecherche'] ?></h2>
				<div class="resultatsResultatsRechercheVueResultatsRecherche">
					<div class="resultatGroupesResultatsRechercheVueResultatsRecherche">
						<table>
							<caption> <h3>GROUPES</h3> </caption>
							<?php if ($groupes == array()){ ?>
								<tr>
									<td>
										Aucun Groupe n'a été trouvé !
									</td>
								</tr>
							<?php } else{ ?>
							<?php foreach ($groupes as list($nom, $admin, $placesLibres)){ ?>
							<tr>
								<td>
									<?php $afficherImageSport = $groupe->afficherImage($nom)->fetch(); ?>
									<img src="imageSports/<?php echo $afficherImageSport['s_image']; ?>"/>
								</td>
								<td>
									<a href="index.php?page=groupe&nom=<?php echo $nom?>"> <?php echo $nom?> </a>
								</td>
								<td>
									<?php
									if($placesLibres > 1){
										echo $placesLibres." places restantes";
									} else {
										echo $placesLibres. " place restante";
									}
									?>
								</td>
								<?php if (isset($_SESSION['pseudo'])) { ?>
								<td>
									<?php if($placesLibres != 0){ ?>
									<a href="#" onclick="if (confirm('Voulez vraiment rejoindre le groupe : <?php echo addslashes($nom) ?> ?')) window.location='index.php?page=confirmationgroupe&nom=<?php echo addslashes($nom) ?>'; return false"> <input name="Rejoindre" type="button" value="Rejoindre le groupe"> </a>
									<?php }
										else{
											$g=0;
											if ($groupesAttend == array()) {
												$g=2;
											}
											foreach ($groupesAttend as list($nomGroupeAttend)) {
												if ($nomGroupeAttend == $nom) { ?>
									<a href="#" onclick="if (confirm('Voulez vous vraiment ne plus rejoindre automatiquement le groupe <?php echo addslashes($nom) ?> ?')) window.location='index.php?page=annulationnotifgroupe&nom=<?php echo addslashes($nom) ?>&pseudo=<?php echo $_SESSION['pseudo'] ?>'; return false"> <input name="nePlusNotifier" type="button" value="Ne plus Rejoindre"> </a>
									<?php
													$g=1;
													break;
												} else{
													$g=2;
												}
											}
									?>
									<?php if($g == 2){ ?>
										<a href="#" onclick="if (confirm('Voulez vous vraiment rejoindre le groupe <?php echo addslashes($nom) ?> quand une place se libère ?')) window.location='index.php?page=confirmationnotifgroupe&nom=<?php echo addslashes($nom) ?>&pseudo=<?php echo $_SESSION['pseudo'] ?>'; return false"> <input name="notifier" type="button" value="Rejoindre Automatiquement"> </a>
									<?php } ?>
								<?php } ?>
								</td>
								<?php } ?>
							</tr>
							<?php } ?>
						<?php } ?>
						</table>
					</div>
					<div class="resultatMembresResultatsRechercheVueResultatsRecherche">
						<table>
							<caption> <h3>MEMBRES</h3> </caption>
							<?php if ($membres == array()){ ?>
								<tr>
									<td>
										Aucun Membre n'a été trouvé !
									</td>
								</tr>
							<?php } else{ ?>
							<?php foreach ($membres as list($nom, $photo)){ ?>
								<tr>
									<td>
										<img src="imagesUtilisateurs/<?php echo $photo?>"/>
									</td>
									<td>
										<a href="index.php?page=profil&nom=<?php echo $nom?>"> <?php echo $nom?> </a>
									</td>
								</tr>
								<?php } ?>
							<?php } ?>
						</table>
					</div>
					<div class="resultatClubsResultatsRechercheVueResultatsRecherche">
						<table>
							<caption> <h3>CLUBS</h3> </caption>
							<?php if ($clubs == array()){ ?>
								<tr>
									<td>
										Aucun Club n'a été trouvé !
									</td>
								</tr>

							<?php } else{ ?>
							<?php foreach ($clubs as list($nom)){ ?>
								<tr>
									<td>
										<a href="index.php?page=club&nom=<?php echo $nom?>"> <?php echo $nom?> </a>
									</td>
								</tr>
								<?php } ?>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div>
  </body>
