<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="Contenu/vueAdmin.css" />
</head>

<?php
	if($_SESSION['pseudo'] == "admin"){
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
	      <p>Nommer un Administrateur</p>
	      <p><a href="index.php?page=bannirmembre"> Bannir un Membre </a> </p>
	      <p>Envoyer un mail</p>
	    </div>
	    <div class="adminGroupes">
	      <h3>Administration des Groupes</h3>
	      <p> <a href="index.php?page=groupesasupprimer"> Supprimer un Groupe </a> </p>
	      <p> <a href="index.php?page=evenementasupprimer"> Supprimer un Événement </a> </p>
	      <p>Désigner un nouvel administrateur de groupe</p>
	    </div>
	    <div class="adminClubs">
	      <h3>Administration des Clubs</h3>
	      <p>Éditer un Club</p>
	      <p>Supprimer un Club</p>
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
