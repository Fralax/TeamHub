<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueInscription;?>

		<div class="inscriptionVueInscription">
			<h2><?php echo $gratuit ?></h2>
			<table>
				<form name = "formulaireInscription" method="post" action = "">
					<tr>
						<td> <img src="Autres/avatar.png"> </td>
					  <td> <input type="text" name="Prenom" placeholder="<?php echo $forminsc1 ?>" size="25" value = "<?= $_POST['Prenom'] ?>"/>
							<input type="text" name="nom" placeholder="<?php echo $forminsc2 ?>" size="25" value = "<?= $_POST['nom'] ?>"/> </td>
					</tr>
					<tr>
						<td> <img src="Autres/intersex.png"> </td>
			      <td> <input type="radio" name="Sexe" value = "Homme" <?php if ($_POST['Sexe']=="Homme"){?> checked <?php }?>/> <label for="H">Homme</label>
			      <input type="radio" name="Sexe" value = "Femme" <?php if ($_POST['Sexe']=="Femme"){?> checked <?php }?>/> <label for="F">Femme</label> </td>
					</tr>
					<tr>
						<td> <img src="Autres/birthday-cake.png"> </td>
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
			        	<?php for ($annee = 2016 ; $annee >= 1900 ; $annee--){ ?>
			          <option value="<?php echo $annee ?>" <?php if ($_POST['annee']=="$annee"){?> selected <?php }?> > <?php echo $annee; ?> </option>
								<?php } ?>
							</select>
						</td>
					</tr>

					<tr>
						<td> <img src="Autres/phone-receiver.png"></td>
						<td> <input type="tel" name="Portable" placeholder="<?php echo $formclub4 ?>" size="25" value = "<?= $_POST['Portable'] ?>" /> </td>
					</tr>

					<tr>
						<td> <img src="Autres/opened-email-envelope.png"></td>
						<td> <input type="email" name="Email" placeholder="<?php echo $forminsc5 ?>" size="25" value = "<?= $_POST['Email'] ?>"/>
						<input type="email" name="ConfirmEmail" placeholder="<?php echo $forminsc6 ?>" size="25" value = "<? if ($_POST['Email'] == $_POST['ConfirmEmail']){echo $_POST['Email'];} ?>"/> </td>
					</tr>
					<tr>
					<td> <img src="Autres/house-mailbox.png"></td>
					<td> <input type="text" name="cp" placeholder="<?php echo $formclub3 ?>" size="25" value = "<?= $_POST['cp'] ?>"/> </td>
					</tr>
					<tr>
					<td> <img src="Autres/avatar.png"></td>
					<td> <input type="text" name="pseudo" placeholder="<?php echo $forminsc7 ?>" size="25" value = "<?= $_POST['pseudo'] ?>"/> </td>
					</tr>
					<tr>
					<td> <img src="Autres/open-lock.png"></td>
					<td> <input type="password" name="MotDePasse" placeholder="<?php echo $forminsc8 ?>" size="25" value = "<? if ($_POST['MotDePasse'] == $_POST['ConfirmMotDePasse']){echo $_POST['MotDePasse'];} ?>"/>
							<input type="password" name="ConfirmMotDePasse" placeholder="<?php echo $forminsc9 ?>" size="25" value = "<? if ($_POST['MotDePasse'] == $_POST['ConfirmMotDePasse']){echo $_POST['ConfirmMotDePasse'];} ?>"/>
					</td>
					</tr>
					<tr>
						<td>
							<input type="checkbox" name="cgu" value="cgu">
						</td>
						<td>
							<?php echo $cgu ?>
						</td>
					</tr>
			</table>
			<input name="Envoyer" type="submit" value="<?php echo $env ?>">
			</form>

		</div>
