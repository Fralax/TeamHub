<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueClub.css" />
		<title>Liste des Clubs </title>
	</head>
	<body>
		<div class="club">
      <h2>Club <?php echo $caractClub['c_nom']?> </h2>
      <img src="imagesClubs/<?php echo $caractClub['c_image']; ?>"/>
      <p> Adresse :
      <?php echo $caractClub['c_adresse'] ?>
      </p>
      <p> Code Postale :
      <?php echo $caractClub['c_cp'] ?>
      </p>
      <p> Numéro de téléphone :
      <?php echo $caractClub['c_numero'] ?>
      </p>
			<div class="horaires">
				<table>
	        <tr>
	          <td> Lundi </td>
						<td> de <?php echo $caractClub['c_hoLundiDebut'] ?> à <?php echo $caractClub['c_hoLundiFin'] ?> </td>
	        </tr>
	        <tr>
						<td> Mardi </td>
						<td> de <?php echo $caractClub['c_hoMardiDebut'] ?> à <?php echo $caractClub['c_hoMardiFin'] ?> </td>
	        </tr>
					<tr>
						<td> Mercredi </td>
						<td> de <?php echo $caractClub['c_hoMercrediDebut'] ?> à <?php echo $caractClub['c_hoMercrediFin'] ?> </td>
					</tr>
					<tr>
						<td> Jeudi </td>
						<td> de <?php echo $caractClub['c_hoMercrediDebut'] ?> à <?php echo $caractClub['c_hoMercrediFin'] ?> </td>
					</tr>
					<tr>
						<td> Vendredi </td>
						<td> de <?php echo $caractClub['c_hoJeudiDebut'] ?> à <?php echo $caractClub['c_hoJeudiFin'] ?> </td>
					</tr>
					<tr>
						<td> Samedi </td>
						<td> de <?php echo $caractClub['c_hoVendrediDebut'] ?> à <?php echo $caractClub['c_hoVendrediFin'] ?> </td>
					</tr>
					<tr>
						<td> Dimanche </td>
						<td> de <?php echo $caractClub['c_hoSamediDebut'] ?> à <?php echo $caractClub['c_hoSamediFin'] ?> </td>
					</tr>
	      </table>
			</div>
			<div class="commentaire">
					<?php echo $caractClub['c_hoCommentaire'] ?>
			</div>
		</div>

  </body>
</html>
