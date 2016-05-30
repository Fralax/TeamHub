<?php $this->titre = "Invitation - Membre "; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueInvitationUtilisateur.css" />
		<title>Inviter un Utilisateur à votre Groupe</title>
	</head>
	<body>

		<h2>Inviter un Utilisateur à votre Groupe</h2>

    <form action="" method="post">
      <select name="nomInvite">
				<option value =""> -- Selectionnez un membre à inviter -- </option>
        <?php foreach ($aInvite as list($nomainviter)) { ?>
        <option value = "<?php echo $nomainviter?>" > <?php echo $nomainviter?> </option>
        <?php } ?>
      </select>
      <input type="submit" name="Envoyer" value="Envoyer" >
    </form>
  </body>
</html>
