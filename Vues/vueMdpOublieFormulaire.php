<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueMdpOublieFormulaire;?>

    <div class="mdpOublieVueFormulaireMdp">
      <h2><?php echo $bj ?> <?php $_GET['pseudo'] ?> !</h2>
      <h3><?php echo $resetm ?></h3>
      <form class="formulaireNouveauMdpVueFormulaireMdp" action="" method="post">
        <p> <?php echo $nmdp ?><input type="password" name="mdp"> </p>
        <p> <?php echo $confnmdp ?><input type="password" name="mdpConfirm"> </p>
        <p> <input type="submit" name="valider" value="<?php echo $rese ?>"> </p>
      </form>
    </div>
