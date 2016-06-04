<?php $this->titre = "Administration - Accueil";
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
		      <p><a href="#form1"> <?php echo $adminnom ?></a></p>
		      <p><a href="#form2"> <?php echo $adminbann ?> </a> </p>
		      <p><a href="#form3"> <?php echo $adminmailmem ?></a> </p>
					<p><a href="#form4"> <?php echo $adminmail ?></a> </p>
		    </div>
		    <div class="adminGroupesVueAdmin">
		      <h3><?php echo $admingroup ?> </h3>
		      <p> <a href="#form5"> <?php echo $adminsupgroup ?>  </a> </p>
		      <p> <a href="#form6"> <?php echo $adminsupeve ?> </a> </p>
		      <p><a href="#form7"> <?php echo $adminnouvad ?></a></p>
		    </div>
		    <div class="adminClubsVueAdmin">
		      <h3> <?php echo $adminclu ?></h3>
		      <p> <a href="#form8">  <?php echo $adminmodinfo ?> </a> </p>
					<p> <a href="#form9"> <?php echo $adminmodphoto ?> </a> <p>
					<p> <a href="#form10"> <?php echo $admincom ?> </a> <p>
		      <p> <a href="#form11"> <?php echo $adminsupclub ?> </a> </p>
		    </div>
		    <div class="adminGeneraleVueAdmin">
		      <h3> <?php echo $adminaide ?></h3>
		      <p> <a href="index.php?page=afficheraccueilforum"> <?php echo $adminmodforum ?> </a> </p>
					<p> <a href="#form12"> <?php echo $adminajoutques ?> </a> </p>
		      <p> <a href="index.php?page=affichagefaq"> <?php echo $adminsupques ?> </a> </p>
		    </div>
		  </div>

			<div id = "form1" class="formsVueAdmin">

				<h2><?php echo $adminnouvad ?></h2>

				<form action="" method="post">
					<select name="nouvelAdmin">
						<option value =""> -- <?php echo $memaselec ?> -- </option>
						<?php foreach ($nouveauxAdmins as list($nom)) { ?>
						<option value = "<?php echo $nom?>" > <?php echo $nom?> </option>
						<?php } ?>
					</select>
					<input type="submit" name="designer" value="Valider" >
				</form>

				<h2> <?php echo $administr ?></h2>

				<table>
					<?php foreach ($admins as list($nom)){ ?>
					<tr>
						<td>
							<?php echo $nom?> <a href="index.php?page=deop&pseudo=<?php echo $nom?>"> <input type="button" name="plusAdmin" value ="<?php echo $supadmins ?>"> </a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>

			<div id = "form2" class="formsVueAdmin">
				<h2><?php echo $adminbann ?></h2>

				<form action="" method="post">
					<select name="banni">
						<option value =""> -- <?php echo $selectadmin ?> -- </option>
						<?php foreach ($abannir as list($nomabannir)) { ?>
						<option value = "<?php echo $nomabannir?>" > <?php echo $nomabannir?> </option>
						<?php } ?>
					</select>
					<input type="submit" name="bannir" value="Bannir" >
				</form>

				<h2> <?php $mban ?> </h2>
				<?php foreach ($membreBanni as list($nombanni)){ ?>
					<?php echo $nombanni?> <a href="index.php?page=debanni&pseudo=<?php echo $nombanni?>"> <input type="button" name="Débannir" value ="<?php echo $deban ?>"> </a>
				<?php } ?>
			</div>

			<div id = "form3" class="formsVueAdmin">
				<h2> <?php echo $mailmembre ?></h2>
				<form action="" method="post">
					<select name="membresSite">
						<option value =""> -- <?php echo $formmail1 ?> -- </option>
						<?php foreach ($membres as list($nom)) { ?>
						<option value = "<?php echo $nom?>" <?php if ($_POST['membresSite']=="$nom"){?> selected <?php }?> > <?php echo $nom?> </option>
						<?php } ?>
					</select>
					<p><input type="text" name="sujet" value="<?php $_POST['sujet'] ?>" placeholder=<?php echo $formmail2 ?>></p>
					<p><textarea name="mail" rows="8" cols="40"><?php echo $_POST['mail'] ?></textarea></p>
					<p><input type="submit" name="envoyer" value="Envoyer"></p>
				</form>
			</div>

			<div id = "form4" class="formsVueAdmin">
				<h2> <?php echo $mailtousmembres ?></h2>
				<form action="" method="post">
					<p><input type="text" name="sujetMembres" value="<?php echo $_POST['sujetMembres'] ?>" placeholder=<?php echo $formmail2 ?>></p>
					<p><textarea name="mailMembres" rows="8" cols="40"><?php echo $_POST['mailMembres'] ?></textarea></p>
					<p><input type="submit" name="envoyerMailATousLesMembres" value="Envoyer"></p>
				</form>
			</div>

			<div id = "form5" class="formsVueAdmin">
				<h2><?php echo $adminsupgroup ?></h2>
				<table>
				<?php foreach ($listeGroupes as list($nomgroupes)){ ?>
					<tr>
						<td> <?php echo $nomgroupes?> </td>
						<td> <a href="#" onclick="if (confirm('<?php echo $sursupgr.addslashes($nomgroupes) ?> ?')) window.location='index.php?page=suppressiongroupe&nom=<?php echo addslashes($nomgroupes) ?>'; return false">  <input type="button" name="Supprimer" value ="<?php echo $sup ?>"> </a></td>
					</tr>
				<?php } ?>
				</table>
			</div>

			<div id="form6" class="formsVueAdmin">
				<h2><?php echo $supev ?></h2>
				<table>
				<?php foreach ($listeEvenements as list($nomevenements)){ ?>
					<tr>
						<td> <?php echo $nomevenements?> </td>
						<td> <a href="#" onclick="if (confirm('<?php echo $sursupeve.addslashes($nomevenements) ?> ?')) window.location='index.php?page=suppressionevenement&evenement=<?php echo addslashes($nomevenements) ?>'; return false">  <input type="button" name="Supprimer" value ="<?php echo $sup ?>"> </a></td>
					</tr>
				<?php } ?>
				</table>
			</div>

			<div id="form7" class="formsVueAdmin">
				<h2><?php echo $groupmodifadmin ?></h2>
				<table>
				<?php foreach ($listeGroupes as list($nomgroupes)){ ?>
					<tr>
						<td> <?php echo $nomgroupes?> </td>
						<td> <a href="index.php?page=affichagemodificationadmin&nom=<?php echo $nomgroupes?>" >  <input type="button" name="Modifier" value ="<?php echo $modiadmin ?>"> </a></td>
					</tr>
				<?php } ?>
				</table>
			</div>

			<div id = "form8" class="formsVueAdmin">
				<h2> <?php echo $clubmodifinfo ?> </h2>
					<table>
						<?php foreach ($listeClubs as list($nomclubs)) { ?>
						<tr>
							<td> <?php echo $nomclubs?> </td>
							<td> <a href="index.php?page=modifclub&club=<?php echo $nomclubs?>" > <input type="button" name="ModifierInfos" value="<?php echo $mod ?>"> </a> </td>
						</tr>
						<?php } ?>
					</table>
			</div>

			<div id = "form9" class="formsVueAdmin">
				<h2> <?php echo $clubmodifphoto ?> </h2>
					<table>
						<?php foreach ($listeClubs as list($nomclubs)) { ?>
						<tr>
							<td> <?php echo $nomclubs?> </td>
							<td> <a href="index.php?page=modifphotoclub&club=<?php echo $nomclubs?>" > <input type="button" name="ModifierPhoto" value="<?php echo $mod ?>"> </a> </td>
						</tr>
						<?php } ?>
					</table>
			</div>

			<div id="form10" class="formsVueAdmin">
					<table>
						<?php foreach ($listeClubs as list($nomclubs)) { ?>
						<tr>
							<td> <?php echo $nomclubs?> </td>
							<td> <a href="index.php?page=moderationcommentaire&club=<?php echo $nomclubs?>" > <input type="button" name="Modifier" value="<?php echo $mod ?>"> </a> </td>
						</tr>
						<?php } ?>
					</table>
			</div>

			<div id="form11" class="formsVueAdmin">
				<h2> <?php echo $clubsuppchoix ?> </h2>
					<table>
						<?php foreach ($listeClubs as list($nomclubs)) { ?>
						<tr>
							<td> <?php echo $nomclubs?> </td>
							<td> <a href="#" onclick="if (confirm('<?php echo $sursupp.addslashes($nomclubs)?> ?')) window.location='index.php?page=suppressionclub&club=<?php echo addslashes($nomclubs)?>'; return false"> <input type="button" name="Supprimer" value="<?php echo $sup ?>"> </a> </td>
						</tr>
						<?php } ?>
					</table>
			</div>

			<div id="form12" class="formsVueAdmin">
				<h2> <?php echo $ajoutfaq ?> </h2>
				 <form method="post" action="">
					 <p>
						<label for="question"> <?php echo $redques ?> </label><br />
						<textarea name="question" rows="7" cols="70"> </textarea>
					</p>
					<p>
					 <label for="reponse"> <?php echo $indrep ?> </label><br />
					 <textarea name="reponse" rows="7" cols="70"> </textarea>
				 </p>
					<p> <input type="submit" name="Ajouter" value="<?php echo $ajo ?>"> </p>
				</form>
			</div>

		</div>
	</body>
<?php } ?>

<?php if($a == 1){ ?>
	<body>
		<?php echo $nonacces ?>
	</body>
<?php } ?>


<script src="http://code.jquery.com/jquery-2.2.3.js" integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4=" crossorigin="anonymous"></script>
<script language="javascript" type="text/javascript">
	$(function(){
	var divs = $(".formsVueAdmin");
	divs.hide();
	$("a").click(function(){
		divs.filter(":visible").slideUp();
		$($(this).attr("href")).slideDown();
		return false;
	});
});

</script>
