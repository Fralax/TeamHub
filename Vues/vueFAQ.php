<?php $this->titre = "FAQ - Accueil"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueFAQ.css" />
		<title>FAQ</title>
	</head>
	<body>
		<?php
			require_once 'Controleurs/controleurAdministration.php';
			$admin = new controleurAdministration();
			$verifAdmin = $admin->verifAdmin();
				if($verifAdmin == true){
					$a=0;
				} else{
					$a=1;
				}
		?>
		<div class="FAQ">
			<h2> Liste des Questions les plus fréquentes </h2>

	    <?php $nb = 1;
      foreach ($faq as list($id, $question, $reponse)) { ?>
	    	<p> <?php echo $nb ?>. <?php echo $question ?>
				  <?php if($a == 0){ ?>
						<a href="index.php?page=supprimerquestion&id=<?php echo $id ?>"> Supprimer </a>
					<?php } ?></p>
        <p> <?php echo $reponse ?>
					<?php $nb = $nb + 1 ?>
				<br> </br>
	    <?php } ?>
		</div>
  </body>
</html>
