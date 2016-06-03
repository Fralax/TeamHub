<?php $this->titre = "Recherche Avancée";
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>

<body>

		<div class="conteneurVueRechercheAvancee">
			<div class="jeRechercheVueRechercheAvancee">
				<h3> <?php echo $rech ?></h3>
					<table>
						<tr>
							<td>
								<a href="#form1"><?php echo $rechgr ?></a>
							</td>
							<td>
								<a href="#form2"><?php echo $rechmem ?></a>
							</td>
							<td>
								<a href="#form3"><?php echo $rechclub ?></a>
							</td>
						</tr>
					</table>
			</div>

			<div id = "form1" class="formsRechercheAvancee">
				<form class="formulaireRechercheGroupeVueRechercheAvancee" name = "formulaireRechercheGroupe" method="post" action = "">
					<table>
						<tr>
							<td>
								<?php echo $formgroup1 ?>
							</td>
							<td>
								<input type="text" name="nomGroupe" placeholder="Nom du Groupe" size="25" />
							</td>
						</tr>
						<tr>
							<td>
								<?php echo $dep ?>
							</td>
							<td>
								<input type="text" name="departementGroupe"  size="25" />
							</td>
						</tr>
						<tr>
							<td>
								<?php echo $ad ?>
							</td>
							<td>
								<input type="text" name="administrateur"  size="25" />
							</td>
						</tr>
						<tr>
							<td>
								<?php echo $s ?>
							</td>
							<td>
								<input type="text" name="sport"  size="25" />
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
								<?php echo $namemem ?>
							</td>
							<td>
								<input type="text" name="nomMembre" size="25" />
							</td>
						</tr>
						<tr>
							<td>
								<?php echo $lomem ?>
							</td>
							<td>
								<input type="text" name="localisationMembre" size="25" />
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
								<?php echo $formclub1 ?>
							</td>
							<td>
								<input type="text" name="nomClub" size="25" />
							</td>
						</tr>
						<tr>
							<td>
								<?php echo $dep ?>
							</td>
							<td>
								<input type="text" name="departementClub" size="25" />
							</td>
						</tr>
					</table>
					<p> <input name="Rechercher3" type="submit" value="Rechercher"> </p>
				</form>
			</div>
		</div>
  </body>
