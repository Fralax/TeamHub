<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="Contenu/vueAdmin.css" />
</head>

<?php
	require_once 'Controleurs/controleurAdministration.php';
	$admin = new controleurAdministration();
	$verifAdmin = $admin->verifAdmin();
		if($verifAdmin == true){
			$a=0;
		} else{
			$a=1;
		}
?>

<?php if($a == 0){ ?>
	<body>
	  <div class="conteneur">
	    <div class="adminMembres">
	      <h3>Administration des Membres</h3>
	      <p><a href="index.php?page=nouveladmin">Nommer un Administrateur</a></p>
	      <p><a href="index.php?page=bannirmembre"> Bannir un Membre </a> </p>
	      <p><a href="index.php?page=envoimail">Envoyer un mail</a> </p>
	    </div>
	    <div class="adminGroupes">
	      <h3>Administration des Groupes</h3>
	      <p> <a href="index.php?page=groupesasupprimer"> Supprimer un Groupe </a> </p>
	      <p> <a href="index.php?page=evenementasupprimer"> Supprimer un Événement </a> </p>
	      <p><a href="#">Désigner un nouvel administrateur de groupe</a></p>
	    </div>
	    <div class="adminClubs">
	      <h3>Administration des Clubs</h3>
	      <p> <a href="index.php?page=clubsamodifierinfos"> Modifier les informations d'un Club </a> </p>
				<p> <a href="index.php?page=clubsamodifierphotos"> Modifier la photo d'un Club </a> <p>
				<p> <a href="index.php?page=clubsamodifiercommentaires"> Modérer les commentaires </a> <p>
	      <p> <a href="index.php?page=clubsasupprimer"> Supprimer un Club </a> </p>
	    </div>
	    <div class="adminGenerale">
	      <h3>Administration du Site</h3>
	      <p>Modifier les Messages de l'Accueil</p>
	      <p>Modifier l'image de fond du Site</p>
	    </div>
	  </div>
	</body>
<?php } ?>

<?php if($a == 1){ ?>
	<body>
		Vous n'avez pas accès à cette page.
	</body>
<?php } ?>
