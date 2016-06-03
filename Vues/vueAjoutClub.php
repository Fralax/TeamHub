<?php $this->titre = "Club - Ajout";
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}?>

	<body>

		<div class="formulaireAjoutClub">
			<h2> <?php echo $ajoclub ?></h2>
			<form name = "formulaireNouveauClub" method="post" action = "" enctype="multipart/form-data" >
				<p>  <?php echo $formclub1 ?> : <input type="text" name="nomClub" placeholder="<?php echo $formclub1 ?>" size="25" value = "<?= $_POST['nomClub'] ?>"/> </p>
        <p>  <?php echo $formclub2 ?> : <input type="text" name="adresseClub" placeholder="<?php echo $formclub2 ?>" size="25" value = "<?= $_POST['adresseClub'] ?>"/> </p>
        <p>  <?php echo $formclub3 ?> : <input type="text" name="cpClub" placeholder="<?php echo $formclub3 ?>" size="25" value = "<?= $_POST['cpClub'] ?>"/> </p>
				<p>  <?php echo $formclub4 ?> : <input type="text" name="numeroClub" placeholder="<?php echo $formclub4 ?>" size="25" value = "<?= $_POST['numeroClub'] ?>"/>
				<p>  <?php echo $formclub5 ?> :</p>
				<p>	<?php echo $formclub8.$formclub7 ?>
		        <select name="hLundiDebut">
		          <option value=""> <?php echo $formclub15 ?> </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hLundiDebut']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mLundiDebut">
		          <option value=""> <?php echo $formclub16 ?> </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mLundiDebut']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
						<?php echo $formclub18 ?> <select name="hLundiFin">
		          <option value=""> <?php echo $formclub15 ?> </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hLundiFinClub']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mLundiFin">
		          <option value=""> <?php echo $formclub16 ?> </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mLundiFinClub']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
				</p>
				<p>	<?php echo $formclub9.$formclub7 ?>
		        <select name="hMardiDebut">
		          <option value=""> <?php echo $formclub15 ?> </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hMardiDebut']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mMardiDebut">
		          <option value=""> <?php echo $formclub16 ?> </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mMardiDebut']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
						<?php echo $formclub18 ?> <select name="hMardiFin">
		          <option value=""> <?php echo $formclub15 ?> </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hMardiFin']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mMardiFin">
		          <option value=""> <?php echo $formclub16 ?> </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mMardiFin']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
				</p>
				<p>	<?php echo $formclub10.$formclub7 ?>
		        <select name="hMercrediDebut">
		          <option value=""> <?php echo $formclub15 ?> </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hMercrediDebut']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mMercrediDebut">
		          <option value=""> <?php echo $formclub16 ?> </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mMercrediDebut']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
						<?php echo $formclub18 ?> <select name="hMercrediFin">
		          <option value=""> <?php echo $formclub15 ?> </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hMercrediFin']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mMercrediFin">
		          <option value=""> <?php echo $formclub16 ?> </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mMercrediFin']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
				</p>
				<p>	<?php echo $formclub11.$formclub7 ?>
		        <select name="hJeudiDebut">
		          <option value=""> <?php echo $formclub15 ?> </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hJeudiDebut']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mJeudiDebut">
		          <option value=""> <?php echo $formclub16 ?> </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mJeudiDebut']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
						<?php echo $formclub18 ?> <select name="hJeudiFin">
		          <option value=""> <?php echo $formclub15 ?> </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hJeudiFin']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mJeudiFin">
		          <option value=""> <?php echo $formclub16 ?> </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mJeudiFin']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
				</p>
				<p>	<?php echo $formclub12.$formclub7 ?>
		        <select name="hVendrediDebut">
		          <option value=""> <?php echo $formclub15 ?> </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hVendrediDebut']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mVendrediDebut">
		          <option value=""> <?php echo $formclub16 ?> </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mVendrediDebut']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
						<?php echo $formclub18 ?> <select name="hVendrediFin">
		          <option value=""> <?php echo $formclub15 ?> </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hVendrediFin']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mVendrediFin">
		          <option value=""> <?php echo $formclub16 ?> </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mVendrediFin']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
				</p>
				<p>	<?php echo $formclub13.$formclub7 ?>
		        <select name="hSamediDebut">
		          <option value=""> <?php echo $formclub15 ?> </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hSamediDebut']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mSamediDebut">
		          <option value=""> <?php echo $formclub16 ?> </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mSamediDebut']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
						<?php echo $formclub18 ?> <select name="hSamediFin">
		          <option value=""> <?php echo $formclub15 ?> </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hSamediFin']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mSamediFin">
		          <option value=""> <?php echo $formclub16 ?> </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mSamediFin']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
				</p>
				<p>	<?php echo $formclub14.$formclub7 ?>
		        <select name="hDimancheDebut">
		          <option value=""> <?php echo $formclub15 ?> </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hDimancheDebut']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mDimancheDebut">
		          <option value=""> <?php echo $formclub16 ?> </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mDimancheDebut']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
						<?php echo $formclub18 ?> <select name="hDimancheFin">
		          <option value=""> <?php echo $formclub15 ?> </option>
		          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
		          <option value = "<?php echo $heure ?>" <?php if ($_POST['hDimancheFin']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
		          <?php } ?>
		        </select>
		        <select name="mDimancheFin">
		          <option value=""> <?php echo $formclub16 ?> </option>
		          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+10){ ?>
		          <option value= "<?php echo $minute ?>" <?php if ($_POST['mDimancheFin']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
		          <?php } ?>
		        </select>
				</p>

				<p>	<label for="remarqueHoraire"> <?php echo $formclub17 ?> </label><br />
	        <textarea name="remarqueHoraire" > </textarea> </p>
				<!-- <p> Lien : <input type="text" name="lienClub" placeholder="Lien vers le site du club" size="40" value = ""/> </p> -->
				<p> <input type="file" name="photo" /> </p>

				<p> <input name="ajouter" type="submit" value="<?php echo $ajo ?>"> </p>
			</form>
		</div>
	</body>
</html>
