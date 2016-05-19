<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Modifer un Club </title>
	</head>
	<body>

		<h2>Modifer les infos d'un Club</h2>

		<form action="" method="post">
			<div class="club">
	      <h3>Club : <input type="text" name="nomClub" value="<?php echo $caractClub['c_nom']?>"> </h3>
	      <p> Adresse :
	      <input type="text" name="adresseClub" value="<?php echo $caractClub['c_adresse'] ?>">
	      </p>
	      <p> Code Postal :
	      <input type="text" name="cpClub" value="<?php echo $caractClub['c_cp'] ?>">
	      </p>
	      <p> Numéro de téléphone :
	      <input type="text" name="numeroClub" value="<?php echo $caractClub['c_numero'] ?>">
	      </p>
				<div class="horaires">

					<table>
		        <tr>
		          <td> Lundi </td>
							<td> de <input type="text" name="c_hoLundiDebut" value="<?php echo $caractClub['c_hoLundiDebut'] ?>">  à <input type="text" name="c_hoLundiFin" value="<?php echo $caractClub['c_hoLundiFin'] ?>"> </td>
		        </tr>
		        <tr>
							<td> Mardi </td>
							<td> de <input type="text" name="c_hoMardiDebut" value="<?php echo $caractClub['c_hoMardiDebut'] ?>"> à <input type="text" name="c_hoMardiFin" value="<?php echo $caractClub['c_hoMardiFin'] ?>"> </td>
		        </tr>
						<tr>
							<td> Mercredi </td>
							<td> de <input type="text" name="c_hoMercrediDebut" value="<?php echo $caractClub['c_hoMercrediDebut'] ?>"> à <input type="text" name="c_hoMercrediFin" value="<?php echo $caractClub['c_hoMercrediFin'] ?>"> </td>
						</tr>
						<tr>
							<td> Jeudi </td>
							<td> de <input type="text" name="c_hoJeudiDebut" value="<?php echo $caractClub['c_hoJeudiDebut'] ?>"> à <input type="text" name="c_hoJeudiFin" value="<?php echo $caractClub['c_hoJeudiFin'] ?>"> </td>
						</tr>
						<tr>
							<td> Vendredi </td>
							<td> de <input type="text" name="c_hoVendrediDebut" value="<?php echo $caractClub['c_hoVendrediDebut'] ?>"> à <input type="text" name="c_hoVendrediFin" value="<?php echo $caractClub['c_hoVendrediFin'] ?>"> </td>
						</tr>
						<tr>
							<td> Samedi </td>
							<td> de <input type="text" name="c_hoSamediDebut" value="<?php echo $caractClub['c_hoSamediDebut'] ?>"> à <input type="text" name="c_hoSamediFin" value="<?php echo $caractClub['c_hoSamediFin'] ?> "> </td>
						</tr>
						<tr>
							<td> Dimanche </td>
							<td> de <input type="text" name="c_hoDimancheDebut" value="<?php echo $caractClub['c_hoDimancheDebut'] ?>"> à <input type="text" name="c_hoDimancheFin" value="<?php echo $caractClub['c_hoDimancheFin'] ?>"> </td>
						</tr>
		      </table>
					<p> Commentaire : <input type="text" name="c_hoCommentaire" value="<?php echo $caractClub['c_hoCommentaire'] ?>"> </p>
				</div>
				<input type="submit" name="Modifier" value="Modifier" >
			</form>

  </body>
</html>
