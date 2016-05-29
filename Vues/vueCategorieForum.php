<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueCategorieForum.css" />
		<title><?php echo $_GET['categorie'] ?></title>
	</head>

  <body>
    <?php
    require_once 'Controleurs/controleurAdministration.php';
    $admin = new controleurAdministration();
    $verifAdmin = $admin->verifAdmin();
      if(isset($_SESSION['pseudo'])){
        if($verifAdmin == true){
          $n = 3;
        } else {
          $n = 1;
        }
      } else{
        $n = 2;
      }
    ?>

    <div class="conteneur">
      <?php if ($n == 1 || $n == 3){ ?>
      <div class="boutonNouveauSujet">
        <p> <a href="index.php?page=creersujet&categorie=<?php echo $_GET['categorie'] ?>" > Créer un nouveau Sujet </a> </p>
      </div>
      <?php } ?>
      <table class="tableauSujets">

				<thead class="enTete">
					<tr>
						<th class="titreCategorie">
							<h3><?php echo $_GET['categorie'] ?></h3>
						</th>
						<th class="nbrReponses">
							Réponses
						</th>
						<th class="nbrVues">
							Vues
						</th>
						<th class="dernierMessage">
							Dernier Message
						</th>
					</tr>
				</thead>

        <?php foreach ($sujets as list($id, $nomSujet, $dateSujet, $auteurSujet, $nombreReponsesSujet, $activiteSujet)){ ?>
        <tr>
          <td class="nomSujet">
            <a href="index.php?page=sujetforum&id=<?php echo $id?>"> <?php echo $nomSujet?> </a>
          </td>
          <td class="nbrReponses" rowspan = "2">
            <?php echo $nombreReponsesSujet ?>
          </td>
          <td class="nbrVues" rowspan = "2">
            nbrVues
          </td>
          <td class="dernierMessage" rowspan = "2">
            dernierMessage
          </td>
        </tr>
        <tr>
          <td class="nomAuteurDate">
            par <?php echo $auteurSujet ?> le <?php echo $dateSujet ?>
          </td>
        </tr>
        <?php } ?>
			</table>

    </div>

  </body>

</html>
