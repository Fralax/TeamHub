<?php $this->titre = "Mot de Passe Oublié";
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>
	<body>
    <div class="mdpOublieVueFormulaireMdp">
      <h2><?php echo $bj ?> <?php $_GET['pseudo'] ?> !</h2>
      <h3><?php echo $resetm ?></h3>
      <form class="formulaireNouveauMdpVueFormulaireMdp" action="" method="post">
        <p> <?php echo $nmdp ?><input type="password" name="mdp"> </p>
        <p> <?php echo $confnmdp ?><input type="password" name="mdpConfirm"> </p>
        <p> <input type="submit" name="valider" value="Réinitialiser le Mot de Passe"> </p>
      </form>
    </div>
  </body>
</html>
