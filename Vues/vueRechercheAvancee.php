<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueRechercheAvancee.css" />
		<title>Recherche</title>
	</head>

	<body>

		<div class="conteneur">
			<div class="jeRecherche">
				<h3> Je recherche : </h3>
					<table>
						<tr>
							<td>
								<a href="#form1">Un Groupe</a>
							</td>
							<td>
								<a href="#form2">Un Membre</a>
							</td>
							<td>
								<a href="#form3">Un Club</a>
							</td>
						</tr>
					</table>
			</div>

			<div id = "form1" class="forms">
				<p> Recherche un Groupe </p>
					<form class="formulaireRechercheGroupe" name = "formulaireRechercheGroupe" method="post" action = "">
						<p> Nom du Groupe : <input type="text" name="nomGroupe" placeholder="Nom du Groupe" size="25" /> </p>
						<p> Département : <input type="text" name="departementGroupe" placeholder="Département" size="25" /> </p>
						<p> Administrateur : <input type="text" name="administrateur" placeholder="Administrateur" size="25" /> </p>
						<p> Sport : <input type="text" name="sport" placeholder="Sport" size="25" /> </p>
						<p> <input name="Rechercher1" type="submit" value="Rechercher"> </p>
					</form>
			</div>

			<div id = "form2" class="forms">
				<p> Recherche un Membre </p>
					<form  class="formulaireRechercheMembre" name = "formulaireRechercheMembre" method="post" action = "">
						<p> Nom du Membre : <input type="text" name="nomMembre" placeholder="Nom du Membre" size="25" /> </p>
						<p> Sa localisation : <input type="text" name="localisationMembre" placeholder="Localisation du Membre" size="25" /> </p>
						<p> <input name="Rechercher2" type="submit" value="Rechercher"> </p>
					</form>
			</div>

			<div id = "form3" class="forms">
				<p> Recherche un Club </p>
					<form  class="formulaireRechercheClub" name = "formulaireRechercheClub" method="post" action = "">
						<p> Nom du Club : <input type="text" name="nomClub" placeholder="Nom du Club" size="25" /> </p>
						<p> Département : <input type="text" name="departementClub" placeholder="Département du Club" size="25" /> </p>
						<p> <input name="Rechercher3" type="submit" value="Rechercher"> </p>
					</form>
			</div>
		</div>

  </body>

	<script src="http://code.jquery.com/jquery-2.2.3.js" integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4=" crossorigin="anonymous"></script>
	<script language="javascript" type="text/javascript">
		$(function(){
		var divs = $(".forms");
		divs.hide();
		$("a").click(function(){
			divs.filter(":visible").slideUp();
			$($(this).attr("href")).slideDown();
			return false;
		});
	});
	</script>

</html>