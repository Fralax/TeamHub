<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueConfirmationNotifgroupe;?>

		<div class="confirmationNotif">
			<h2>  <?php echo $recevnotif.$nom ?> ! </h2>
	    <p> <?php  echo $rediracc ?> </p>
		</div>

  <?php header('refresh:3;url=index.php?page=mesgroupes') ?>
