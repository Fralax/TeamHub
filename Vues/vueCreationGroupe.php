<?php $this->titre = "Groupe - Création";
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>
	<body>
		<div class="formulaireVueCreationGroupe" >
			<h2> <?php echo $groupnouv ?></h2>
			<form name = "formulaireNouveauGroupe" method="post" action = "">
				<p> <?php echo $formgroup1 ?>: <input type="text" name="nomGroupe" placeholder=<?php echo $formgroup1 ?> size="25" value = "<?= $_POST['nomGroupe'] ?>"/> </p>
			  <p> <?php echo $formgroup2 ?>: <input type="number" name="placesLibres" placeholder=<?php echo $formgroup2 ?> size="25"  min="2" max="100" value = "<?= $_POST['placesLibres'] ?>" /> </p>
				<p>
	        <select name="sport">
	          <option value=""> -- <?php echo $formgroup3 ?> -- </option>
						<?php foreach ($sports as list($nomSports)) { ?>
							<option value = "<?php echo $nomSports?>" <?php if ($_POST['sport']== $nomSports){?> selected <?php }?>> <?php echo $nomSports?> </option>
						<?php } ?>
	        </select>
	      </p>

	      <p>
					<select name="departement" required>
						<option value=""> -- <?php echo $formgroup4 ?> -- </option>
						<?php foreach ($departements as list($nom)): ?>
							<option value="<?php echo $nom ?>" <?php if ($_POST['departement']== $nom){?> selected <?php }?>> <?php echo $nom ?> </option>
						<?php endforeach; ?>
					</select>
				</p>
				<p>
	       <label for="Description"> <?php echo $formgroup5 ?>:</label><br />
	       <textarea name="Description" cols="50" rows="3" > <?php echo $_POST['Description'] ?> </textarea>
	     </p>

				<p> <input name="creer" type="submit" value="Créer"> </p>
			</form>
		</div>
	</body>
