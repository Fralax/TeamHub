<?php $this->titre = "Club - Tous les Clubs"; ?>

<body>
		<div class="clubsVueVoirClubs">
			<div class="listeVueVoirClubs">
				<h2>Liste des Clubs </h2>
			</div>

			<table>
				<?php foreach ($club as list($nomClub, $adresseClub, $cpClub, $villeClub, $image)) { ?>
				<tr>
					<td>
						<img src="imagesClubs/<?php echo $image ?>"/>
					</td>
					<td>
						<a href="index.php?page=club&nom=<?php echo $nomClub?>"> <?php echo $nomClub?></a>
					</td>
					<td>
						situé au <?php echo $adresseClub?> <?php echo $cpClub?> <?php echo $villeClub?>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
  </body>
