<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueConfirmationGroupe;?>

		<div class="confirmationGroupe">
			<h2> <?php echo $appartok.$nom ?> ! </h2>
	    <p> <?php echo $redir ?> </p>
		</div>


  <?php header('refresh:3;url=index.php?page=mesgroupes') ?>
