<?php $this->titre = $vueAdmin;
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}?>

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
		      <h3><?php echo $adminmem ?> </h3>
		      <p><a href="index.php?page=nouveladmin"> <?php echo $adminnom ?></a></p>
		      <p><a href="index.php?page=bannirmembre"> <?php echo $adminbann ?> </a> </p>
		      <p><a href="index.php?page=envoimail"> <?php echo $adminmailmem ?></a> </p>
					<p><a href="index.php?page=envoimailmembres"> <?php echo $adminmail ?></a> </p>
		    </div>
		    <div class="adminGroupesVueAdmin">
		      <h3><?php echo $admingroup ?> </h3>
		      <p> <a href="index.php?page=groupesasupprimer"> <?php echo $adminsupgroup ?>  </a> </p>
		      <p> <a href="index.php?page=evenementasupprimer"> <?php echo $adminsupeve ?> </a> </p>
		      <p><a href="index.php?page=modifadmingroupes"> <?php echo $adminnouvad ?></a></p>
		    </div>
		    <div class="adminClubsVueAdmin">
		      <h3> <?php echo $adminclu ?></h3>
		      <p> <a href="index.php?page=clubsamodifierinfos">  <?php echo $adminmodinfo ?> </a> </p>
					<p> <a href="index.php?page=clubsamodifierphotos"> <?php echo $adminmodphoto ?> </a> <p>
					<p> <a href="index.php?page=clubsamodifiercommentaires"> <?php echo $admincom ?> </a> <p>
		      <p> <a href="index.php?page=clubsasupprimer"> <?php echo $adminsupclub ?> </a> </p>
		    </div>
		    <div class="adminGeneraleVueAdmin">
		      <h3> <?php echo $adminaide ?></h3>
		      <p> <a href="index.php?page=afficheraccueilforum"> <?php echo $adminmodforum ?> </a> </p>
					<p> <a href="index.php?page=ajouterquestion"> <?php echo $adminajoutques ?> </a> </p>
		      <p> <a href="index.php?page=affichagefaq"> <?php echo $adminsupques ?> </a> </p>
		    </div>
		  </div>
		</div>
	</body>
<?php } ?>

<?php if($a == 1){ ?>
	<body>
		<?php echo $nonacces ?>
	</body>
<?php } ?>
