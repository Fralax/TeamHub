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
							<td class="photoAmi">
								<?php
									require_once 'Controleurs/controleurMembres.php';
									$photo = new membres();
									if ($expediteur == $_SESSION['pseudo']) {
										$afficher = $photo->affichagePhoto($destinataire);
									} else{
										$afficher = $photo->affichagePhoto($expediteur);
									}
								?>
								<img src="imagesUtilisateurs/<?php echo $afficher[0]?>"/>
							</td>
	            <td class="amiConversation">
	              <?php
	                if ($expediteur == $_SESSION['pseudo']) {
										$dernierMessage = $messagerie->IDDernierMessage($_SESSION['pseudo'], $destinataire)->fetch();
										settype($dernierMessage['mi_id'], "integer");
								?>
	                <a href="index.php?page=conversation&correspondantA=<?php echo $_SESSION['pseudo'] ?>&correspondantB=<?php echo $destinataire ?>&id=<?php echo $dernierMessage['mi_id'] ?>"> <?php echo $destinataire ?> </a><span id="nbrMessagesConversationExpediteur" style="background-color:red;color:white;font-weight:bold;border-radius:30px;border: 2px solid;padding:2px 3px 2px 4px;top: -6px;right:-6px;font-size:1em;">0</span>
								<?php } else{
										$dernierMessage = $messagerie->IDDernierMessage($expediteur, $_SESSION['pseudo'])->fetch();
										settype($dernierMessage['mi_id'], "integer");
								?>
	                <a href="index.php?page=conversation&correspondantA=<?php echo $_SESSION['pseudo'] ?>&correspondantB=<?php echo $expediteur ?>&id=<?php echo $dernierMessage['mi_id'] ?>"> <?php echo $expediteur ?> </a><span id = "nbrMessagesConversationDestinataire" style="background-color:red;color:white;font-weight:bold;border-radius:30px;border: 2px solid;padding:2px 3px 2px 4px;top: -6px;right:-6px;font-size:1em;">0</span>
								<?php  } ?>
								<div class="dernierMessageConversation">
									<?php
										$dateEntiereSujet = date_create($dernierMessage['mi_date']);
										$dateSujetDernierMessage = date_format($dateEntiereSujet, 'd/m/Y');
										$heureSujetDernierMessage = date_format($dateEntiereSujet, 'H:i:s');
									?>
									<?php echo substr($dernierMessage['mi_message'], 0, 80)." ... le <b>".$dateSujetDernierMessage."</b> à <b>".$heureSujetDernierMessage."</b>" ?>
								</div>
	            </td>
	          </tr>
	        <?php endforeach; ?>
	      </table>
	    </div>
	  </div>
	<?php } else{ ?>
		<?php echo $nonacces ?>
	<?php } ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="text/javascript">

	function chargerNbrMessagesConversationsExpediteur(){
		setTimeout(function(){
			$.ajax({
				url : "index.php?page=recupnbrmessagesconversationnonlusexpediteur",
				type : "GET",
				success : function(data){
					$("#nbrMessagesConversationExpediteur").replaceWith(data);
				}
			})
			chargerNbrMessagesConversations();
		}, 5000);
	}
	chargerNbrMessagesConversations();

	function chargerNbrMessagesConversationsDestinataire(){
		setTimeout(function(){
			$.ajax({
				url : "index.php?page=recupnbrmessagesconversationnonlusdestinataire",
				type : "GET",
				success : function(data){
					$("#nbrMessagesConversationDestinataire").replaceWith(data);
				}
			})
			chargerNbrMessagesConversations();
		}, 5000);
	}
	chargerNbrMessagesConversations();

	</script>
