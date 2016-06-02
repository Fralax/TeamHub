<?php $this->titre = "Profil - ".$_GET['nom'];
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>

<?php
	if(isset($_SESSION['pseudo'])){
		if($_SESSION['pseudo'] == $_GET['nom']){
			$a=1;
		}else{
			$a=2;
		}
	}else{
		$a=3;
	}
	?>

	<body>
		<div class="profilVueProfil">
			<?php if ($a==1) { ?>
				<div class="conteneurVueProfil">
					<div class="infosGeneralesVueProfil">
						<div class="conteneurPseudoVueProfil">
							<div class="pseudoVueProfil">
								<p>
									<?php echo $_GET['nom'] ?>
								</p>
							</div>
						</div>
						<div class="maPhotoVueProfil">
							<form name = "formulaireNouvellePhoto" method="post" action = "" enctype="multipart/form-data">
								<a href="#form5"><label for="fichier"><img src="imagesUtilisateurs/<?php echo $infos[u_photo]?>"/></label></a>
								<div id = "form5" class="formsProfil">
									<p><input type="file" id="fichier" name="photo"/> </p>
									<p><input id class="modifierPhoto" name="modifier" type="submit" value="Modifier la photo de Profil"></p>
								</div>
							</form >
						</div>
						<div class="mesSportsVueProfil">
							<h2><?php echo $spor ?></h2>
							<table>
								<?php foreach ($sports as list($sport)){?>
									<tr>
										<td> <?php echo $sport ?> </td>
										<td>
											<a href="#" onclick="if (confirm('<?php echo $sursuppsport.addslashes($sport) ?> ?')) window.location='index.php?page=suppressionsport&sport=<?php echo addslashes($sport) ?>'; return false"> <input name="Supprimer" type="button" value="Supprimer"></a>
										</td>
									</tr>
								<?php } ?>
							</table>
							<div class="ajoutSportVueProfil">
								<a href="#form1"><?php echo $ajspor ?></a>
								<div id = "form1" class="formsProfil">
									<form method="post" action="">
										<p>
											<select name="sport">
												<option value="0"> -- <?php echo $formgroup3 ?> -- </option>
												<?php foreach ($sportsNonPratiques as list($nomSports)) { ?>
													<option value = "<?php echo $nomSports?>" > <?php echo $nomSports?> </option>
												<?php } ?>
											</select>
										</p>
										<p> <input type="submit" name="Ajouter" value="Ajouter"> </p>
									</form>
								</div>
							</div>
						</div>
					</div>

					<div class="mesInfosVueProfil">
						<div class="GeneralVueProfil">
							<h2><?php echo $infsoi ?></h2>
							<p> <?php echo $forminsc1 ?> : <?php echo $infos[u_prenom]?> </p>
							<p> <?php echo $forminsc2 ?> : <?php echo $infos[u_nom]?>  </p>
							<p> <?php echo $forminsc3 ?> : <?php echo $infos[u_sexe]?> </p>
							<?php $date = date_create($infos[u_naissance]) ?>
							<p> <?php echo $forminsc4 ?> : <?php echo date_format($date, 'd/m/Y')?> </p>
						</div>
						<div class="monAdresseVueProfil">
							<h2> <?php echo $loc ?></h2>
							<p> <?php echo $dep ?><?php echo $infos[u_region]?> </p>
							<p> <?php echo $vill ?> : <?php echo $infos[u_ville]?> </p>
							<p> <?php echo $formclub3 ?> : <?php echo $infos[u_cp]?> </p>
						</div>
						<div class="mesCoordonneesVueProfil">
							<h2><?php echo $coorsoi ?></h2>
							<p> <?php echo $formclub4 ?> : <?php echo $infos[u_portable]?> </p>
				      <p> <?php echo $forminsc5 ?> : <?php echo $infos[u_email]?> </p>
						</div>
						<div class="modifsVueProfil">
							<a href="#form3"><h3><?php echo $mod.$loc ?></h3></a>
							<a href="#form2"><h3><?php echo $mod.$coorsoi ?></h3></a>
							<a href="#form4"><h3><?php echo $mod.$mmdp ?></h3></a>
						</div>
					</div>

					<div class="modifInfosVueProfil">
						<div id = "form2" class="formsProfil">
							<h2><?php echo $mod.$coorsoi ?></h2>
							<form  name = "formulaireModifMesCoordonnees" method="post" action = "">
								<p> <input type="tel" name="Portable" placeholder=<?php echo $formclub4 ?> size="25" value = "<?php echo $infos['u_portable']?>" /> </p>
								<p> <input type="email" name="Email" placeholder=<?php echo $forminsc5 ?> size="25" value = "<?php echo $infos['u_email']?>"/> </p>
								<p> <input type="email" name="ConfirmEmail" placeholder=<?php echo $forminsc6 ?> size="25" value = "<?php echo $infos['u_email']?>"/> </p>
								<p> <input name="envoyerCoordonnees" type="submit" value="Valider"> </p>
							</form>
						</div>
						<div id = "form3" class="formsProfil">
							<h2><?php echo $mod.$loc ?></h2>
							<form  name = "formulaireModifMonAdresse" method="post" action = "">
								<p> <?php echo $modicp ?><input type="text" name="cp" placeholder=<?php echo $formclub3 ?> size="25" value = "<?php echo $infos['u_cp'] ?>"/>
								<p> <input name="envoyerLocalisation" type="submit" value="Valider"> </p>
							</form>
						</div>
						<div id = "form4" class="formsProfil">
							<h2> <?php echo $mofimdp ?></h2>
							<form  name = "formulaireModifMonMdp" method="post" action = "">
								<p> <input type="password" name="AncienMotDePasse" placeholder=<?php echo $anmdp ?>  size="25" value = ""/> </p>
					      <p> <input type="password" name="NouveauMotDePasse" placeholder=<?php echo $nmdp ?> size="25" value = ""/> </p>
								<p> <input type="password" name="ConfirmNouveauMotDePasse" placeholder=<?php echo $confnmdp ?> size="25" value = ""/> </p>
								<p> <input name="modifMdp" type="submit" value="Modifier le Mot de Passe"> </p>
							</form>
						</div>
					</div>
				</div>
	 		<?php } ?>

	 	<?php if ($a == 2): ?>
			<div class="conteneurVueProfil">
				<div class="infosGeneralesVueProfil">
					<div class="conteneurPseudoVueProfil">
						<div class="pseudoVueProfil">
							<p>
								<?php echo $_GET['nom'] ?>
							</p>
						</div>
					</div>
					<div class="maPhotoVueProfil">
						<p> <img src="imagesUtilisateurs/<?php echo $infos[u_photo]?>"/>
					</div>
					<div class="mesSportsVueProfil">
						<h2><?php echo $spormem.$_GET['nom'] ?></h2>
						<table>
							<?php foreach ($sports as list($sport)){?>
								<tr>
									<td> <?php echo $sport ?> </td>
								</tr>
							<?php } ?>
						</table>
					</div>
				</div>

				<div class="conteneur2VueProfil">
					<div class="mesGroupesVueProfil">
						<h2><?php echo $groumem.$_GET['nom'] ?></h2>
						<table>
							<?php foreach ($groupes as list($nomGroupes)){?>
								<tr>
									<td>
										<?php $groupe = new groupes() ?>
										<?php $afficherImageSport = $groupe->afficherImage($nomGroupes)->fetch(); ?>
										<img src="imageSports/<?php echo $afficherImageSport['s_image']; ?>"/>
									</td>
									<td><a href="index.php?page=groupe&nom=<?php echo $nomGroupes ?>"><?php echo $nomGroupes ?></a> </td>
								</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
	 	<?php endif; ?>

		<?php if($a == 3){ ?>
			<?php echo $nonaccesmembre ?>
		<?php } ?>
		</div>
 	</body>

	<script src="http://code.jquery.com/jquery-2.2.3.js" integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4=" crossorigin="anonymous"></script>
	<script language="javascript" type="text/javascript">
		$(function(){
		var divs = $(".formsProfil");
		divs.hide();
		$("a").click(function(){
			if (divs.filter(":visible") == $($(this).attr("href"))) {
				divs.filter(":visible").slideUp();
			} else {
				divs.filter(":visible").slideUp();
				$($(this).attr("href")).slideDown();
			}
			return false;
		});
	});
	</script>
