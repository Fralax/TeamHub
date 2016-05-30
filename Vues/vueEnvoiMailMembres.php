<?php $this->titre = "Administration - Mail"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueEnvoiMailMembres.css" />
		<title>Envoyer un mail aux Membres</title>
	</head>

  <?php
    require_once 'Controleurs/controleurAdministration.php';
    $admin = new controleurAdministration();
    $verifAdmin = $admin->verifAdmin();
      if($verifAdmin == true){
        $z=0;
      } else{
        $z=1;
      }
  ?>

  <?php if($z == 0){ ?>
    <h2>Envoyer un mail à tous les membres</h2>
    <form class="formulaireMailMembres" action="" method="post">
      <p><input type="text" name="sujet" value="" placeholder="Objet"></p>
      <p><textarea name="mail" rows="8" cols="40"></textarea></p>
      <p><input type="submit" name="envoyer" value="Envoyer"></p>
    </form>
  <?php } ?>


  <?php if($z == 1){ ?>
    Vous n'avez pas accès à cette page.
  <?php } ?>

</body>


</html>
