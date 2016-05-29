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
      <div class="boutonNouveauSujet">
        
      </div>

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

				<tr>
					<td class="nomSujet">
						nomSujet
					</td>
					<td class="nbrReponses" rowspan = "2">
						nbrRéponses
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
            par nomAuteur le dateSujet
          </td>
        </tr>

        <tr>
          <td class="nomSujet">
            nomSujet2
          </td>
          <td class="nbrReponses" rowspan = "2">
            nbrRéponses
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
            par nomAuteur le dateSujet
          </td>
        </tr>
			</table>

    </div>


  </body>

</html>
