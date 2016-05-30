<?php $this->titre = "Administration - Mail"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueEnvoiMail.css" />
		<title> Envoyer un mail </title>
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

  <body>
    <?php if($z == 0){ ?>
      <h2>Envoyer un mail à un Membre</h2>
      <form class="formulaireMail" action="" method="post">
        <select name="membresSite">
          <option value =""> -- Sélectionnez le destinataire -- </option>
          <?php foreach ($membres as list($nom)) { ?>
          <option value = "<?php echo $nom?>" > <?php echo $nom?> </option>
          <?php } ?>
        </select>
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
