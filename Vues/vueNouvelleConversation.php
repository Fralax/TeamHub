<?php
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}
$this->titre = $vueNouvelleConversation; ?>

  <div class="nouvelleConversation">
    <h3> <?php echo $nouvconv ?></h3>
    <form class="" action="" method="post">
      <div class="destinatairesNouvelleConversation">
        <p>
          <?php echo $dest ?>
          <select name="destinataire">
            <option value = ""> -- <?php echo $seledest ?> -- </option>
            <?php foreach ($destinataires as list($nom)) { ?>
            <option value = "<?php echo $nom?>" <?php if ($_POST['destinataire']=="$nom"){?> selected <?php }?> > <?php echo $nom?> </option>
            <?php } ?>
          </select>
        </p>
      </div>
      <div class="messageNouvelleVonversation">
        <textarea name="message" rows="10" cols="60"><?php echo $_POST['mail'] ?></textarea>
      </div>
      <input type="submit" name="envoyer" value="<?php echo $env ?>">
    </form>
  </div>
