<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/" />
		<title>Suggestions</title>
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

    <h2> Organiser des Cours </h2>
		<?php if ($n == 1){ ?>
		<p> <a href="index.php?page=creersujet&categorie=Cours" > Créer un nouveau Sujet </a> </p>
		<?php } ?>
    <table>
      <tr>
        <td>
          Nom du Sujet
        </td>

        <td>
          Crée par
        </td>

        <td>
          Réponses
        </td>

        <td>
          Date
        </td>

        <td>
          Etat
        </td>
      </tr>
      <?php foreach ($sujets as list($id, $nomSujet, $dateSujet, $auteurSujet, $nombreReponsesSujet, $activiteSujet)){ ?>
      <tr>
        <td>
          <a href="index.php?page=sujetforum&id=<?php echo $id?>"> <?php echo $nomSujet?> </a>
        </td>

        <td>
          <?php echo $auteurSujet ?>
        </td>

        <td>
          <?php echo $nombreReponsesSujet ?>
        </td>

        <td>
          <?php echo $dateSujet ?>
        </td>

        <td>
          <?php if ($activiteSujet == 1){ ?>
            Ouvert
          <?php } else { ?>
            Clos
          <?php } ?>
        </td>
				<td>
					<?php if ($n == 3){ ?>
						<a href="index.php?page=supprimersujet&id=<?php echo $id ?>"> Supprimer </a>
					<?php } ?>
				</td>
      </tr>
      <?php } ?>
    </table>

  </body>
</html>
