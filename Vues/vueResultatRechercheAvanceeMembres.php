<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueResultatsRecherche.css" />
		<title>Recherche</title>
	</head>

	<body>
		<div class="conteneur">
			<h2><?php echo"Résultats pour la recherche : "?></h2>
			<div class="resultats">
        <div class="resultatMembres">
          <table>
            <caption> <h3>MEMBRES</h3> </caption>
            <?php if ($membres == array()){ ?>
              <tr>
                <td>
                  Aucun Membre n'a été trouvé !
                </td>
              </tr>
            <?php } else{ ?>
            <?php foreach ($membres as list($nom, $departement, $photo)){ ?>
              <tr>
                <td>
                  <img src="imagesUtilisateurs/<?php echo $photo?>"/>
                </td>
                <td>
                  <a href="index.php?page=profil&nom=<?php echo $nom?>"> <?php echo $nom?> </a>
                </td>
              </tr>
              <?php } ?>
            <?php } ?>
          </table>
        </div>
			</div>
		</div>
  </body>
</html>
