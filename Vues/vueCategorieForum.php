<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueCoursForum.css" />
		<title><?php echo $_GET['categorie'] ?></title>
	</head>

  <body>
    <?php
    require_once 'Controleurs/controleurAdministration.php';
    $admin = new controleurAdministration();
    $verifAdmin = $admin->verifAdmin();
      if(isset($_SESSION['pseudo'])){
        if($verifAdmin == true){
          $n = 3;
        } else {
          $n = 1;
        }
      } else{
        $n = 2;
      }
    ?>


  </body>

</html>
