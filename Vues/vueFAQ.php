<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueFAQ;?>

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
		<div class="FAQ">
			<h2> <?php echo $quesfreq ?> </h2>

	    <?php $nb = 1;
      foreach ($faq as list($id, $question, $reponse)) { ?>
	    	<p> <?php echo $nb ?>. <?php echo $question ?>
				  <?php if($a == 0){ ?>
						<a href="index.php?page=supprimerquestion&id=<?php echo $id ?>"> <?php echo $sup ?></a>
					<?php } ?></p>
        <p> <?php echo $reponse ?>
					<?php $nb = $nb + 1 ?>
				<br> </br>
	    <?php } ?>
		</div>
