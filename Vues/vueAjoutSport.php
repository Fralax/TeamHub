<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueAjoutSport.css" />
		<title> </title>
	</head>
	<body>

		<div class="conteneur">
			<h2>Ajouter un sport que vous pratiquez : </h2>
			<form method="post" action="">
	      <p>
	        <select name="sport">
	          <option value="0"> -- Sélectionnez un sport -- </option>
						<?php foreach ($sports as list($nomSports)) { ?>
							<option value = "<?php echo $nomSports?>" > <?php echo $nomSports?> </option>
						<?php } ?>
	        </select>
	      </p>
	      <p> <input type="submit" name="Ajouter" value="Ajouter"> </p>
	    </form>
		</div>

  </body>
</html>
