<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueCreationEvenements;?>

		<div class="creationEvenementVueEvenement">
			<h2> <?php echo $eventnouv ?></h2>

			<form name = "formulaireNouvelEvenement" method="post" action = "">
				<table>
					<tr>
						<td>
							<input type="text" name="nomEvenement" placeholder="<?php echo $formevent1 ?>" size="25" value = "<?= $_POST['nomEvenement'] ?>"/>
						</td>
					</tr>
					<tr>
						<td>
							<input type="number" placeholder="<?php echo $formevent7 ?>" name="nbrPlaces" value="<?= $_POST['nbrPlaces'] ?>">
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $formevent2 ?>:
						</td>
					</tr>
					<tr>
						<td>
							<select name="jour">
			          <option value=""> <?php echo $formevent3 ?> </option>
			          <?php for ($jour = 1 ; $jour <= 31 ; $jour++){ ?>
			          <option value = "<?php echo $jour ?>" <?php if ($_POST['jour']=="$jour"){?> selected <?php }?> > <?php echo $jour; ?> </option>
			          <?php } ?>
			        </select>

			        <select name="mois">
			          <option value=""> <?php echo $formevent4 ?> </option>
			          <?php for ($mois = 1 ; $mois <= 12 ; $mois++){ ?>
			          <option value= "<?php echo $mois ?>" <?php if ($_POST['mois']=="$mois"){?> selected <?php }?> > <?php echo $mois; ?> </option>
			          <?php } ?>
			        </select>

			        <select name="annee">
			          <option value=""> <?php echo $formevent5 ?> </option>
			          <?php for ($annee = 2016 ; $annee <= 2020 ; $annee++){ ?>
			          <option value="<?php echo $annee ?>" <?php if ($_POST['annee']=="$annee"){?> selected <?php }?> > <?php echo $annee; ?> </option>
			          <?php } ?>
			        </select>
						</td>
					</tr>
					<tr>
						<td>
							<select name="heure">
			          <option value=""> <?php echo $formclub15 ?> </option>
			          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
			          <option value = "<?php echo $heure ?>" <?php if ($_POST['heure']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
			          <?php } ?>
			        </select>

			        <select name="minute">
			          <option value=""> <?php echo $formclub16 ?> </option>
			          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+5){ ?>
			          <option value= "<?php echo $minute ?>" <?php if ($_POST['minute']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
			          <?php } ?>
			        </select>
						</td>
					</tr>
					<tr>
						<td>
							<select name="club">
								<option value=""> -- <?php echo $formclub1 ?> -- </option>
								<?php foreach ($clubs as list($nom)) { ?>
								<option value = "<?php echo $nom ?>" <?php if ($_POST['club']== $nom){?> selected <?php }?>> <?php echo $nom ?> </option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $formevent9 ?>
						</td>
					</tr>
					<tr>
						<td>
							<a href="index.php?page=ajoutclub"> <?php echo $ajnvclub ?> </a>
						</td>
					</tr>
					<tr>
						<td>
							<input name="Créer" type="submit" value="<?php echo $Cree ?>">
						</td>
					</tr>
				</table>
			</form>
		</div>
