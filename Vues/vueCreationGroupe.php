<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueCreationGroupe;?>
		<div class="formulaireVueCreationGroupe" >
			<h2> <?php echo $groupnouv ?></h2>
			<form name = "formulaireNouveauGroupe" method="post" action = "">
				<table>
					<tr>
						<td>
							<input type="text" name="nomGroupe" placeholder="<?php echo $formgroup1 ?>" size="25" value = "<?= $_POST['nomGroupe'] ?>"/>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $formgroup2 ?>: <input type="number" name="placesLibres" placeholder="<?php echo $formgroup2 ?>" size="25"  min="2" max="100" value = "<?= $_POST['placesLibres'] ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<select name="sport">
			          <option value=""> -- <?php echo $formgroup3 ?> -- </option>
								<?php foreach ($sports as list($nomSports)) { ?>
									<option value = "<?php echo $nomSports?>" <?php if ($_POST['sport']== $nomSports){?> selected <?php }?>> <?php echo $nomSports?> </option>
								<?php } ?>
			        </select>
						</td>
					</tr>
					<tr>
						<td>
							<select name="departement" required>
								<option value=""> -- <?php echo $formgroup4 ?> -- </option>
								<?php foreach ($departements as list($nom)): ?>
									<option value="<?php echo $nom ?>" <?php if ($_POST['departement']== $nom){?> selected <?php }?>> <?php echo $nom ?> </option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="Description"> <?php echo $formgroup5 ?>:</label><br />
						</td>
					</tr>
					<tr>
						<td>
							 <textarea name="Description" cols="50" rows="3" > <?php echo $_POST['Description'] ?> </textarea>
						</td>
					</tr>
					<tr>
						<td>
							<input name="creer" type="submit" value="<?php echo $Cree ?>">
						</td>
					</tr>
				</table>
			</form>
		</div>
