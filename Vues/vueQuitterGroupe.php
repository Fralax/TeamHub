<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueQuitterGroupe;?>

    <h2> <?php echo $left.$nom ?> ! </h2>

    <p> <?php echo $redir ?> </p>

<?php header('refresh:3;url=index.php?page=mesgroupes') ?>
