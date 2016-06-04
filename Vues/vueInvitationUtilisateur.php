<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueInvitationUtilisateur;?>

		<h2><?php echo $invutili ?></h2>

    <form action="" method="post">
      <select name="nomInvite">
				<option value =""> -- <?php echo $membreselec ?> -- </option>
        <?php foreach ($aInvite as list($nomainviter)) { ?>
        <option value = "<?php echo $nomainviter?>" > <?php echo $nomainviter?> </option>
        <?php } ?>
      </select>
      <input type="submit" name="Envoyer" value="<?php echo $env ?>" >
    </form>
