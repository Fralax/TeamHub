<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="Contenu/vueAccueil.css" />
	<title>Inscription</title>
</head>

<body>

<?php
	if(isset($_SESSION['pseudo'])){
		$i = 1;
	} else{
		$i = 2;
	}
?>

<?php if ($i == 1){ ?>
	<div class="calendrier">
		<script type="text/javascript">
			<!--
			var d = new Date();
			var dm = d.getMonth() + 1;
			var dan = d.getYear();
			if(dan < 999) dan+=1900;
			calendrier(dm,dan);

			function calendrier(mois,an) {
			nom_mois = new Array
			("Janvier","F&eacute;vrier","Mars","Avril","Mai","Juin","Juillet",
			"Ao&ucirc;t","Septembre","Octobre","Novembre","D&eacute;cembre");
			jour = new Array ("Lu","Ma","Me","Je","Ve","Sa","Di");

			var police_entete = "sans-serif;"; /* police entête de calendrier  */
			var taille_pol_entete = 3;           /* taille de police 1-7 entête de calendrier  */
			var couleur_pol_entete = "#FFFF00";     /* couleur de police entête de calendrier  */
			var arrplan_entete = "#000066";        /* couleur d'arrière plan entête de calendrier  */
			var police_jours = "sans-serif;"; /* police affichage des jours  */
			var taille_pol_jours = 3;           /* taille de police 1-7 affichage des jours  */
			var coul_pol_jours = "#000000";     /* couleur de police affichage des jours  */
			var arrplan_jours = "#D0F0F0";        /* couleur d'arrière plan affichage des jours  */
			var couleur_dim = "#E00000";        /* couleur de police pour dimanches  */
			var couleur_cejour = "#FFFF00";        /* couleur d'arrière plan pour aujourd'hui  */

			var maintenant = new Date();
			var ce_mois = maintenant.getMonth() + 1;
			var cette_annee = maintenant.getYear();
			if(cette_annee < 999) cette_annee+=1900;
			var ce_jour = maintenant.getDate();
			var temps = new Date(an,mois-1,1);
			var Start = temps.getDay();
			if(Start > 0) Start--;
			else Start = 6;
			var Stop = 31;
			if(mois==4 ||mois==6 || mois==9 || mois==11 ) --Stop;
			if(mois==2) {
			 Stop = Stop - 3;
			 if(an%4==0) Stop++;
			 if(an%100==0) Stop--;
			 if(an%400==0) Stop++;
			}
			document.write('<table border="3" cellpadding="1" cellspacing="1">');
			var entete_mois = nom_mois[mois-1] + " " + an;
			inscrit_entete(entete_mois,arrplan_entete,couleur_pol_entete,taille_pol_entete,police_entete);
			var nombre_jours = 1;
			for(var i=0;i<=5;i++) {
			  document.write("<tr>");
			  for(var j=0;j<=5;j++) {
			    if((i==0)&&(j < Start))
			     inscrit_cellule("&#160;",arrplan_jours,coul_pol_jours,taille_pol_jours,police_jours);
			    else {
			      if(nombre_jours > Stop)
			        inscrit_cellule("&#160;",arrplan_jours,coul_pol_jours,taille_pol_jours,police_jours);
			      else {
			        if((an==cette_annee)&&(mois==ce_mois)&&(nombre_jours==ce_jour))
			         inscrit_cellule(nombre_jours,couleur_cejour,coul_pol_jours,taille_pol_jours,police_jours);
			        else
			         inscrit_cellule(nombre_jours,arrplan_jours,coul_pol_jours,taille_pol_jours,police_jours);
			        nombre_jours++;
			        }
			      }
			    }
			    if(nombre_jours > Stop)
			      inscrit_cellule("&#160;",arrplan_jours,couleur_dim,taille_pol_jours,police_jours);
			    else {
			      if((an==cette_annee)&&(mois==ce_mois)&&(nombre_jours==ce_jour))
			        inscrit_cellule(nombre_jours,couleur_cejour,couleur_dim,taille_pol_jours,police_jours);
			      else
			        inscrit_cellule(nombre_jours,arrplan_jours,couleur_dim,taille_pol_jours,police_jours);
			      nombre_jours++;
			    }
			    document.write("<\/tr>");
			  }
			document.write("<\/table>");
			}

			function inscrit_entete(titre_mois,couleurAP,couleurpolice,taillepolice,police) {
			document.write("<tr>");
			document.write('<td align="center" colspan="7" valign="middle" bgcolor="'+couleurAP+'">');
			document.write('<font size="'+taillepolice+'" color="'+couleurpolice+'" face="'+police+'"><b>');
			document.write(titre_mois);
			document.write("<\/b><\/font><\/td><\/tr>");
			document.write("<tr>");
			for(var i=0;i<=6;i++)
			  inscrit_cellule(jour[i],couleurAP,couleurpolice,taillepolice,police);
			document.write("<\/tr>");
			}

			function inscrit_cellule(contenu,couleurAP,couleurpolice,taillepolice,police) {
			document.write('<td align="center" valign="middle" bgcolor="'+couleurAP+'">');
			document.write('<font size="'+taillepolice+'" color="'+couleurpolice+'" face="'+police+'"><b>');
			document.write(contenu);
			document.write("<\/b><\/font><\/td>");
			}
			//-->
		</script>
	</div>

	<div class="mesGroupes">
		<h3> Mes Groupes </h3>
		<table>
			<?php foreach ($groupesAdmin as list($nomMesGroupeAdmin)) { ?>
					<tr>
						<td>
							<a href="index.php?page=groupe&nom=<?php echo $nomMesGroupeAdmin?>"> <?php echo $nomMesGroupeAdmin?> </a>
						</td>
					</tr>

			<?php } ?>
			<?php foreach ($groupes as list($nomMesGroupe)) { ?>
				<tr>
					<td>
						<a href="index.php?page=groupe&nom=<?php echo $nomMesGroupe?>"> <?php echo $nomMesGroupe?> </a>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
<?php } ?>

<?php if ($i == 2){ ?>
	<body>
	</body>
<?php } ?>




        <thead>
            <tr style="border-bottom:1px solid black;">
                <th id="title" colspan="2">Modifier mes informations personnelles</th>
            </tr>

        </thead>
        <tr></tr><tr></tr>
        <tr><<td>Coordonnées : </td><td><INPUT type="submit" name="modif_coordonnees" value="Modifier mes coordonnées"/></td></tr>
        <tr><td><?php echo $a[3] ?></td></tr>
        <tr><td><?php echo $a[8] ?></td></tr>
        <tr><td><?php echo $a[6] ?></td></tr>
        <tr><td><?php echo $a[7] ?></td></tr>
        <tr><td><?php echo $a[5] ?></td></tr>
        <tr></tr><tr></tr>
        <tr><td>Adresse mail : </td><td><INPUT type="submit" name="modif_mail" value="Modifier mon adresse mail"/></td></tr>
        <tr><td><?php echo $a[2] ?></td></tr>
          <tr></tr><tr></tr>
        <tr><td>Mot de passe : </td><td><INPUT type="submit" name="modif_mdp" value="Modifier le mot de passe"/></td></tr>
