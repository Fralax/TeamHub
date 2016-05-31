<?php $this->titre = "Recherche Avancée"; ?>

<body>

		<div class="conteneurVueRechercheAvancee">
			<div class="jeRechercheVueRechercheAvancee">
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

			<div id = "form1" class="formsRechercheAvancee">
				<form class="formulaireRechercheGroupeVueRechercheAvancee" name = "formulaireRechercheGroupe" method="post" action = "">
					<table>
						<tr>
							<td>
								Nom du Groupe :
							</td>
							<td>
								<input type="text" name="nomGroupe" placeholder="Nom du Groupe" size="25" />
							</td>
						</tr>
						<tr>
							<td>
								Département :
							</td>
							<td>
								<input type="text" name="departementGroupe" placeholder="Département" size="25" />
							</td>
						</tr>
						<tr>
							<td>
								Administrateur :
							</td>
							<td>
								<input type="text" name="administrateur" placeholder="Administrateur" size="25" />
							</td>
						</tr>
						<tr>
							<td>
								Sport :
							</td>
							<td>
								<input type="text" name="sport" placeholder="Sport" size="25" />
							</td>
						</tr>
					</table>
					<p> <input name="Rechercher1" type="submit" value="Rechercher"> </p>
				</form>
			</div>

			<div id = "form2" class="formsRechercheAvancee">
				<form  class="formulaireRechercheMembreVueRechercheAvancee" name = "formulaireRechercheMembre" method="post" action = "">
					<table>
						<tr>
							<td>
								Nom du Membre :
							</td>
							<td>
								<input type="text" name="nomMembre" placeholder="Nom du Membre" size="25" />
							</td>
						</tr>
						<tr>
							<td>
								Sa localisation :
							</td>
							<td>
								<input type="text" name="localisationMembre" placeholder="Localisation du Membre" size="25" />
							</td>
						</tr>
					</table>
					<p> <input name="Rechercher2" type="submit" value="Rechercher"> </p>
				</form>
			</div>

			<div id = "form3" class="formsRechercheAvancee">
				<form  class="formulaireRechercheClubVueRechercheAvancee" name = "formulaireRechercheClub" method="post" action = "">
					<table>
						<tr>
							<td>
								Nom du Club :
							</td>
							<td>
								<input type="text" name="nomClub" placeholder="Nom du Club" size="25" />
							</td>
						</tr>
						<tr>
							<td>
								Département :
							</td>
							<td>
								<input type="text" name="departementClub" placeholder="Département du Club" size="25" />
							</td>
						</tr>
					</table>
					<p> <input name="Rechercher3" type="submit" value="Rechercher"> </p>
				</form>
			</div>
		</div>
  </body>

	<script src="http://code.jquery.com/jquery-2.2.3.js" integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4=" crossorigin="anonymous"></script>
	<script language="javascript" type="text/javascript">
		$(function(){
		var divs = $(".formsRechercheAvancee");
		divs.hide();
		$("a").click(function(){
			divs.filter(":visible").slideUp();
			$($(this).attr("href")).slideDown();
			return false;
		});
	});
	</script>
