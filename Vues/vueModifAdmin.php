<?php $this->titre = "Administration - Administrateur Groupe";
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueModifAdmin.css" />
		<title>Modifier l'Administrateur</title>
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

		<?php if( $a == 0){ ?>
		<h2><?php echo $modadmin ?></h2>
    <form action="" method="post">
      <select name="Admin">
        <option value = ""> -- <?php echo $newadmi ?> -- </option>
        <?php foreach ($adminPossible as list($nomAdmin)) { ?>
        <option value = "<?php echo $nomAdmin?>" > <?php echo $nomAdmin?> </option>
        <?php } ?>
      </select>
      <input type="submit" name="Modifier" value="<?php echo $modifi ?>" >
    </form>
		<?php } ?>
		<?php if($a == 1){ ?>
        <?php echo $nonacces ?>
    <?php } ?>

  </body>
</html>
