<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueConversation.$_GET['correspondantB']; ?>

<?php
	if ($_GET['correspondantA'] != $_SESSION['pseudo']) {
		$p = 1;
	} else{
		$p = 2;
	}
?>

<?php if ($p == 2): ?>
	<div class="imageCorrespondant">
		<?php require_once 'Controleurs/controleurMembres.php';
		$photo = new membres();
		$afficher = $photo->affichagePhoto($_GET['correspondantB']);
		?>
		<p> <img src="imagesUtilisateurs/<?php echo $afficher[0]?>"/> </p>
		<p> <h3><?php echo $_GET['correspondantB'] ?></h3> </p>
	</div>
	<div id="conteneurConversation">
    <table id="tableauConversation">
      <?php foreach ($messages as list($id, $expediteur, $destinataire, $date, $contenuMessage)): ?>
        <?php if ($expediteur == $_SESSION['pseudo']){ ?>
          <tr id = "<?php echo $id ?>">
            <td>

            </td>
            <td class="messageConversationSessionPseudo">
              <div class="messageConversationSessionPseudoDiv">
                <?php echo $contenuMessage ?>
              </div>
							<div class="heureMessage">
								<?php
									$dateEntiereSujet = date_create($date);
									$dateSujetDernierMessage = date_format($dateEntiereSujet, 'd/m/Y');
									$heureSujetDernierMessage = date_format($dateEntiereSujet, 'H:i:s');
									echo "le ".$dateSujetDernierMessage." à ".$heureSujetDernierMessage;
								?>
							</div>
            </td>
            <td class="monPseudo">
              <div class="monPseudoDiv">
								<?php require_once 'Controleurs/controleurMembres.php';
								$photo = new membres();
								$afficher = $photo->affichagePhoto($expediteur);
								?>
								<img src="imagesUtilisateurs/<?php echo $afficher[0]?>"/>
              </div>
            </td>
          </tr>
        <?php } else{ ?>
        <tr id = "<?php echo $id ?>">
          <td class="pseudoAmi">
            <div class="pseudoAmiDiv">
							<?php require_once 'Controleurs/controleurMembres.php';
							$photo = new membres();
							$afficher = $photo->affichagePhoto($expediteur);
							?>
							<img src="imagesUtilisateurs/<?php echo $afficher[0]?>"/>
            </div>
          </td>
          <td class="messageConversationAmi">
            <div class="messageConversationAmiDiv">
              <?php echo $contenuMessage ?>
            </div>
						<div class="heureMessage">
							<?php
								$dateEntiereSujet = date_create($date);
								$dateSujetDernierMessage = date_format($dateEntiereSujet, 'd/m/Y');
								$heureSujetDernierMessage = date_format($dateEntiereSujet, 'H:i:s');
								echo "le ".$dateSujetDernierMessage." à ".$heureSujetDernierMessage;
							?>
						</div>
          </td>
          <td>

          </td>
        </tr>
        <?php } ?>
      <?php endforeach; ?>
    </table>
  </div>
	<div class="tchatForm">
		<table>
			<tr>
				<td>
					<form action="index.php?page=conversation&correspondantA=<?php echo $_SESSION['pseudo'] ?>&correspondantB=<?php echo $_GET['correspondantB'] ?>&id=<?php echo $_GET['id'] ?>" method="POST">
						<textarea id = "messageForm" name="message" rows="2" cols="100%" ></textarea>
				</td>
				<td>
					<input type="submit" id = "envoi" name="envoyer" value="<?php echo $env ?>">
					</form>
				</td>
			</tr>
		</table>
	</div>
<?php endif; ?>

<?php if ($p == 1): ?>
	<?php echo $nonacces ?>
<?php endif; ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script type="text/javascript">

		var x = document.getElementById('conteneurConversation');
		x.scrollTop = x.scrollHeight;

		$('#messageForm').keyup(function(e) {
			if(e.keyCode == 13) { // KeyCode de la touche entrée
				if (e.shiftKey == false){ //s'il n'y a pas shift
					$('#envoi').click();
				}
	 		}
		});

		$('#envoi').click(function(e){
      e.preventDefault();
      var message = $('#messageForm').val();
      if (message != "") {
        $.ajax({
          url : "index.php?page=conversation&correspondantA=<?php echo $_SESSION['pseudo'] ?>&correspondantB=<?php echo $_GET['correspondantB'] ?>",
          type : "POST",
          data : "message=" + message
        });
				$('#messageForm').val("");
      }
    });




    function charger(){
      setTimeout(function(){
        var dernierID = $("#tableauConversation tr")[$("#tableauConversation tr").length-1].id;
        $.ajax({
          url : "index.php?page=conversationrecupmessages&correspondantA=<?php echo $_SESSION['pseudo'] ?>&correspondantB=<?php echo $_GET['correspondantB'] ?>&id=" + dernierID,
          type : "GET",
          success : function(data){
            $("#tableauConversation").append(data);
          }
        })
        charger();
      }, 3000);
    }

    charger();
  </script>
