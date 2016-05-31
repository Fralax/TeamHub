<?php $this->titre = "Club - Ajout"; ?>

	<body>

		<div class="formulaireAjoutClub">
			<h2>Ajout d'un nouveau club</h2>
			<form name = "formulaireNouveauClub" method="post" action = "" enctype="multipart/form-data" >
				<p> Nom du club : <input type="text" name="nomClub" placeholder="Nom du Club" size="25" value = "<?= $_POST['nomClub'] ?>"/> </p>
        <p> Adresse : <input type="text" name="adresseClub" placeholder="Adresse du Club" size="25" value = "<?= $_POST['adresseClub'] ?>"/> </p>
        <p> CP : <input type="text" name="cpClub" placeholder="Code Postal" size="25" value = "<?= $_POST['cpClub'] ?>"/> </p>
				<p> Numéro de téléphone : <input type="text" name="numeroClub" placeholder="Téléphone" size="25" value = "<?= $_POST['numeroClub'] ?>"/>
				<p> Horaires :</p>
				<p>	Le Lundi  De
		        <select name="hLundiDebut">
		          <option value=""> Heure </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hLundiDebut']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mLundiDebut">
		          <option value=""> Minute </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mLundiDebut']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
						à <select name="hLundiFin">
		          <option value=""> Heure </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hLundiFinClub']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mLundiFin">
		          <option value=""> Minute </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mLundiFinClub']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
				</p>
				<p>	Le Mardi  De
		        <select name="hMardiDebut">
		          <option value=""> Heure </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hMardiDebut']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select> à
		        <select name="mMardiDebut">
		          <option value=""> Minute </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mMardiDebut']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
						à <select name="hMardiFin">
		          <option value=""> Heure </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hMardiFin']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mMardiFin">
		          <option value=""> Minute </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mMardiFin']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
				</p>
				<p>	Le Mercredi  De
		        <select name="hMercrediDebut">
		          <option value=""> Heure </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hMercrediDebut']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select> à
		        <select name="mMercrediDebut">
		          <option value=""> Minute </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mMercrediDebut']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
						à <select name="hMercrediFin">
		          <option value=""> Heure </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hMercrediFin']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mMercrediFin">
		          <option value=""> Minute </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mMercrediFin']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
				</p>
				<p>	Le Jeudi  De
		        <select name="hJeudiDebut">
		          <option value=""> Heure </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hJeudiDebut']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select> à
		        <select name="mJeudiDebut">
		          <option value=""> Minute </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mJeudiDebut']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
						à <select name="hJeudiFin">
		          <option value=""> Heure </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hJeudiFin']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mJeudiFin">
		          <option value=""> Minute </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mJeudiFin']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
				</p>
				<p>	Le Vendredi  De
		        <select name="hVendrediDebut">
		          <option value=""> Heure </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hVendrediDebut']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select> à
		        <select name="mVendrediDebut">
		          <option value=""> Minute </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mVendrediDebut']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
						à <select name="hVendrediFin">
		          <option value=""> Heure </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hVendrediFin']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mVendrediFin">
		          <option value=""> Minute </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mVendrediFin']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
				</p>
				<p>	Le Samedi  De
		        <select name="hSamediDebut">
		          <option value=""> Heure </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hSamediDebut']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select> à
		        <select name="mSamediDebut">
		          <option value=""> Minute </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mSamediDebut']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
						à <select name="hSamediFin">
		          <option value=""> Heure </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hSamediFin']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mSamediFin">
		          <option value=""> Minute </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mSamediFin']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
				</p>
				<p>	Le Dimanche  De
		        <select name="hDimancheDebut">
		          <option value=""> Heure </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hDimancheDebut']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select> à
		        <select name="mDimancheDebut">
		          <option value=""> Minute </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mDimancheDebut']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
						à <select name="hDimancheFin">
		          <option value=""> Heure </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hDimancheFin']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mDimancheFin">
		          <option value=""> Minute </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mDimancheFin']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
				</p>

				<p>	<label for="remarqueHoraire"> Ajoutez une remarque sur les horaires si vous le souhaitez </label><br />
	        <textarea name="remarqueHoraire" > </textarea> </p>
				<!-- <p> Lien : <input type="text" name="lienClub" placeholder="Lien vers le site du club" size="40" value = ""/> </p> -->
				<p> <input type="file" name="photo" /> </p>

				<p> <input name="ajouter" type="submit" value="Ajouter"> </p>
			</form>
		</div>
	</body>
</html>
