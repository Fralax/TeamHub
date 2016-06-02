<?php $this->titre = "A Propos";
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>

  <body>
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
        <div class="fonctionnement_du_siteAPropos">
          <div id="image_sport">
            <img src=""/>
          </div>
          <!-- <div id="fonctionnement_description">
            <h2>Fonctionnement du site</h2>
            <p>Team Hub est un site vous permettant de trouver des partenaires de sport près de chez vous afin de pratiquer vos sports préférés.</p>
            <p>
          </div> -->
        </div>
        <div class="contactAPropos">
          <p>Contact: contact@teamhub.com</p>
          <p>28 rue Notre-Dame des Champs</p>
          <p>75006 Paris FRANCE </p>
        </div>
      </div>
    </div>
  </body>
</html>
