<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueValidationCompte;?>

    <h2> <?php echo $nonactif ?></h2>

    <p> <?php echo $valereco ?> </p>

    <form class="validationCompte" action="" method="post">
      <input type="submit" name="validation" value="<?php echo $conf ?>">
    </form>
