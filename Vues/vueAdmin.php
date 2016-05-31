<?php $this->titre = "Administration - Accueil"; ?>

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
		<div class="vueAdmin">
			<div class="conteneurVueAdmin">
		    <div class="adminMembresVueAdmin">
		      <h3>Administration des Membres</h3>
		      <p><a href="index.php?page=nouveladmin">Nommer un Administrateur</a></p>
		      <p><a href="index.php?page=bannirmembre"> Bannir un Membre </a> </p>
		      <p><a href="index.php?page=envoimail">Envoyer un mail à un membre</a> </p>
					<p><a href="index.php?page=envoimailmembres">Envoyer un mail aux membres du site</a> </p>
		    </div>
		    <div class="adminGroupesVueAdmin">
		      <h3>Administration des Groupes</h3>
		      <p> <a href="index.php?page=groupesasupprimer"> Supprimer un Groupe </a> </p>
		      <p> <a href="index.php?page=evenementasupprimer"> Supprimer un Événement </a> </p>
		      <p><a href="index.php?page=modifadmingroupes">Désigner un nouvel administrateur de groupe</a></p>
		    </div>
		    <div class="adminClubsVueAdmin">
		      <h3>Administration des Clubs</h3>
		      <p> <a href="index.php?page=clubsamodifierinfos"> Modifier les informations d'un Club </a> </p>
					<p> <a href="index.php?page=clubsamodifierphotos"> Modifier la photo d'un Club </a> <p>
					<p> <a href="index.php?page=clubsamodifiercommentaires"> Modérer les commentaires </a> <p>
		      <p> <a href="index.php?page=clubsasupprimer"> Supprimer un Club </a> </p>
		    </div>
		    <div class="adminGeneraleVueAdmin">
		      <h3>Administration de l'Aide</h3>
		      <p> <a href="index.php?page=afficheraccueilforum"> Modérer le Forum  </a> </p>
					<p> <a href="index.php?page=ajouterquestion"> Ajouter une question </a> </p>
		      <p> <a href="index.php?page=affichagefaq">Supprimer une question </a> </p>
		    </div>
		  </div>
		</div>
	</body>
<?php } ?>

<?php if($a == 1){ ?>
	<body>
		Vous n'avez pas accès à cette page.
	</body>
<?php } ?>
