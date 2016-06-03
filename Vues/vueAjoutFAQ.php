<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueAjoutFAQ;?>

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
			<div class="ajoutFAQ">
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
   <?php } ?>

   <?php if($a == 1){ ?>
   	<?php echo $nonacces ?>
   <?php } ?>
