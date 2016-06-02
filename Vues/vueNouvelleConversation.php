<?php $this->titre = "Nouvelle Conversation"; ?>


<body>
  <div class="nouvelleConversation">
    <h3>Nouvelle Conversation</h3>
    <form class="" action="" method="post">
      <div class="destinatairesNouvelleConversation">
        <p>
          Destinataire :
          <select name="destinataire">
            <option value = ""> -- Sélectionnez le destinataire -- </option>
            <?php foreach ($destinataires as list($nom)) { ?>
            <option value = "<?php echo $nom?>" <?php if ($_POST['destinataire']=="$nom"){?> selected <?php }?> > <?php echo $nom?> </option>
            <?php } ?>
          </select>
        </p>
      </div>
      <div class="messageNouvelleVonversation">
        <textarea name="message" rows="10" cols="60"><?php echo $_POST['mail'] ?></textarea>
      </div>
      <input type="submit" name="envoyer" value="Envoyer">
    </form>
  </div>
</body>
