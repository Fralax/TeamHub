<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Mes Infos</title>
	</head>
	<body>

		<h2>Mes Infos</h2>
			<p> Nom : <?php echo $infos[u_nom]?>
        <a href="index.php?page=mesinfos&nom=<?php echo $infos[u_nom]?>"> <input name="Modifier" type="button" value="Modifier"> </a> </p>
      <p> Prénom : <?php echo $infos[u_prenom]?> <input name="Modifier" type="button" value="Modifier"> </p>
      <p> Sexe : <?php echo $infos[u_sexe]?> <input name="Modifier" type="button" value="Modifier"> </p>
      <p> Date de Naissance : <?php echo $infos[u_naissance]?> <input name="Modifier" type="button" value="Modifier"> </p>
      <p> Téléphone Portable : <?php echo $infos[u_portable]?> <input name="Modifier" type="button" value="Modifier"> </p>
      <p> Email : <?php echo $infos[u_email]?> <input name="Modifier" type="button" value="Modifier"> </p>
      <p> Adresse : <?php echo $infos[u_adresse]?> <input name="Modifier" type="button" value="Modifier"> </p>
      <p> Code Postal : <?php echo $infos[u_cp]?> <input name="Modifier" type="button" value="Modifier"> </p>
      <p> Ville : <?php echo $infos[u_ville]?> <input name="Modifier" type="button" value="Modifier"> </p>
      <p> Département : <?php echo $infos[u_region]?> <input name="Modifier" type="button" value="Modifier"> </p>

  </body>
</html>
