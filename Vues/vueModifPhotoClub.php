<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueAjoutClub.css" />
		<title>Inscription</title>
	</head>
	<body>
		<div class="formulaire" >
			<h2>Modifer la photo de <?php echo $caractClub['c_nom']?> </h2>
      <img src="imagesClubs/<?php echo $caractClub['c_image']; ?>"/>
			<form name = "formulaireModifClub" method="post" action = "" enctype="multipart/form-data" >
				<p> <input type="file" name="photo" /> </p>

				<p> <input name="Modifier" type="submit" value="Modifier"> </p>
			</form>
		</div>
	</body>
</html>
