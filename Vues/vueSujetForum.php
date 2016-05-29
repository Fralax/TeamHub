<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueSujetForum.css" />
		<title>Sujet</title>
	</head>

	<body>
		<?php
    require_once 'Controleurs/controleurAdministration.php';
    $admin = new controleurAdministration();
    $verifAdmin = $admin->verifAdmin();
			if(isset($_SESSION['pseudo'])){
        if ($message['f_auteur'] == $_SESSION['pseudo']){
				  $n = 1;
        } elseif($verifAdmin == true){
          $n = 2;
        } else {
          $n = 3;
        }
			} else {
        $n = 4;
      }
		?>

    <table>
      <tr>
        <td>
          <?php echo $message['f_auteur'] ?>
        </td>

        <td>
          <?php echo $message['f_sujet'] ?>
          <?php if ($n == 1 && $message['f_actif'] == "1"){ ?>
            <a href="index.php?page=cloreSujet&id=<?php echo $_GET['id'] ?>"> Clore le Sujet </a>
          <?php } ?>
        </td>
      </tr>

      <tr>
        <td class = "photoMembre">
          <?php
          $utilisateur = new utilisateurs();
          $photo = $utilisateur->afficherPhotoForum($message['f_auteur'])->fetch();
          ?>
          <img src="imagesUtilisateurs/<?php echo $photo[0] ?>"/>
        </td>

        <td>
          <?php echo $message['f_message'] ?>
        </td>
      </tr>
    </table>

    <?php foreach ($reponses as list($auteur, $reponse, $id)){ ?>

      <table>
        <tr>
          <td>
            <?php echo $auteur ?>
          </td>

          <td>
            RE : <?php echo $message['f_sujet'] ?>
            <?php if ($n == 2){ ?>
              <a href="index.php?page=supprimermessage&id=<?php echo $id ?>"> Supprimer </a>
            <?php } ?>
          </td>
        </tr>

        <tr>
          <td class = "photoMembre">
            <?php
            $utilisateur = new utilisateurs();
            $photo = $utilisateur->afficherPhotoForum($auteur)->fetch();
            ?>
            <img src="imagesUtilisateurs/<?php echo $photo[0] ?>"/>
          </td>

          <td>
            <?php echo $reponse ?>
          </td>
        </tr>
      </table>
      <?php } ?>

      <?php if (($n == 1 || $n == 2 || $n == 3) && $message['f_actif'] == "1"){ ?>
  			<form name = "formulaireNouvelleReponse" method="post" action = "">
          <textarea name="message" rows="7" cols="70"> </textarea>
          <p> <input type="submit" name="Repondre" value="Répondre"> </p>
        </form>
  		<?php } ?>

  </body>
</html>
