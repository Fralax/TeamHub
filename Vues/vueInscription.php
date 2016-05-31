<?php $this->titre = "Inscription"; ?>

<body>
		<div class="inscriptionVueInscription">
			<h2>Inscrivez vous, c'est gratuit !</h2>

			<br></br>

			<form  name = "formulaireInscription" method="post" action = "">
				<p> Prénom : <input type="text" name="Prenom" placeholder="Prénom" size="25" value = "<?= $_POST['Prenom'] ?>"/>
						Nom : <input type="text" name="nom" placeholder="Nom" size="25" value = "<?= $_POST['nom'] ?>"/> </p>

	      <p> Sexe : <input type="radio" name="Sexe" value = "Homme" <?php if ($_POST['Sexe']=="Homme"){?> checked <?php }?>/> <label for="H">Homme</label>
	      <input type="radio" name="Sexe" value = "Femme" <?php if ($_POST['Sexe']=="Femme"){?> checked <?php }?>/> <label for="F">Femme</label> </p>

				<p>Date de naissance

					<select name="jour">
						<option value=""> Jour </option>
	        	<?php for ($jour = 1 ; $jour <= 31 ; $jour++){ ?>
	        	<option value = "<?php echo $jour ?>" <?php if ($_POST['jour']=="$jour"){?> selected <?php }?> > <?php echo $jour; ?> </option>
						<?php } ?>
					</select>

					<select name="mois">
						<option value=""> Mois </option>
	        	<?php for ($mois = 1 ; $mois <= 12 ; $mois++){ ?>
	          <option value= "<?php echo $mois ?>" <?php if ($_POST['mois']=="$mois"){?> selected <?php }?> > <?php echo $mois; ?> </option>
						<?php } ?>
					</select>

					<select name="annee">
	          <option value=""> Année </option>
	        	<?php for ($annee = 2016 ; $annee >= 1900 ; $annee--){ ?>
	          <option value="<?php echo $annee ?>" <?php if ($_POST['annee']=="$annee"){?> selected <?php }?> > <?php echo $annee; ?> </option>
						<?php } ?>
					</select>
				</p>

				<p> Téléphone Portable : <input type="tel" name="Portable" placeholder="Téléphone Portable" size="25" value = "<?= $_POST['Portable'] ?>" /> </p>

				<p> Email : <input type="email" name="Email" placeholder="Email" size="25" value = "<?= $_POST['Email'] ?>"/>
						Confirmez votre Email : <input type="email" name="ConfirmEmail" placeholder="Confirmation Email" size="25" value = "<? if ($_POST['Email'] == $_POST['ConfirmEmail']){echo $_POST['Email'];} ?>"/>
				</p>
				<p> Code Postal : <input type="text" name="cp" placeholder="Code Postal" size="25" value = "<?= $_POST['cp'] ?>"/>
				<p> Pseudo : <input type="text" name="pseudo" placeholder="Pseudo" size="25" value = "<?= $_POST['pseudo'] ?>"/> </p>
				<p> Mot de Passe : <input type="password" name="MotDePasse" placeholder="Mot De Passe" size="25" value = "<? if ($_POST['MotDePasse'] == $_POST['ConfirmMotDePasse']){echo $_POST['MotDePasse'];} ?>"/>
						Confirmez votre Mot de Passe : <input type="password" name="ConfirmMotDePasse" placeholder="Confirmation Mot De Passe" size="25" value = "<? if ($_POST['MotDePasse'] == $_POST['ConfirmMotDePasse']){echo $_POST['ConfirmMotDePasse'];} ?>"/>
				</p>
				<br></br>
				<p> <input name="Envoyer" type="submit" value="Envoyer"> </p>
			</form>
		</div>

	</body>
</html>
