<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueMesInfos.css" />
		<title>Mes Infos</title>
	</head>
	<body>
		<div class="conteneur">
			<p> <img src="imagesUtilisateurs/<?php echo $infos[u_photo]?>"/>
				<form name = "formulaireNouvellePhoto" method="post" action = "" enctype="multipart/form-data">
					<input type="file" name="photo" />
					<input class="modifierPhoto" name="modifier" type="submit" value="Modifier la photo de Profil">
				</form >
			<h2>Mes Infos</h2>
			<div class = "Mesinfos">
				<p> Prénom : <?php echo $infos[u_prenom]?> </p>
	      <p> Nom : <?php echo $infos[u_nom]?>  </p>
	      <p> Sexe : <?php echo $infos[u_sexe]?> </p>
	      <p> Date de Naissance : <?php echo $infos[u_naissance]?> </p>
			</div>
			<h2> Mes Coordonnées <a href = "index.php?page=modifmescoordonnees"> <input name="Modifier" type="button" value="Modifier"> </a> </h2>
			<div class="Mescoordonnees">
	      <p> Téléphone Portable : <?php echo $infos[u_portable]?> </p>
	      <p> Email : <?php echo $infos[u_email]?> </p>
			</div>
			<h2> Mon Adresse <a href = "index.php?page=modifmonadresse"> <input name="Modifier" type="button" value="Modifier"></a> </h2>
			<div class="Adresse">
	      <p> Adresse : <?php echo $infos[u_adresse]?> </p>
	      <p> Code Postal : <?php echo $infos[u_cp]?> </p>
	      <p> Ville : <?php echo $infos[u_ville]?> </p>
	      <p> Département : <?php echo $infos[u_region]?> </p>
			</div>
			<h2> Mes Sports <a href = "index.php?page=ajoutsport"> <input name="Ajouter" type="button" value="Ajouter un sport"></a> </h2>
			<div class="Messports">
				<table>
					<?php foreach ($sports as list($sport)){?>
						<tr>
							<td> - <?php echo $sport ?> <a href="#" onclick="if (confirm('Voulez vous vraiment supprimer ce sport : <?php echo $sport ?> ?')) window.location='index.php?page=suppressionsport&sport=<?php echo $sport ?>'; return false"> <input name="Supprimer" type="button" value="Supprimer"></a> </td>
						</tr>
					<?php } ?>
				</table>
			</div>
			<h2> Mot de Passe <a href = "index.php?page=modifmonmdp"> <input name="Modifier" type="button" value="Modifier"></a> </h2>
			<div class="MdP">
			</div>
		</div>
  </body>
</html>
