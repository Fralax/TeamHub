<?php $this->titre = "Evenement - Création"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueCreationEvenements.css" />
		<title>Inscription</title>
	</head>
	<body>

		<div class="creationEvenement">
			<h2>Création d'un nouvel événement</h2>

			<form name = "formulaireNouvelEvenement" method="post" action = "">

				<p> <input type="text" name="nomEvenement" placeholder="Nom de l'évenement" size="25" value = "<?= $_POST['nomEvenement'] ?>"/> </p>

	      <p>Date de l'événement :

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
	          <?php for ($annee = 2016 ; $annee <= 2020 ; $annee++){ ?>
	          <option value="<?php echo $annee ?>" <?php if ($_POST['annee']=="$annee"){?> selected <?php }?> > <?php echo $annee; ?> </option>
	          <?php } ?>
	        </select>
	      </p>
	      <p>Heure de l'activité

	        <select name="heure">
	          <option value=""> Heure </option>
	          <?php for ($heure = 00 ; $heure <= 23 ; $heure++){ ?>
	          <option value = "<?php echo $heure ?>" <?php if ($_POST['heure']=="$heure"){?> selected <?php }?> > <?php echo $heure; ?> </option>
	          <?php } ?>
	        </select>

	        <select name="minute">
	          <option value=""> Minute </option>
	          <?php for ($minute = 00 ; $minute <= 59 ; $minute=$minute+5){ ?>
	          <option value= "<?php echo $minute ?>" <?php if ($_POST['minute']=="$minute"){?> selected <?php }?> > <?php echo $minute; ?> </option>
	          <?php } ?>
	        </select>
	      </p>
				<p>Nombre de places
					<input type="number" name="nbrPlaces" value="<?= $_POST['nbrPlaces'] ?>">
				</p>
				<p>
					Club :
					<select name="club">
						<option value=""> -- Nom du Club -- </option>
						<?php foreach ($clubs as list($nom)) { ?>
						<option value = "<?php echo $nom ?>" <?php if ($_POST['club']== $nom){?> selected <?php }?>> <?php echo $nom ?> </option>
						<?php } ?>
					</select>
				</p>
				<p>
					Le club souhaité n'apparaît pas dans la liste ?
					<a href="index.php?page=ajoutclub"> <input type="button" name="ajouterClub" value="Ajouter un nouveau club"> </a>
				</p>
				<p> <input name="Créer" type="submit" value="Créer"> </p>
			</form>
		</div>
	</body>
</html>
