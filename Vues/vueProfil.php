<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueProfil.css" />
		<title>Mes Infos</title>
	</head>

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
	<html>

		<body>

		<?php if ($a==1) { ?>
			<div class="conteneur">
				<div class="infosGenerales">
					<div class="conteneurPseudo">
						<div class="pseudo">
							<p>
								<?php echo $_GET['nom'] ?>
							</p>
						</div>
					</div>
					<div class="maPhoto">
						<form name = "formulaireNouvellePhoto" method="post" action = "" enctype="multipart/form-data">
							<a href="#form5"><label for="fichier"><img src="imagesUtilisateurs/<?php echo $infos[u_photo]?>"/></label></a>
							<div id = "form5" class="forms">
								<p><input type="file" id="fichier" name="photo"/> </p>
								<p><input id class="modifierPhoto" name="modifier" type="submit" value="Modifier la photo de Profil"></p>
							</div>
						</form >
					</div>
					<div class="mesSports">
						<h2>Mes Sports</h2>
						<table>
							<?php foreach ($sports as list($sport)){?>
								<tr>
									<td> <?php echo $sport ?> </td>
									<td>
										<a href="#" onclick="if (confirm('Voulez vous vraiment supprimer ce sport : <?php echo $sport ?> ?')) window.location='index.php?page=suppressionsport&sport=<?php echo $sport ?>'; return false"> <input name="Supprimer" type="button" value="Supprimer"></a>
									</td>
								</tr>
							<?php } ?>
						</table>
						<div class="ajoutSport">
							<a href="#form1">Ajouter un Sport</a>
							<div id = "form1" class="forms">
								<form method="post" action="">
									<p>
										<select name="sport">
											<option value="0"> -- Sélectionnez un sport -- </option>
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

				<div class="mesInfos">
					<div class="General">
						<h2>Mes Infos</h2>
						<p> Prénom : <?php echo $infos[u_prenom]?> </p>
						<p> Nom : <?php echo $infos[u_nom]?>  </p>
						<p> Sexe : <?php echo $infos[u_sexe]?> </p>
						<?php $date = date_create($infos[u_naissance]) ?>
						<p> Date de Naissance : <?php echo date_format($date, 'd/m/Y')?> </p>
					</div>
					<div class="monAdresse">
						<h2> Ma Localisation</h2>
						<p> Département : <?php echo $infos[u_region]?> </p>
						<p> Vile : <?php echo $infos[u_ville]?> </p>
						<p> Code Postal : <?php echo $infos[u_cp]?> </p>
					</div>
					<div class="mesCoordonnees">
						<h2>Mes Coordonnées</h2>
						<p> Téléphone Portable : <?php echo $infos[u_portable]?> </p>
			      <p> Email : <?php echo $infos[u_email]?> </p>
					</div>
					<div class="modifs">
						<a href="#form3"><h3>Modifier ma Localisation</h3></a>
						<a href="#form2"><h3>Modifier mes Coordonnées</h3></a>
						<a href="#form4"><h3>Modifier mon Mot de Passe </h3></a>
					</div>
				</div>

				<div class="modifInfos">
					<div id = "form2" class="forms">
						<h2>Modifier mes Coordonnées</h2>
						<form  name = "formulaireModifMesCoordonnees" method="post" action = "">
							<p> <input type="tel" name="Portable" placeholder="Téléphone Portable" size="25" value = "<?php echo $infos['u_portable']?>" /> </p>
							<p> <input type="email" name="Email" placeholder="Email" size="25" value = "<?php echo $infos['u_email']?>"/> </p>
							<p> <input type="email" name="ConfirmEmail" placeholder="Confirmation Email" size="25" value = "<?php echo $infos['u_email']?>"/> </p>
							<p> <input name="envoyerCoordonnees" type="submit" value="Valider"> </p>
						</form>
					</div>
					<div id = "form3" class="forms">
						<h2>Modifier ma Localisation</h2>
						<form  name = "formulaireModifMonAdresse" method="post" action = "">
							<p> Modifier mon Code Postal : <input type="text" name="cp" placeholder="Code Postal" size="25" value = "<?php echo $infos['u_cp'] ?>"/>
							<p> <input name="envoyerLocalisation" type="submit" value="Valider"> </p>
						</form>
					</div>
					<div id = "form4" class="forms">
						<h2>Modifier mon Mot de Passe</h2>
						<form  name = "formulaireModifMonMdp" method="post" action = "">
							<p> <input type="password" name="AncienMotDePasse" placeholder="Ancien Mot De Passe" size="25" value = ""/> </p>
				      <p> <input type="password" name="NouveauMotDePasse" placeholder="Nouveau Mot De Passe" size="25" value = ""/> </p>
							<p> <input type="password" name="ConfirmNouveauMotDePasse" placeholder="Confirmer Mot De Passe" size="25" value = ""/> </p>
							<p> <input name="modifMdp" type="submit" value="Modifier le Mot de Passe"> </p>
						</form>
					</div>
				</div>
			</div>
 		<?php } ?>

 	<?php if ($a == 2): ?>
		<div class="conteneur">
			<div class="infosGenerales">
				<div class="conteneurPseudo">
					<div class="pseudo">
						<p>
							<?php echo $_GET['nom'] ?>
						</p>
					</div>
				</div>
				<div class="maPhoto">
					<p> <img src="imagesUtilisateurs/<?php echo $infos[u_photo]?>"/>
				</div>
				<div class="mesSports">
					<h2>Les sports de <?php echo $_GET['nom'] ?></h2>
					<table>
						<?php foreach ($sports as list($sport)){?>
							<tr>
								<td> <?php echo $sport ?> </td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
 	<?php endif; ?>

	<?php if($a == 3){ ?>
		Vous n'avez pas accès au profil des membres si vous n'êtes pas connecté !
	<?php } ?>
 	</body>

	<script src="http://code.jquery.com/jquery-2.2.3.js" integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4=" crossorigin="anonymous"></script>
	<script language="javascript" type="text/javascript">
		$(function(){
		var divs = $(".forms");
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

</html>
