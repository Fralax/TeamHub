<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueAPropos;?>

    <div class="conteneur">
      <div class="équipe">
        <div id="description">
          <h2> <?php echo $motfond ?> </h2>
          <p> <?php echo $motcontenu1 ?> </p>
          <p> <?php echo $motcontenu2 ?> </p>
          <p> <?php echo $motcontenu3 ?> </p>
          <h2> <?php echo $presequ ?> </h2>
          <p></p>
        </div>
        <div class="contactAPropos">
          <h2>Contact:</h2>
					<p>	contact@teamhub.com</p>
          <p>28 rue Notre-Dame des Champs</p>
          <p>75006 Paris FRANCE </p>
        </div>
      </div>
    </div>
