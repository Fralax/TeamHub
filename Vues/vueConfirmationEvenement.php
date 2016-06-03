<?php $this->titre = $vueConfirmationEvenement;
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>
  <body>
		<div class="confirmationEvenement">
			<h2> <?php echo $partiok.$evenement ?> ! </h2>
	    <p> <?php echo $redir ?> </p>
		</div>
  </body>

  <?php header('refresh:3;url=index.php?page=mesgroupes') ?>
