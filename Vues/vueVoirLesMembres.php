<?php $this->titre = "Groupe - Membres";
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>

	<body>
		<div class="membresVueMembres">
			<h2><?php echo $listpeutban.$nom?> </h2>

	    <?php foreach ($membres as list($nomMembre)) { ?>
	    	<a href="index.php?page=profil&nom=<?php echo $nomMembre ?>"> <p> <?php echo $nomMembre?></p></a>
	    <?php } ?>
		</div>

  </body>
</html>
