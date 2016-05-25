<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/" />
		<title>Suggestions</title>
	</head>

	<body>
    <h2> Groupes </h2>
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
      <?php foreach ($sujets as list($id, $nomSujet, $dateSujet, $heureSujet, $auteurSujet, $nombreReponsesSujet, $activiteSujet)){ ?>
      <tr>
        <td>
          <?php echo $nomSujet?>
        </td>

        <td>
          <?php echo $auteurSujet ?>
        </td>

        <td>
          <?php echo $nombreReponsesSujet ?>
        </td>

        <td>
          <?php echo $dateSujet ?>  <?php echo $heureSujet ?>
        </td>

        <td>
          <?php if ($activiteSujet == 1){ ?>
            Ouvert
          <?php } else { ?>
            Clos
          <?php } ?>
        </td>
      </tr>
      <?php } ?>
    </table>

  </body>
</html>
