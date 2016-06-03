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

			<br></br>

			<form  name = "formulaireInscription" method="post" action = "">
				<p> <?php echo $forminsc1 ?><input type="text" name="Prenom" placeholder=<?php echo $forminsc1 ?> size="25" value = "<?= $_POST['Prenom'] ?>"/>
						<?php echo $forminsc2 ?><input type="text" name="nom" placeholder=<?php echo $forminsc2 ?> size="25" value = "<?= $_POST['nom'] ?>"/> </p>

	      <p> <?php echo $forminsc3 ?><input type="radio" name="Sexe" value = "Homme" <?php if ($_POST['Sexe']=="Homme"){?> checked <?php }?>/> <label for="H">Homme</label>
	      <input type="radio" name="Sexe" value = "Femme" <?php if ($_POST['Sexe']=="Femme"){?> checked <?php }?>/> <label for="F">Femme</label> </p>

				<p><?php echo $forminsc4 ?>

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
				</p>

				<p> <?php echo $formclub4 ?><input type="tel" name="Portable" placeholder=<?php echo $formclub4 ?> size="25" value = "<?= $_POST['Portable'] ?>" /> </p>

				<p> <?php echo $forminsc5 ?><input type="email" name="Email" placeholder=<?php echo $forminsc5 ?> size="25" value = "<?= $_POST['Email'] ?>"/>
						<?php echo $forminsc6 ?><input type="email" name="ConfirmEmail" placeholder=<?php echo $forminsc6 ?> size="25" value = "<? if ($_POST['Email'] == $_POST['ConfirmEmail']){echo $_POST['Email'];} ?>"/>
				</p>
				<p> <?php echo $formclub3 ?><input type="text" name="cp" placeholder=<?php echo $formclub3 ?>size="25" value = "<?= $_POST['cp'] ?>"/>
				<p> <?php echo $forminsc7 ?><input type="text" name="pseudo" placeholder=<?php echo $forminsc7 ?> size="25" value = "<?= $_POST['pseudo'] ?>"/> </p>
				<p> <?php echo $forminsc8 ?><input type="password" name="MotDePasse" placeholder=<?php echo $forminsc8 ?> size="25" value = "<? if ($_POST['MotDePasse'] == $_POST['ConfirmMotDePasse']){echo $_POST['MotDePasse'];} ?>"/>
						<?php echo $forminsc9 ?><input type="password" name="ConfirmMotDePasse" placeholder=<?php echo $forminsc9 ?> size="25" value = "<? if ($_POST['MotDePasse'] == $_POST['ConfirmMotDePasse']){echo $_POST['ConfirmMotDePasse'];} ?>"/>
				</p>
				<br></br>
				<p> <input name="Envoyer" type="submit" value="<?php echo $env ?>"> </p>
			</form>
		</div>
