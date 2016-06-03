<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueResultatRechercheAvanceeClubs;?>

		<div class="conteneurVueRechAvanceeClubs">
			<h2><?php echo"Résultats pour la recherche : "?></h2>
			<table>
				<caption> <h3><?php echo $clus ?></h3> </caption>
				<?php if ($clubs == array()){ ?>
					<tr>
						<td>
							<?php echo $noneclub ?>
						</td>
					</tr>

				<?php } else{ ?>
				<?php foreach ($clubs as list($nom, $image)){ ?>
					<tr>
						<td>
							<img src="imagesClubs/<?php echo $image ?>"/>
						</td>
						<td>
							<a href="index.php?page=club&nom=<?php echo $nom?>"> <?php echo $nom?> </a>
						</td>
					</tr>
					<?php } ?>
				<?php } ?>
			</table>
		</div>
