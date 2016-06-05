<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueCreationSujetForum;?>
		<div class="titreVueCreationSujet">
			<h2><?php echo $sujetnouv.$_GET['categorie'] ?></h2>
		</div>
		<div class="formulaireVueCreationSujet" >
			<form name = "formulaireNouveauSujet" method="post" action = "">
				<p> <?php echo $formsujet1 ?>: <input type="text" name="nomSujet" placeholder="<?php echo $formsujet1 ?>" size="25" value = "<?= $_POST['nomSujet'] ?>"/> </p>
        <p>
         <textarea name="message" rows="7" cols="70"> <?php echo $_POST['message'] ?> </textarea>
       </p>
				<p> <input name="Creer" type="submit" value="<?php echo $Cree ?>"> </p>
			</form>
		</div>
