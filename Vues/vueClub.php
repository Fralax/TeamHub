<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueVoirLesMembres.css" />
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
      <table>
        <tr>
          <td> Lundi </td>
          <td> Mardi </td>
          <td> Mercredi </td>
          <td> Jeudi </td>
          <td> Vendredi </td>
          <td> Samedi </td>
          <td> Dimanche </td>
        </tr>
          <td> <?php echo date('G:i ',$caractClub['c_hoLundiDebut']) ?> - <?php echo $caractClub['c_hoLundiFin'] ?> </td>
          <td> <?php echo $caractClub['c_hoMardiDebut'] ?> - <?php echo $caractClub['c_hoMardiFin'] ?> </td>
          <td> <?php echo $caractClub['c_hoMercrediDebut'] ?> - <?php echo $caractClub['c_hoMercrediFin'] ?> </td>
          <td> <?php echo $caractClub['c_hoJeudiDebut'] ?> - <?php echo $caractClub['c_hoJeudiFin'] ?> </td>
          <td> <?php echo $caractClub['c_hoVendrediDebut'] ?> - <?php echo $caractClub['c_hoVendrediFin'] ?> </td>
          <td> <?php echo $caractClub['c_hoSamediDebut'] ?> - <?php echo $caractClub['c_hoSamediFin'] ?> </td>
          <td> <?php echo $caractClub['c_hoDimancheDebut'] ?> - <?php echo $caractClub['c_hoDimancheFin'] ?> </td>
        <tr>

        </tr>

      </table>

		</div>

  </body>
</html>
