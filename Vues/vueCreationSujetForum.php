<?php $this->titre = "Forum - Nouveau Sujet"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueCreationSujetForum.css" />
		<title>Créer un Sujet</title>
	</head>

	<body>
		<div class="titre">
			<h2>Création d'un nouveau sujet dans <?php echo $_GET['categorie'] ?></h2>
		</div>
		<div class="formulaire" >
			<form name = "formulaireNouveauSujet" method="post" action = "">
				<p> Nom du sujet : <input type="text" name="nomSujet" placeholder="Nom du Sujet" size="25" value = "<?= $_POST['nomSujet'] ?>"/> </p>
        <p>
         <textarea name="message" rows="7" cols="70"> </textarea>
       </p>
				<p> <input name="Creer" type="submit" value="Créer"> </p>
			</form>
		</div>
	</body>
</html>
