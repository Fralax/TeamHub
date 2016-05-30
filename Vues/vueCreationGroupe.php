<?php $this->titre = "Groupe - Création"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueCreationGroupe.css" />
		<title>Inscription</title>
	</head>
	<body>
		<div class="formulaire" >
			<h2>Création d'un nouveau groupe</h2>
			<form name = "formulaireNouveauGroupe" method="post" action = "">
				<p> Nom du groupe : <input type="text" name="nomGroupe" placeholder="Nom du Groupe" size="25" value = "<?= $_POST['nomGroupe'] ?>"/> </p>
			  <p> Nombre de places totales : <input type="number" name="placesLibres" placeholder="Nombre de places" size="25"  min="2" max="100" value = "<?= $_POST['placesLibres'] ?>" /> </p>
				<p>
	        <select name="sport">
	          <option value=""> -- Sélectionnez un sport -- </option>
						<?php foreach ($sports as list($nomSports)) { ?>
							<option value = "<?php echo $nomSports?>" <?php if ($_POST['sport']== $nomSports){?> selected <?php }?>> <?php echo $nomSports?> </option>
						<?php } ?>
	        </select>
	      </p>

	      <p>
					<select name="departement" required>
						<option value=""> -- Sélectionner votre Département -- </option>
						<?php foreach ($departements as list($nom)): ?>
							<option value="<?php echo $nom ?>" <?php if ($_POST['departement']== $nom){?> selected <?php }?>> <?php echo $nom ?> </option>
						<?php endforeach; ?>
					</select>
				</p>
				<p>
	       <label for="Description"> Ecrivez une description pour votre groupe :</label><br />
	       <textarea name="Description" cols="50" rows="3" > <?php echo $_POST['Description'] ?> </textarea>
	     </p>

				<p> <input name="creer" type="submit" value="Créer"> </p>
			</form>
		</div>
	</body>
</html>
