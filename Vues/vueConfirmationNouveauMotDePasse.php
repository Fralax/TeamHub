<?php $this->titre = $vueConfirmationNouveauMotDePasse;
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>
<body>
    <div class="confirmationVueconfirmationMdpReini">
      <h3> <?php echo $mailenvoye ?></h3>
      <?php echo $instructionmdp ?>
    </div>
  </body>
