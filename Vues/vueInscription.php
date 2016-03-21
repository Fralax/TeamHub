<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title> Inscription - TeamHub</title>
	</head>
	<body>
    <a href="/TeamHub/Vues/vueAccueilVisiteurs.php"> <img src="/TeamHub/Autres/Logo.png" width="306" height="172" > </a>
		<p> </p>
		<h2>Inscription au site

    <?php
    if ($verif == true){ ?>
		terminée </h2>
		<p> Bienvenue <?= $_POST['Prenom']?>, Vous êtes inscrit </p>
		<p> Nous avons envoyé un email de confirmation à <?= $_POST['Email']?> ! </p>

		<?php exit;
    }
		?>

		</h2>


		<p> Inscrivez-vous, c'est gratuit ! </p>

		<form  name = "formulaireInscription" method="post" action = "">
			<p><input type="text" name="Nom" placeholder="Nom" size="25" value = "<?= $_POST['Nom'] ?>"/>
			<input type="text" name="Prenom" placeholder="Prénom" size="25" value = "<?= $_POST['Prenom'] ?>"/> </p>

      <p> Sexe : <input type="radio" name="Sexe" value = "Homme" <?php if ($_POST['Sexe']=="Homme"){?> checked <?php }?>/> <label for="H">Homme</label>
      <input type="radio" name="Sexe" value = "Femme" <?php if ($_POST['Sexe']=="Femme"){?> checked <?php }?>/> <label for="F">Femme</label> </p>

			<p>Date de naissance

				<select name="jour">
					<option value="0"> Jour </option>
        	<?php for ($jour = 1 ; $jour <= 31 ; $jour++){ ?>
        	<option value = "<?php echo $jour ?>" <?php if ($_POST['jour']=="$jour"){?> selected <?php }?> > <?php echo $jour; ?> </option>
					<?php } ?>
				</select>

				<select name="mois">
					<option value="0"> Mois </option>
        	<?php for ($mois = 1 ; $mois <= 12 ; $mois++){ ?>
          <option value= "<?php echo $mois ?>" <?php if ($_POST['mois']=="$mois"){?> selected <?php }?> > <?php echo $mois; ?> </option>
					<?php } ?>
				</select>

				<select name="annee">
          <option value="0"> Année </option>
        	<?php for ($annee = 2016 ; $annee >= 1900 ; $annee--){ ?>
          <option value="<?php echo $annee ?>" <?php if ($_POST['annee']=="$annee"){?> selected <?php }?> > <?php echo $annee; ?> </option>
					<?php } ?>
				</select>
			</p>

			<p> <input type="tel" name="Portable" placeholder="Téléphone Portable" size="25" value = "<?= $_POST['Portable'] ?>" /> </p>

			<p> <input type="email" name="Email" placeholder="Email" size="25" value = "<?= $_POST['Email'] ?>"/> </p>
			<p> <input type="email" name="ConfirmEmail" placeholder="Confirmation Email" size="25" value = "<? if ($_POST['Email'] == $_POST['ConfirmEmail']){echo $_POST['Email'];} ?>"/> </p>

			<p> <input type="text" name="Adresse" placeholder="Adresse" size="25" value = "<?= $_POST['Adresse'] ?>"/> </p>
			<p> <input type="text" name="Ville" placeholder="Ville" size="25" value = "<?= $_POST['Ville'] ?>"/> </p>
			<p> <input type="text" name="CodePostal" placeholder="CP" size="25" value = "<?= $_POST['CodePostal'] ?>"/> </p>


<!--Pays
			<p>
				<select name="Pays" required>
					<option value="0"> -- Sélectionner un Pays -- </option>
					<optgroup label="Afrique">
						<option value="afriqueDuSud">Afrique Du Sud</option>
						<option value="algerie">Algérie</option>
						<option value="angola">Angola</option>
						<option value="benin">Bénin</option>
						<option value="botswana">Botswana</option>
						<option value="burkina">Burkina</option>
						<option value="burundi">Burundi</option>
						<option value="cameroun">Cameroun</option>
						<option value="capVert">Cap-Vert</option>
						<option value="republiqueCentre-Africaine">République Centre-Africaine</option>
						<option value="comores">Comores</option>
						<option value="republiqueDemocratiqueDuCongo">République Démocratique Du Congo</option>
						<option value="congo">Congo</option>
						<option value="coteIvoire">Côte d'Ivoire</option>
						<option value="djibouti">Djibouti</option>
						<option value="egypte">Égypte</option>
						<option value="ethiopie">Éthiopie</option>
						<option value="erythrée">Érythrée</option>
						<option value="gabon">Gabon</option>
						<option value="gambie">Gambie</option>
						<option value="ghana">Ghana</option>
						<option value="guinee">Guinée</option>
						<option value="guinee-Bisseau">Guinée-Bisseau</option>
						<option value="guineeEquatoriale">Guinée Équatoriale</option>
						<option value="kenya">Kenya</option>
						<option value="lesotho">Lesotho</option>
						<option value="liberia">Liberia</option>
						<option value="libye">Libye</option>
						<option value="madagascar">Madagascar</option>
						<option value="malawi">Malawi</option>
						<option value="mali">Mali</option>
						<option value="maroc">Maroc</option>
						<option value="maurice">Maurice</option>
						<option value="mauritanie">Mauritanie</option>
						<option value="mozambique">Mozambique</option>
						<option value="namibie">Namibie</option>
						<option value="niger">Niger</option>
						<option value="nigeria">Nigeria</option>
						<option value="ouganda">Ouganda</option>
						<option value="rwanda">Rwanda</option>
						<option value="saoTomeEtPrincipe">Sao Tomé-et-Principe</option>
						<option value="senegal">Séngal</option>
						<option value="seychelles">Seychelles</option>
						<option value="sierra">Sierra</option>
						<option value="somalie">Somalie</option>
						<option value="soudan">Soudan</option>
						<option value="swaziland">Swaziland</option>
						<option value="tanzanie">Tanzanie</option>
						<option value="tchad">Tchad</option>
						<option value="togo">Togo</option>
						<option value="tunisie">Tunisie</option>
						<option value="zambie">Zambie</option>
						<option value="zimbabwe">Zimbabwe</option>
					</optgroup>
					<optgroup label="Amérique">
						<option value="antiguaEtBarbuda">Antigua-et-Barbuda</option>
						<option value="argentine">Argentine</option>
						<option value="bahamas">Bahamas</option>
						<option value="barbade">Barbade</option>
						<option value="belize">Belize</option>
						<option value="bolivie">Bolivie</option>
						<option value="bresil">Brésil</option>
						<option value="canada">Canada</option>
						<option value="chili">Chili</option>
						<option value="colombie">Colombie</option>
						<option value="costaRica">Costa Rica</option>
						<option value="cuba">Cuba</option>
						<option value="republiqueDominicaine">République Dominicaine</option>
						<option value="dominique">Dominique</option>
						<option value="equateur">Équateur</option>
						<option value="etatsUnis">États Unis</option>
						<option value="grenade">Grenade</option>
						<option value="guatemala">Guatemala</option>
						<option value="guyana">Guyana</option>
						<option value="haiti">Haïti</option>
						<option value="honduras">Honduras</option>
						<option value="jamaique">Jamaïque</option>
						<option value="mexique">Mexique</option>
						<option value="nicaragua">Nicaragua</option>
						<option value="panama">Panama</option>
						<option value="paraguay">Paraguay</option>
						<option value="perou">Pérou</option>
						<option value="saintCristopheEtNieves">Saint-Cristophe-et-Niévès</option>
						<option value="sainteLucie">Sainte-Lucie</option>
						<option value="saintVincentEtLesGrenadines">Saint-Vincent-et-les-Grenadines</option>
						<option value="salvador">Salvador</option>
						<option value="suriname">Suriname</option>
						<option value="triniteEtTobago">Trinité-et-Tobago</option>
						<option value="uruguay">Uruguay</option>
						<option value="venezuela">Venezuela</option>
					</optgroup>
					<optgroup label="Asie">
						<option value="afghanistan">Afghanistan</option>
						<option value="arabieSaoudite">Arabie Saoudite</option>
						<option value="armenie">Arménie</option>
						<option value="azerbaidjan">Azerbaïdjan</option>
						<option value="bahrein">Bahreïn</option>
						<option value="bangladesh">Bangladesh</option>
						<option value="bhoutan">Bhoutan</option>
						<option value="birmanie">Birmanie</option>
						<option value="brunei">Brunéi</option>
						<option value="cambodge">Cambodge</option>
						<option value="chine">Chine</option>
						<option value="coreeDuSud">Corée Du Sud</option>
						<option value="coreeDuNord">Corée Du Nord</option>
						<option value="emiratsArabeUnis">Émirats Arabe Unis</option>
						<option value="georgie">Géorgie</option>
						<option value="inde">Inde</option>
						<option value="indonesie">Indonésie</option>
						<option value="iraq">Iraq</option>
						<option value="iran">Iran</option>
						<option value="israel">Israël</option>
						<option value="japon">Japon</option>
						<option value="jordanie">Jordanie</option>
						<option value="kazakhstan">Kazakhstan</option>
						<option value="kirghistan">Kirghistan</option>
						<option value="koweit">Koweït</option>
						<option value="laos">Laos</option>
						<option value="liban">Liban</option>
						<option value="malaisie">Malaisie</option>
						<option value="maldives">Maldives</option>
						<option value="mongolie">Mongolie</option>
						<option value="nepal">Népal</option>
						<option value="oman">Oman</option>
						<option value="ouzbekistan">Ouzbékistan</option>
						<option value="pakistan">Pakistan</option>
						<option value="philippines">Philippines</option>
						<option value="qatar">Qatar</option>
						<option value="singapour">Singapour</option>
						<option value="sriLanka">Sri Lanka</option>
						<option value="syrie">Syrie</option>
						<option value="tadjikistan">Tadjikistan</option>
						<option value="taiwan">Taïwan</option>
						<option value="thailande">Thaïlande</option>
						<option value="timorOriental">Timor oriental</option>
						<option value="turkmenistan">Turkménistan</option>
						<option value="turquie">Turquie</option>
						<option value="vietNam">Viêt Nam</option>
						<option value="yemen">Yemen</option>
					</optgroup>
					<optgroup label="Europe">
						<option value="allemagne">Allemagne</option>
						<option value="albanie">Albanie</option>
						<option value="andorre">Andorre</option>
						<option value="autriche">Autriche</option>
						<option value="bielorussie">Biélorussie</option>
						<option value="belgique">Belgique</option>
						<option value="bosnieHerzegovine">Bosnie-Herzégovine</option>
						<option value="bulgarie">Bulgarie</option>
						<option value="croatie">Croatie</option>
						<option value="danemark">Danemark</option>
						<option value="espagne">Espagne</option>
						<option value="estonie">Estonie</option>
						<option value="finlande">Finlande</option>
						<option value="france">France</option>
						<option value="grece">Grèce</option>
						<option value="hongrie">Hongrie</option>
						<option value="irlande">Irlande</option>
						<option value="islande">Islande</option>
						<option value="italie">Italie</option>
						<option value="lettonie">Lettonie</option>
						<option value="liechtenstein">Liechtenstein</option>
						<option value="lituanie">Lituanie</option>
						<option value="luxembourg">Luxembourg</option>
						<option value="exRepubliqueYougoslaveDeMacedoine">Ex-République Yougoslave de Macédoine</option>
						<option value="malte">Malte</option>
						<option value="moldavie">Moldavie</option>
						<option value="monaco">Monaco</option>
						<option value="norvege">Norvège</option>
						<option value="paysBas">Pays-Bas</option>
						<option value="pologne">Pologne</option>
						<option value="portugal">Portugal</option>
						<option value="roumanie">Roumanie</option>
						<option value="royaumeUni">Royaume-Uni</option>
						<option value="russie">Russie</option>
						<option value="saintMarin">Saint-Marin</option>
						<option value="serbieEtMontenegro">Serbie-et-Monténégro</option>
						<option value="slovaquie">Slovaquie</option>
						<option value="slovenie">Slovénie</option>
						<option value="suede">Suède</option>
						<option value="suisse">Suisse</option>
						<option value="republiqueTcheque">République Tchèque</option>
						<option value="ukraine">Ukraine</option>
						<option value="vatican">Vatican</option>
					</optgroup>
					<optgroup label="Océanie">
						<option value="australie">Australie</option>
						<option value="fidji">Fidji</option>
						<option value="kiribati">Kiribati</option>
						<option value="marshall">Marshall</option>
						<option value="micronesie">Micronésie</option>
						<option value="nauru">Nauru</option>
						<option value="nouvelleZelande">Nouvelle-Zélande</option>
						<option value="palaos">Palaos</option>
						<option value="papouasieNouvelleGuinee">Papouasie-Nouvelle-Guinée</option>
						<option value="salomon">Salomon</option>
						<option value="samoa">Samoa</option>
						<option value="tonga">Tonga</option>
						<option value="tuvalu">Tuvalu</option>
						<option value="vanuatu">Vanuatu</option>
					</optgroup>
				</select>
			</p>
-->
<!--Régions -->
			<p>
				<select name="departement" required>
					<option value="0"> -- Sélectionner votre Département -- </option>
					<option value="Ain" <?php if ($_POST['departement']=="Ain"){?> selected <?php }?> >01 - Ain</option>
					<option value="Aisne">02 - Aisne</option>
					<option value="Allier">03 - Allier</option>
					<option value="Alpes-de-Haute-Provence">04 - Alpes-de-Haute-Provence</option>
					<option value="Hautes-Alpes">05 - Hautes-Alpes</option>
					<option value="Alpes-Maritimes">06 - Alpes-Maritimes</option>
					<option value="Ardeche">07 - Ardeche</option>
					<option value="Ardennes">08 - Ardennes</option>
					<option value="Ariege">09 - Ariege</option>
					<option value="Aube">10 - Aube</option>
					<option value="Aude">11 - Aude</option>
					<option value="Aveyron">12 - Aveyron</option>
					<option value="Bouches-du-Rhone">13 - Bouches-du-Rhone</option>
					<option value="Calvados">14 - Calvados</option>
					<option value="Cantal">15 - Cantal</option>
					<option value="Charente">16 - Charente</option>
					<option value="Charente-Maritime">17 - Charente-Maritime</option>
					<option value="Cher">18 - Cher</option>
					<option value="Correze">19 - Correze</option>
					<option value="Corse-du-Sud">2A - Corse-du-Sud</option>
					<option value="Haute-Corse">2B - Haute-Corse</option>
					<option value="Cote-d'Or">21 - Cote-d'Or</option>
					<option value="Cotes-d'Armor">22 - Cotes-d'Armor</option>
					<option value="Creuse">23 - Creuse</option>
					<option value="Dordogne">24 - Dordogne</option>
					<option value="Doubs">25 - Doubs</option>
					<option value="Drome">26 - Drome</option>
					<option value="Eure">27 - Eure</option>
					<option value="Eure-et-Loir">28 - Eure-et-Loir</option>
					<option value="Finistere">29 - Finistere</option>
					<option value="Gard">30 - Gard</option>
					<option value="Haute-Garonne">31 - Haute-Garonne</option>
					<option value="Gers">32 - Gers</option>
					<option value="Gironde">33 - Gironde</option>
					<option value="Herault">34 - Herault</option>
					<option value="Ille-et-Vilaine">35 - Ille-et-Vilaine</option>
					<option value="Indre">36 - Indre</option>
					<option value="Indre-et-Loire">37 - Indre-et-Loire</option>
					<option value="Isere">38 - Isere</option>
					<option value="Jura">39 - Jura</option>
					<option value="Landes">40 - Landes</option>
					<option value="Loir-et-Cher">41 - Loir-et-Cher</option>
					<option value="Loire">42 - Loire</option>
					<option value="Haute-Loire">43 - Haute-Loire</option>
					<option value="Loire-Atlantique">44 - Loire-Atlantique</option>
					<option value="Loiret">45 - Loiret</option>
					<option value="Lot">46 - Lot</option>
					<option value="Lot-et-Garonne">47 - Lot-et-Garonne</option>
					<option value="Lozere">48 - Lozere</option>
					<option value="Maine-et-Loire">49 - Maine-et-Loire</option>
					<option value="Manche">50 - Manche</option>
					<option value="Marne">51 - Marne</option>
					<option value="Haute-Marne">52 - Haute-Marne</option>
					<option value="Mayenne">53 - Mayenne</option>
					<option value="Meurthe-et-Moselle">54 - Meurthe-et-Moselle</option>
					<option value="Meuse">55 - Meuse</option>
					<option value="Morbihan">56 - Morbihan</option>
					<option value="Moselle">57 - Moselle</option>
					<option value="Nievre">58 - Nievre</option>
					<option value="Nord">59 - Nord</option>
					<option value="Oise">60 - Oise</option>
					<option value="Orne">61 - Orne</option>
					<option value="Pas-de-Calais">62 - Pas-de-Calais</option>
					<option value="Puy-de-Dome">63 - Puy-de-Dome</option>
					<option value="Pyrenees-Atlantiques">64 - Pyrenees-Atlantiques</option>
					<option value="Hautes-Pyrenees">65 - Hautes-Pyrenees</option>
					<option value="Pyrenees-Orientales">66 - Pyrenees-Orientales</option>
					<option value="Bas-Rhin">67 - Bas-Rhin</option>
					<option value="Haut-Rhin">68 - Haut-Rhin</option>
					<option value="Rhone">69 - Rhone</option>
					<option value="Haute-Saone">70 - Haute-Saone</option>
					<option value="Saone-et-Loire">71 - Saone-et-Loire</option>
					<option value="Sarthe">72 - Sarthe</option>
					<option value="Savoie">73 - Savoie</option>
					<option value="Haute-Savoie">74 - Haute-Savoie</option>
					<option value="Paris">75 - Paris</option>
					<option value="Seine-Maritime">76 - Seine-Maritime</option>
					<option value="Seine-et-Marne">77 - Seine-et-Marne</option>
					<option value="Yvelines">78 - Yvelines</option>
					<option value="Deux-Sevres">79 - Deux-Sevres</option>
					<option value="Somme">80 - Somme</option>
					<option value="Tarn">81 - Tarn</option>
					<option value="Tarn-et-Garonne">82 - Tarn-et-Garonne</option>
					<option value="Var">83 - Var</option>
					<option value="Vaucluse">84 - Vaucluse</option>
					<option value="Vendee<">85 - Vendee</option>
					<option value="Vienne">86 - Vienne</option>
					<option value="Haute-Vienne">87 - Haute-Vienne</option>
					<option value="Vosges">88 - Vosges</option>
					<option value="Yonne">89 - Yonne</option>
					<option value="Territoire de Belfort">90 - Territoire de Belfort</option>
					<option value="Essonne">91 - Essonne</option>
					<option value="Hauts-de-Seine">92 - Hauts-de-Seine</option>
					<option value="Seine-Saint-Denis">93 - Seine-Saint-Denis</option>
					<option value="Val-de-Marne">94 - Val-de-Marne</option>
					<option value="Val-d'Oise">95 - Val-d'Oise</option>
					<option value="Guadeloupe">971 - Guadeloupe</option>
					<option value="Martinique">972 - Martinique</option>
					<option value="Guyane">973 - Guyane</option>
					<option value="Réunion">974 - Réunion</option>
					<option value="Saint-Pierre-et-Miquelon">975 - Saint-Pierre-et-Miquelon</option>
					<option value="Terres-australes-et-antarctiques-françaises">984 - Terres-australes-et-antarctiques-françaises</option>
					<option value="Mayotte">985 - Mayotte</option>
					<option value="Wallis-et-Futuna">986 - Wallis-et-Futuna</option>
					<option value="Polynesie-française">987 - Polynesie-française</option>
					<option value="Nouvelle-Caledonie">988 - Nouvelle-Caledonie</option>
				</select>
			</p>
			<p> <input type="text" name="Pseudo" placeholder="Pseudo" size="25" value = "<?= $_POST['Pseudo'] ?>"/> </p>
			<p> <input type="password" name="MotDePasse" placeholder="Mot De Passe" size="25" value = "<? if ($_POST['MotDePasse'] == $_POST['ConfirmMotDePasse']){echo $_POST['MotDePasse'];} ?>"/> </p>
			<p> <input type="password" name="ConfirmMotDePasse" placeholder="Confirmation Mot De Passe" size="25" value = "<? if ($_POST['MotDePasse'] == $_POST['ConfirmMotDePasse']){echo $_POST['ConfirmMotDePasse'];} ?>"/> </p>
			<p> <input name="Envoyer" type="submit" value="Envoyer" > </p>
		</form>
	</body>
</html>
