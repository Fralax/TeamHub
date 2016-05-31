<?php $this->titre = "Recherche Avancée - Club"; ?>

<body>
		<div class="conteneurVueRechAvanceeClubs">
			<h2><?php echo"Résultats pour la recherche : "?></h2>
			<table>
				<caption> <h3>CLUBS</h3> </caption>
				<?php if ($clubs == array()){ ?>
					<tr>
						<td>
							Aucun Club n'a été trouvé !
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
  </body>
</html>
