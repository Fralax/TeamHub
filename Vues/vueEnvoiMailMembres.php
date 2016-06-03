<?php $this->titre = "Administration - Mail";
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
    <h2> <?php echo $mailtousmembres ?></h2>
    <form class="formulaireMailMembres" action="" method="post">
      <p><input type="text" name="sujet" value="<?php $_POST['sujet'] ?>" placeholder=<?php echo $formmail2 ?>></p>
      <p><textarea name="mail" rows="8" cols="40"><?php echo $_POST['mail'] ?></textarea></p>
      <p><input type="submit" name="envoyer" value="<?php echo $env ?>"></p>
    </form>
  <?php } ?>

  <?php if($z == 1){ ?>
    <?php echo $nonacces ?>
  <?php } ?>

</body>
</html>
