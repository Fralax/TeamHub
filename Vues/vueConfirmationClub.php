<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueConfirmationClub;?>

		<div class="confirmationClub">
			<h2> <?php echo $clubcree ?> </h2>
	    <p> <?php echo $redir ?> </p>
		</div>

  <?php header('refresh:3;url=index.php?page=mesgroupes') ?>
