<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Mes Infos</title>
	</head>
	<body>

		<div id = "Mes infos"> <h2>Mes Infos</h2>
			<p> Nom : <?php echo $infos[u_nom]?> </p>
      <p> Prénom : <?php echo $infos[u_prenom]?> </p>
      <p> Sexe : <?php echo $infos[u_sexe]?> </p>
      <p> Date de Naissance : <?php echo $infos[u_naissance]?> </p>
		</div>
		<div id="Mes coordonnées"> <h2> Mes Coordonnées <a href = "index.php?page=modifmescoordonnees"> <input name="Modifier" type="button" value="Modifier"> </a> </h2>
      <p> Téléphone Portable : <?php echo $infos[u_portable]?> </p>
      <p> Email : <?php echo $infos[u_email]?> </p>
		</div>
		<div id="Adresse"> <h2> Mon Adresse <a href = "index.php?page=modifmonadresse"> <input name="Modifier" type="button" value="Modifier"></a> </h2>
      <p> Adresse : <?php echo $infos[u_adresse]?> </p>
      <p> Code Postal : <?php echo $infos[u_cp]?> </p>
      <p> Ville : <?php echo $infos[u_ville]?> </p>
      <p> Département : <?php echo $infos[u_region]?> </p
		</div>
		<div id="MdP"> <h2> Mot de Passe <a href = "index.php?page=modifmonmdp"> <input name="Modifier" type="button" value="Modifier"></a> </h2>

		</div>
  </body>
</html>
