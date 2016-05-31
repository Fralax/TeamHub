<?php $this->titre = "Groupe - Membres"; ?>

	<body>
		<div class="membresVueMembres">
			<h2>Listes des Membres de <?php echo $nom?> </h2>

	    <?php foreach ($membres as list($nomMembre)) { ?>
	    	<a href="index.php?page=profil&nom=<?php echo $nomMembre ?>"> <p> <?php echo $nomMembre?></p></a>
	    <?php } ?>
		</div>

  </body>
</html>
