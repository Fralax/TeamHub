<?php $this->titre = "FAQ - Ajout"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueAjoutFAQ.css" />
		<title>Ajouter une Question</title>
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
    <?php if($a == 0){ ?>
		<h2>Ajouter une Question à la FAQ </h2>

    <form method="post" action="">
      <p>
       <label for="question"> Rédigez une question pour la FAQ </label><br />
       <textarea name="question" rows="7" cols="70"> </textarea>
     </p>
     <p>
      <label for="reponse"> Indiquez la réponse </label><br />
      <textarea name="reponse" rows="7" cols="70"> </textarea>
    </p>
     <p> <input type="submit" name="Ajouter" value="Ajouter"> </p>
   </form>
   <?php } ?>

   <?php if($a == 1){ ?>
   	<body>
   		Vous n'avez pas accès à cette page.
   	</body>
   <?php } ?>
  </body>
</html>
