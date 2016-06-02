<?php $this->titre = "Mot de Passe Oublié";
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>
<body>
    <div class="mdpOublieVueMdpOublie">
      <h3><?php echo $mdpoublie ?></h3>
      <form class="formulaireMdpOublieVueMdpOublie" action="" method="post">
        <p> <?php echo $saisadresse ?> </p>
        <p><input type="text" name="mail"> </p>
        <p> <input type="submit" name="valider" value="Réinitialiser mon Mot de Passe"> </p>
      </form>
    </div>
  </body>
