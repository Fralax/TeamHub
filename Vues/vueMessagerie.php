<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueMessagerie;

$messagerie = new messagerie();

?>

	<?php if (isset($_SESSION['pseudo'])){ ?>
		<div class="conteneurMessagerie">
	    <div class="titreMessagerie">
	      <h3><?php echo $ssmenu12 ?></h3>
	    </div>

	    <div class="nouvelleConversationMessagerie">
	      <a href="index.php?page=nouvelleconversation"><?php echo $nouvconv ?></a>
	    </div>

	    <div class="conversationsMessagerie">
	      <h3><?php echo $mes ?></h3>
	      <table>
	        <?php foreach ($conversations as list($expediteur, $destinataire, $date)): ?>
	          <tr>
	            <td class="amiConversation">

	              <?php
	                if ($expediteur == $_SESSION['pseudo']) {
										$dernierMessage = $messagerie->IDDernierMessage($_SESSION['pseudo'], $destinataire)->fetch();
										settype($dernierMessage['mi_id'], "integer");
								?>
	                <a href="index.php?page=conversation&correspondantA=<?php echo $_SESSION['pseudo'] ?>&correspondantB=<?php echo $destinataire ?>&id=<?php echo $dernierMessage['mi_id'] ?>"> <?php echo $destinataire ?> </a>
								<?php } else{
										$dernierMessage = $messagerie->IDDernierMessage($expediteur, $_SESSION['pseudo'])->fetch();
										settype($dernierMessage['mi_id'], "integer");
								?>
	                <a href="index.php?page=conversation&correspondantA=<?php echo $_SESSION['pseudo'] ?>&correspondantB=<?php echo $expediteur ?>&id=<?php echo $dernierMessage['mi_id'] ?>"> <?php echo $expediteur ?></a>
								<?php  } ?>
	            </td>
	          </tr>
	          <tr>
	            <td class="dernierMessageConversation">
	              <?php echo $dernierMessage['mi_message'] ?>
	            </td>
	          </tr>
	        <?php endforeach; ?>
	      </table>
	    </div>
	  </div>
	<?php } else{ ?>
		<?php echo $nonacces ?>
	<?php } ?>
