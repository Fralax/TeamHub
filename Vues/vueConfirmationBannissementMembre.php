<?php $this->titre = $vueConfirmationBannissementMembre;
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>
  <body>
		<div class="confirBannissementMembre">
			<h2> <?php echo $pseudo.$banok ?> </h2>

	    <p>  <?php echo $redirgr.$nom ?> </p>
		</div>
  </body>

  <?php header('refresh:3;url=index.php?page=groupe&nom='.$nom) ?>
