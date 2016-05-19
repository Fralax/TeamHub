<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueClub.css" />
		<title>Liste des Clubs </title>
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
      
    <?php } ?>

    <?php if($z == 1){ ?>
      Vous n'avez pas accès à cette page.
    <?php } ?>

  </body>


</html>
