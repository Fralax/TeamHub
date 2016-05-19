<!DOCTYPE html>

<?php $this->titre = "Modifier Mon Adresse"; ?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Modifier Mon Adresse</title>
	</head>
	<body>
		<p> </p>
		<h2>Modifier Mon Adresse</h2>


		<form  name = "formulaireModifMonAdresse" method="post" action = "">

			<p>
				<select name="Departement" required>
					<option value=""> -- Sélectionner votre Département -- </option>
					<option value="Ain" <?php if ($infos[u_region]=="Ain"){?> selected <?php }?> >01 - Ain</option>
					<option value="Aisne" <?php if ($infos[u_region]=="Aisne"){?> selected <?php }?>>02 - Aisne</option>
					<option value="Allier" <?php if ($infos[u_region]=="Allier"){?> selected <?php }?>>03 - Allier</option>
					<option value="Alpes-de-Haute-Provence" <?php if ($infos[u_region]=="Alpes-de-Haute-Provence"){?> selected <?php }?>>04 - Alpes-de-Haute-Provence</option>
					<option value="Hautes-Alpes" <?php if ($infos[u_region]=="Hautes-Alpes"){?> selected <?php }?>>05 - Hautes-Alpes</option>
					<option value="Alpes-Maritimes" <?php if ($infos[u_region]=="Alpes-Maritimes"){?> selected <?php }?>>06 - Alpes-Maritimes</option>
					<option value="Ardeche" <?php if ($infos[u_region]=="Ardeche"){?> selected <?php }?>>07 - Ardeche</option>
					<option value="Ardennes" <?php if ($infos[u_region]=="Ardennes"){?> selected <?php }?>>08 - Ardennes</option>
					<option value="Ariege" <?php if ($infos[u_region]=="Ariege"){?> selected <?php }?>>09 - Ariege</option>
					<option value="Aube" <?php if ($infos[u_region]=="Aube"){?> selected <?php }?>>10 - Aube</option>
					<option value="Aude" <?php if ($infos[u_region]=="Aude"){?> selected <?php }?>>11 - Aude</option>
					<option value="Aveyron" <?php if ($infos[u_region]=="Aveyron"){?> selected <?php }?>>12 - Aveyron</option>
					<option value="Bouches-du-Rhone" <?php if ($infos[u_region]=="Bouches-du-Rhone"){?> selected <?php }?>>13 - Bouches-du-Rhone</option>
					<option value="Calvados" <?php if ($infos[u_region]=="Calvados"){?> selected <?php }?>>14 - Calvados</option>
					<option value="Cantal" <?php if ($infos[u_region]=="Cantal"){?> selected <?php }?>>15 - Cantal</option>
					<option value="Charente" <?php if ($infos[u_region]=="Charente"){?> selected <?php }?>>16 - Charente</option>
					<option value="Charente-Maritime" <?php if ($infos[u_region]=="Charente-Maritime"){?> selected <?php }?>>17 - Charente-Maritime</option>
					<option value="Cher"<?php if ($infos[u_region]=="Cher"){?> selected <?php }?> >18 - Cher</option>
					<option value="Correze" <?php if ($infos[u_region]=="Correze"){?> selected <?php }?>>19 - Correze</option>
					<option value="Corse-du-Sud" <?php if ($infos[u_region]=="Corse-du-Sud"){?> selected <?php }?>>2A - Corse-du-Sud</option>
					<option value="Haute-Corse" <?php if ($infos[u_region]=="Haute-Corse"){?> selected <?php }?>>2B - Haute-Corse</option>
					<option value="Cote-d'Or" <?php if ($infos[u_region]=="Cote-d'Or"){?> selected <?php }?>>21 - Cote-d'Or</option>
					<option value="Cotes-d'Armor" <?php if ($infos[u_region]=="Cotes-d'Armor"){?> selected <?php }?>>22 - Cotes-d'Armor</option>
					<option value="Creuse" <?php if ($infos[u_region]=="Creuse"){?> selected <?php }?>>23 - Creuse</option>
					<option value="Dordogne" <?php if ($infos[u_region]=="Dordogne"){?> selected <?php }?>>24 - Dordogne</option>
					<option value="Doubs" <?php if ($infos[u_region]=="Doubs"){?> selected <?php }?>>25 - Doubs</option>
					<option value="Drome" <?php if ($infos[u_region]=="Drome"){?> selected <?php }?>>26 - Drome</option>
					<option value="Eure" <?php if ($infos[u_region]=="Eure"){?> selected <?php }?>>27 - Eure</option>
					<option value="Eure-et-Loir" <?php if ($infos[u_region]=="Eure-et-Loir"){?> selected <?php }?>>28 - Eure-et-Loir</option>
					<option value="Finistere" <?php if ($infos[u_region]=="Finistere"){?> selected <?php }?>>29 - Finistere</option>
					<option value="Gard" <?php if ($infos[u_region]=="Gard"){?> selected <?php }?>>30 - Gard</option>
					<option value="Haute-Garonne" <?php if ($infos[u_region]=="Haute-Garonne"){?> selected <?php }?>>31 - Haute-Garonne</option>
					<option value="Gers" <?php if ($infos[u_region]=="Gers"){?> selected <?php }?>>32 - Gers</option>
					<option value="Gironde" <?php if ($infos[u_region]=="Gironde"){?> selected <?php }?>>33 - Gironde</option>
					<option value="Herault" <?php if ($infos[u_region]=="Herault"){?> selected <?php }?>>34 - Herault</option>
					<option value="Ille-et-Vilaine" <?php if ($infos[u_region]=="Ille-et-Vilaine"){?> selected <?php }?>>35 - Ille-et-Vilaine</option>
					<option value="Indre" <?php if ($infos[u_region]=="Indre"){?> selected <?php }?>>36 - Indre</option>
					<option value="Indre-et-Loire" <?php if ($infos[u_region]=="Indre-et-Loire"){?> selected <?php }?>>37 - Indre-et-Loire</option>
					<option value="Isere" <?php if ($infos[u_region]=="Isere"){?> selected <?php }?>>38 - Isere</option>
					<option value="Jura" <?php if ($infos[u_region]=="Jura"){?> selected <?php }?>>39 - Jura</option>
					<option value="Landes" <?php if ($infos[u_region]=="Landes"){?> selected <?php }?>>40 - Landes</option>
					<option value="Loir-et-Cher" <?php if ($infos[u_region]=="Loir-et-Cher"){?> selected <?php }?>>41 - Loir-et-Cher</option>
					<option value="Loire" <?php if ($infos[u_region]=="Loire"){?> selected <?php }?>>42 - Loire</option>
					<option value="Haute-Loire" <?php if ($infos[u_region]=="Haute-Loire"){?> selected <?php }?>>43 - Haute-Loire</option>
					<option value="Loire-Atlantique" <?php if ($infos[u_region]=="Loire-Atlantique"){?> selected <?php }?>>44 - Loire-Atlantique</option>
					<option value="Loiret" <?php if ($infos[u_region]=="Loiret"){?> selected <?php }?>>45 - Loiret</option>
					<option value="Lot" <?php if ($infos[u_region]=="Lot"){?> selected <?php }?> >46 - Lot</option>
					<option value="Lot-et-Garonne" <?php if ($infos[u_region]=="Lot-et-Garonne"){?> selected <?php }?>>47 - Lot-et-Garonne</option>
					<option value="Lozere" <?php if ($infos[u_region]=="Lozere"){?> selected <?php }?>>48 - Lozere</option>
					<option value="Maine-et-Loire" <?php if ($infos[u_region]=="Maine-et-Loire"){?> selected <?php }?>>49 - Maine-et-Loire</option>
					<option value="Manche" <?php if ($infos[u_region]=="Manche"){?> selected <?php }?>>50 - Manche</option>
					<option value="Marne" <?php if ($infos[u_region]=="Marne"){?> selected <?php }?>>51 - Marne</option>
					<option value="Haute-Marne" <?php if ($infos[u_region]=="Haute-Marne"){?> selected <?php }?>>52 - Haute-Marne</option>
					<option value="Mayenne" <?php if ($infos[u_region]=="Mayenne"){?> selected <?php }?>>53 - Mayenne</option>
					<option value="Meurthe-et-Moselle" <?php if ($infos[u_region]=="Meurthe-et-Moselle"){?> selected <?php }?>>54 - Meurthe-et-Moselle</option>
					<option value="Meuse" <?php if ($infos[u_region]=="Meuse"){?> selected <?php }?>>55 - Meuse</option>
					<option value="Morbihan" <?php if ($infos[u_region]=="Morbihan"){?> selected <?php }?>>56 - Morbihan</option>
					<option value="Moselle" <?php if ($infos[u_region]=="Moselle"){?> selected <?php }?>>57 - Moselle</option>
					<option value="Nievre" <?php if ($infos[u_region]=="Nievre"){?> selected <?php }?>>58 - Nievre</option>
					<option value="Nord" <?php if ($infos[u_region]=="Nord"){?> selected <?php }?>>59 - Nord</option>
					<option value="Oise" <?php if ($infos[u_region]=="Oise"){?> selected <?php }?>>60 - Oise</option>
					<option value="Orne" <?php if ($infos[u_region]=="Orne"){?> selected <?php }?>>61 - Orne</option>
					<option value="Pas-de-Calais" <?php if ($infos[u_region]=="Pas-de-Calais"){?> selected <?php }?>>62 - Pas-de-Calais</option>
					<option value="Puy-de-Dome" <?php if ($infos[u_region]=="Puy-de-Dome"){?> selected <?php }?>>63 - Puy-de-Dome</option>
					<option value="Pyrenees-Atlantiques" <?php if ($infos[u_region]=="Pyrenees-Atlantiques"){?> selected <?php }?>>64 - Pyrenees-Atlantiques</option>
					<option value="Hautes-Pyrenees" <?php if ($infos[u_region]=="Hautes-Pyrenees"){?> selected <?php }?>>65 - Hautes-Pyrenees</option>
					<option value="Pyrenees-Orientales" <?php if ($infos[u_region]=="Pyrenees-Orientales"){?> selected <?php }?>>66 - Pyrenees-Orientales</option>
					<option value="Bas-Rhin" <?php if ($infos[u_region]=="Bas-Rhin"){?> selected <?php }?>>67 - Bas-Rhin</option>
					<option value="Haut-Rhin" <?php if ($infos[u_region]=="Bas-Rhin"){?> selected <?php }?>>68 - Haut-Rhin</option>
					<option value="Rhone" <?php if ($infos[u_region]=="Rhone"){?> selected <?php }?>>69 - Rhone</option>
					<option value="Haute-Saone" <?php if ($infos[u_region]=="Haute-Saone"){?> selected <?php }?>>70 - Haute-Saone</option>
					<option value="Saone-et-Loire" <?php if ($infos[u_region]=="Saone-et-Loire"){?> selected <?php }?>>71 - Saone-et-Loire</option>
					<option value="Sarthe" <?php if ($infos[u_region]=="Sarthe"){?> selected <?php }?>>72 - Sarthe</option>
					<option value="Savoie" <?php if ($infos[u_region]=="Savoie"){?> selected <?php }?>>73 - Savoie</option>
					<option value="Haute-Savoie" <?php if ($infos[u_region]=="Haute-Savoie"){?> selected <?php }?>>74 - Haute-Savoie</option>
					<option value="Paris" <?php if ($infos[u_region]=="Paris"){?> selected <?php }?>>75 - Paris</option>
					<option value="Seine-Maritime" <?php if ($infos[u_region]=="Seine-Maritime"){?> selected <?php }?>>76 - Seine-Maritime</option>
					<option value="Seine-et-Marne" <?php if ($infos[u_region]=="Seine-et-Marne"){?> selected <?php }?>>77 - Seine-et-Marne</option>
					<option value="Yvelines" <?php if ($infos[u_region]=="Yvelines"){?> selected <?php }?>>78 - Yvelines</option>
					<option value="Deux-Sevres" <?php if ($infos[u_region]=="Deux-Sevres"){?> selected <?php }?>>79 - Deux-Sevres</option>
					<option value="Somme" <?php if ($infos[u_region]=="Somme"){?> selected <?php }?>>80 - Somme</option>
					<option value="Tarn" <?php if ($infos[u_region]=="Tarn"){?> selected <?php }?>>81 - Tarn</option>
					<option value="Tarn-et-Garonne" <?php if ($infos[u_region]=="Tarn-et-Garonne"){?> selected <?php }?>>82 - Tarn-et-Garonne</option>
					<option value="Var" <?php if ($infos[u_region]=="Var"){?> selected <?php }?>>83 - Var</option>
					<option value="Vaucluse" <?php if ($infos[u_region]=="Vaucluse"){?> selected <?php }?>>84 - Vaucluse</option>
					<option value="Vendee<" <?php if ($infos[u_region]=="Vendee"){?> selected <?php }?>>85 - Vendee</option>
					<option value="Vienne" <?php if ($infos[u_region]=="Vienne"){?> selected <?php }?>>86 - Vienne</option>
					<option value="Haute-Vienne" <?php if ($infos[u_region]=="Haute-Vienne"){?> selected <?php }?>>87 - Haute-Vienne</option>
					<option value="Vosges" <?php if ($infos[u_region]=="Vosges"){?> selected <?php }?>>88 - Vosges</option>
					<option value="Yonne" <?php if ($infos[u_region]=="Yonne"){?> selected <?php }?>>89 - Yonne</option>
					<option value="Territoire de Belfort" <?php if ($infos[u_region]=="Territoire de Belfort"){?> selected <?php }?>>90 - Territoire de Belfort</option>
					<option value="Essonne" <?php if ($infos[u_region]=="Essonne"){?> selected <?php }?>>91 - Essonne</option>
					<option value="Hauts-de-Seine" <?php if ($infos[u_region]=="Hauts-de-Seine"){?> selected <?php }?>>92 - Hauts-de-Seine</option>
					<option value="Seine-Saint-Denis" <?php if ($infos[u_region]=="Seine-Saint-Denis"){?> selected <?php }?>>93 - Seine-Saint-Denis</option>
					<option value="Val-de-Marne" <?php if ($infos[u_region]=="Val-de-Marne"){?> selected <?php }?>>94 - Val-de-Marne</option>
					<option value="Val-d'Oise" <?php if ($infos[u_region]=="Val-d'Oise"){?> selected <?php }?>>95 - Val-d'Oise</option>
					<option value="Guadeloupe" <?php if ($infos[u_region]=="Guadeloupe"){?> selected <?php }?>>971 - Guadeloupe</option>
					<option value="Martinique" <?php if ($infos[u_region]=="Martinique"){?> selected <?php }?>>972 - Martinique</option>
					<option value="Guyane" <?php if ($infos[u_region]=="Guyane"){?> selected <?php }?>>973 - Guyane</option>
					<option value="Réunion" <?php if ($infos[u_region]=="Réunion"){?> selected <?php }?>>974 - Réunion</option>
					<option value="Saint-Pierre-et-Miquelon" <?php if ($infos[u_region]=="Saint-Pierre-et-Miquelon"){?> selected <?php }?>>975 - Saint-Pierre-et-Miquelon</option>
					<option value="Terres-australes-et-antarctiques-françaises" <?php if ($infos[u_region]=="Terres-australes-et-antarctiques-françaises"){?> selected <?php }?>>984 - Terres-australes-et-antarctiques-françaises</option>
					<option value="Mayotte" <?php if ($infos[u_region]=="Mayotte"){?> selected <?php }?>>985 - Mayotte</option>
					<option value="Wallis-et-Futuna" <?php if ($infos[u_region]=="Wallis-et-Futuna"){?> selected <?php }?>>986 - Wallis-et-Futuna</option>
					<option value="Polynesie-française" <?php if ($infos[u_region]=="Polynesie-française"){?> selected <?php }?>>987 - Polynesie-française</option>
					<option value="Nouvelle-Caledonie" <?php if ($infos[u_region]=="Nouvelle-Caledonie"){?> selected <?php }?>>988 - Nouvelle-Caledonie</option>

				</select>
			</p>

			<p> <input name="Envoyer" type="submit" value="Envoyer"> </p>
		</form>
	</body>
</html>
