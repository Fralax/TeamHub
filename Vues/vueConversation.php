<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueConversation.$_GET['correspondantB']; ?>

  <div class="conteneurConversation">
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
            </td>
            <td class="monPseudo">
              <div class="monPseudoDiv">
                <?php echo $expediteur ?>
              </div>
            </td>
          </tr>
        <?php } else{ ?>
        <tr id = "<?php echo $id ?>">
          <td class="pseudoAmi">
            <div class="pseudoAmiDiv">
              <?php echo $expediteur ?>
            </div>
          </td>
          <td class="messageConversationAmi">
            <div class="messageConversationAmiDiv">
              <?php echo $contenuMessage ?>
            </div>
          </td>
          <td>

          </td>
        </tr>
        <?php } ?>
      <?php endforeach; ?>
    </table>
  </div>

  <div id = "tchatForm">
    <form action="index.php?page=conversation&correspondantA=<?php echo $_SESSION['pseudo'] ?>&correspondantB=<?php echo $_GET['correspondantB'] ?>&id=<?php echo $_GET['id'] ?>" method="POST">
      <p><textarea id = "messageForm" name="message" rows="8" cols="40"></textarea></p>
      <p><input type="submit" id = "envoi" name="envoyer" value="<?php echo $env ?>"></p>
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script type="text/javascript">


    $('#envoi').click(function(e){
      e.preventDefault();
      var message = $('#messageForm').val();
      if (message != "") {
        $.ajax({
          url : "index.php?page=conversation&correspondantA=<?php echo $_SESSION['pseudo'] ?>&correspondantB=<?php echo $_GET['correspondantB'] ?>",
          type : "POST",
          data : "message=" + message
        });
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
      }, 750);
    }

    charger();
  </script>
