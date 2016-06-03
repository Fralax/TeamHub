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
      <h2> <?php echo $mailmembre ?></h2>
      <form class="formulaireMail" action="" method="post">
        <select name="membresSite">
          <option value =""> -- <?php echo $formmail1 ?> -- </option>
          <?php foreach ($membres as list($nom)) { ?>
          <option value = "<?php echo $nom?>" <?php if ($_POST['membresSite']=="$nom"){?> selected <?php }?> > <?php echo $nom?> </option>
          <?php } ?>
        </select>
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
