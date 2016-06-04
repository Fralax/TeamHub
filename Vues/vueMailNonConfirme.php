<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueMailNonConfirme;?>

    <h2> <?php echo $nonactif ?> </h2>
    <p> <?php echo $inscritok ?> </p>
    <p> <?php echo $clicklien ?> </p>
