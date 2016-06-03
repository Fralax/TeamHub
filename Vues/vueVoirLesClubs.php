<?php $this->titre = $vueVoirLesCLubs;
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>

<body>
		<div class="clubsVueVoirClubs">
			<div class="listeVueVoirClubs">
				<h2> <?php echo $lisclu ?> </h2>
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
						 <?php echo $siti.$adresseClub?> <?php echo $cpClub?> <?php echo $villeClub?>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
  </body>
