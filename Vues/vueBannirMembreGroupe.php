<?php $this->titre = "Administration - Bannissement Groupe"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueBannirMembreGroupe.css" />
		<title> Bannir un membre du Groupe </title>
	</head>
	<body>

    <?php
      if ($caract['g_admin'] == $_SESSION['pseudo']) {
        $i = 1;
      } else{
        $i = 2;
      }
    ?>

    <?php if( $i == 1){ ?>
		<div class="membres">
			<h2>Listes des Membres de <?php echo $nom?> </h2>
      <table>
        <?php foreach ($membres as list($nomMembre)) { ?>
					<?php if ($nomMembre != $_SESSION['pseudo']){ ?>
          <tr>
            <td>
              <a href="index.php?page=profil&nom=<?php echo $nomMembre ?>"> <p> <?php echo $nomMembre?></p></a>
            </td>
            <td>
              <a href="#" onclick="if (confirm('Voulez vous vraiment bannir <?php echo $nomMembre ?> ?')) window.location='index.php?page=confirmationbannissementmembre&nom=<?php echo $_GET['nom'] ?>&pseudo=<?php echo $nomMembre ?>'; return false"> <input type="button" name="bannirDuGroupe" value="Bannir du Groupe"> </a>
            </td>
          </tr>
					<?php } ?>
        <?php } ?>
      </table>
		</div>
    <?php } ?>

    <?php if($i == 2){ ?>
        Vous n'avez pas accès à cette page.
    <?php } ?>
  </body>
</html>
