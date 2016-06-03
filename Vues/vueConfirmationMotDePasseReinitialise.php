<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueConfirmationMotDePasseReinitialise;?>

    <div class="mdpConfirmVueMdpReini">
      <h3> <?php  echo $passreset ?></h3>
      <p>
        <?php  echo $peutconnect ?>
      </p>
      <p>
        <?php  echo $rediracc ?>
      </p>
    </div>

<?php header('refresh:3;url=index.php?') ?>
