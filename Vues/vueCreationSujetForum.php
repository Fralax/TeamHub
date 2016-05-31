<?php $this->titre = "Forum - Nouveau Sujet"; ?>
	<body>
		<div class="titreVueCreationSujet">
			<h2>Création d'un nouveau sujet dans <?php echo $_GET['categorie'] ?></h2>
		</div>
		<div class="formulaireVueCreationSujet" >
			<form name = "formulaireNouveauSujet" method="post" action = "">
				<p> Nom du sujet : <input type="text" name="nomSujet" placeholder="Nom du Sujet" size="25" value = "<?= $_POST['nomSujet'] ?>"/> </p>
        <p>
         <textarea name="message" rows="7" cols="70"> <?php echo $_POST['message'] ?> </textarea>
       </p>
				<p> <input name="Creer" type="submit" value="Créer"> </p>
			</form>
		</div>
	</body>
