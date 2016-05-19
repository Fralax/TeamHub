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
							<label for="fichier"><img src="imagesUtilisateurs/<?php echo $infos[u_photo]?>"/><span>Modifier la photo de Profil</span></label>
							<p><input type="file" id="fichier" name="photo" hidden="hidden"/> </p>
							<p><input id class="modifierPhoto" name="modifier" type="submit" value="Modifier la photo de Profil"></p>
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
					</div>
				</div>

				<div class="mesInfos">
					<div class="General">
						<h2>Mes Infos</h2>
						<p> Prénom : <?php echo $infos[u_prenom]?> </p>
						<p> Nom : <?php echo $infos[u_nom]?>  </p>
						<p> Sexe : <?php echo $infos[u_sexe]?> </p>
						<p> Date de Naissance : <?php echo $infos[u_naissance]?> </p>
					</div>
					<div class="monAdresse">
						<h2> Ma Localisation</h2>
						<p> Département : <?php echo $infos[u_region]?> </p>
					</div>
					<div class="mesCoordonnees">
						<h2>Mes Coordonnées</h2>
						<p> Téléphone Portable : <?php echo $infos[u_portable]?> </p>
			      <p> Email : <?php echo $infos[u_email]?> </p>
					</div>
					<div class="modifs">
						<a href="index.php?page=modifmonadresse"><h3>Modifier ma localisation</h3></a>
						<a href="index.php?page=modifmescoordonnees"><h3>Modifier mes Coordonnées</h3></a>
						<a href="index.php?page=ajoutsport"><h3>Ajouter un Sport</h3></a>
						<a href="index.php?page=modifmonmdp"><h3> Modifier mon Mot de Passe </h3></a>
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

 	</body>
</html>
