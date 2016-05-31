<?php $this->titre = "Forum - Accueil";
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>
<?php $forum = new forum() ?>
	<body>
		<div class="titreAccueilForum">
			<h2> <?php echo $bienvenue ?></h2>
		</div>

		<div class="conteneurAccueilForum">

			<!-- DISCUSSION GENERALE -->
			<table class="discussionGeneraleAccueilForum">

				<thead class="enTeteAccueilForum">
					<tr>
						<th class="titreCategorieAccueilForum">
							<h3> <?php echo $forum1entete1 ?></h3>
						</th>
						<th class="nbrSujetsAccueilForum">
							 <?php echo $forum1entete2 ?>
						</th>
						<th class="nbrMessagesAccueilForum">
							 <?php echo $forum1entete3 ?>
						</th>
						<th class="dernierMessageAccueilForum">
							 <?php echo $forum1entete4 ?>
						</th>
					</tr>
				</thead>

				<tr>
					<?php $nbrSujets = $forum->recupSujetsAccueil("Discussion Générale")->fetch() ?>
					<?php $nbrMessages = $forum->recupMessagesAccueil("Discussion Générale")->fetch() ?>
					<?php $dernierMessage = $forum->recupDernierMessageAccueil("Discussion Générale")->fetch(); ?>
					<?php $dernierSujet = $forum->recupDernierSujetAccueil("Discussion Générale")->fetch(); ?>
					<td class="nomCategorieAccueilForum">
						<a href="index.php?page=forum&categorie=Discussion Générale"> <?php echo $nomforum1 ?></a>
					</td>
					<td class="nbrSujetsAccueilForum" rowspan = "2">
						<?php echo $nbrSujets[0] ?>
					</td>
					<td class="nbrMessagesAccueilForum" rowspan = "2">
						<?php echo $nbrMessages[0] ?>
					</td>
					<td class="dernierMessageAccueilForum" rowspan = "2">
						<?php if($dernierMessage != array()){ ?>
							<div class="dernierMessageSujetAccueilForum">
								<?php echo $dans ?> <a href="index.php?page=sujetforum&id=<?php echo $dernierSujet['f_id']?>"><?php echo $dernierSujet['f_sujet']?></a>
							</div>
							<div class="dernierMessageAuteurAccueilForum">
								<?php $dateEntiereSujet = date_create($dernierMessage['m_date']) ?>
		            <?php $dateSujet = date_format($dateEntiereSujet, 'd/m/Y') ?>
		            <?php $heureSujet = date_format($dateEntiereSujet, 'H:i:s') ?>
								<?php echo $par ?> <a href="index.php?page=profil&nom=<?php echo $dernierMessage['m_auteur'] ?>"><?php echo $dernierMessage['m_auteur'] ?></a> le <b><?php echo $dateSujet ?></b> à <b><?php echo $heureSujet ?></b>
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="descriptionAccueilForum">
						<?php echo $discuforum ?>
					</td>
				</tr>

				<tr>
					<?php $nbrSujets = $forum->recupSujetsAccueil("Suggestions")->fetch() ?>
					<?php $nbrMessages = $forum->recupMessagesAccueil("Suggestions")->fetch() ?>
					<?php $dernierMessage = $forum->recupDernierMessageAccueil("Suggestions")->fetch(); ?>
					<?php $dernierSujet = $forum->recupDernierSujetAccueil("Suggestions")->fetch(); ?>
					<td class="nomCategorieAccueilForum">
						<a href="index.php?page=forum&categorie=Suggestions"> <?php echo $nomforum2 ?></a>
					</td>
					<td class="nbrSujetsAccueilForum" rowspan = "2">
						<?php echo $nbrSujets[0] ?>
					</td>
					<td class="nbrMessagesAccueilForum" rowspan = "2">
						<?php echo $nbrMessages[0] ?>
					</td>
					<td class="dernierMessageAccueilForum" rowspan = "2">
						<?php if($dernierMessage != array()){ ?>
							<div class="dernierMessageSujetAccueilForum">
								<?php echo $dans ?> <a href="index.php?page=sujetforum&id=<?php echo $dernierSujet['f_id']?>"><?php echo $dernierSujet['f_sujet']?></a>
							</div>
							<div class="dernierMessageAuteurAccueilForum">
								<?php $dateEntiereSujet = date_create($dernierMessage['m_date']) ?>
		            <?php $dateSujet = date_format($dateEntiereSujet, 'd/m/Y') ?>
		            <?php $heureSujet = date_format($dateEntiereSujet, 'H:i:s') ?>
								<?php echo $par ?> <a href="index.php?page=profil&nom=<?php echo $dernierMessage['m_auteur'] ?>"><?php echo $dernierMessage['m_auteur'] ?></a> <?php echo $le ?> <b><?php echo $dateSujet ?></b> <?php echo $a ?> <b><?php echo $heureSujet ?></b>
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="descriptionAccueilForum">
						<?php echo $sugesforum ?>
					</td>
				</tr>
			</table>

			<!-- AUTOUR DES GROUPES -->
			<table class="autourDesGroupesAccueilForum">
				<thead class="enTeteAccueilForum">
					<tr>
						<th class="titreCategorieAccueilForum">
							<h3> <?php echo $forum2entete1 ?></h3>
						</th>
						<th class="nbrSujetsAccueilForum">
							<?php echo $forum1entete2 ?>
						</th>
						<th class="nbrMessagesAccueilForum">
							<?php echo $forum1entete3 ?>
						</th>
						<th class="dernierMessageAccueilForum">
							<?php echo $forum1entete4 ?>
						</th>
					</tr>
				</thead>

				<tr>
					<?php $nbrSujets = $forum->recupSujetsAccueil("Parlez de votre Groupe !")->fetch() ?>
					<?php $nbrMessages = $forum->recupMessagesAccueil("Parlez de votre Groupe !")->fetch() ?>
					<?php $dernierMessage = $forum->recupDernierMessageAccueil("Parlez de votre Groupe !")->fetch(); ?>
					<?php $dernierSujet = $forum->recupDernierSujetAccueil("Parlez de votre Groupe !")->fetch(); ?>
					<td class="nomCategorieAccueilForum">
						<a href="index.php?page=forum&categorie=Parlez de votre Groupe !"> <?php echo $nomforum3 ?></a>
					</td>
					<td class="nbrSujetsAccueilForum" rowspan = "2">
						<?php echo $nbrSujets[0] ?>
					</td>
					<td class="nbrMessagesAccueilForum" rowspan = "2">
						<?php echo $nbrMessages[0] ?>
					</td>
					<td class="dernierMessageAccueilForum" rowspan = "2">
						<?php if($dernierMessage != array()){ ?>
							<div class="dernierMessageSujetAccueilForum">
								<?php echo $dans ?> <a href="index.php?page=sujetforum&id=<?php echo $dernierSujet['f_id']?>"><?php echo $dernierSujet['f_sujet']?></a>
							</div>
							<div class="dernierMessageAuteurAccueilForum">
								<?php $dateEntiereSujet = date_create($dernierMessage['m_date']) ?>
		            <?php $dateSujet = date_format($dateEntiereSujet, 'd/m/Y') ?>
		            <?php $heureSujet = date_format($dateEntiereSujet, 'H:i:s') ?>
								<?php echo $par ?> <a href="index.php?page=profil&nom=<?php echo $dernierMessage['m_auteur'] ?>"><?php echo $dernierMessage['m_auteur'] ?></a> <?php echo $le ?> <b><?php echo $dateSujet ?></b> <?php echo $a ?> <b><?php echo $heureSujet ?></b>
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="descriptionAccueilForum">
						<?php echo $parlerforum ?>
					</td>
				</tr>

				<tr>
					<?php $nbrSujets = $forum->recupSujetsAccueil("Vous recherchez un Groupe ?")->fetch() ?>
					<?php $nbrMessages = $forum->recupMessagesAccueil("Vous recherchez un Groupe ?")->fetch() ?>
					<?php $dernierMessage = $forum->recupDernierMessageAccueil("Vous recherchez un Groupe ?")->fetch(); ?>
					<?php $dernierSujet = $forum->recupDernierSujetAccueil("Vous recherchez un Groupe ?")->fetch(); ?>
					<td class="nomCategorieAccueilForum">
						<a href="index.php?page=forum&categorie=Vous recherchez un Groupe ?"> <?php echo $nomforum4 ?></a>
					</td>
					<td class="nbrSujetsAccueilForum" rowspan = "2">
						<?php echo $nbrSujets[0] ?>
					</td>
					<td class="nbrMessagesAccueilForum" rowspan = "2">
						<?php echo $nbrMessages[0] ?>
					</td>
					<td class="dernierMessageAccueilForum" rowspan = "2">
						<?php if($dernierMessage != array()){ ?>
							<div class="dernierMessageSujetAccueilForum">
								<?php echo $dans ?> <a href="index.php?page=sujetforum&id=<?php echo $dernierSujet['f_id']?>"><?php echo $dernierSujet['f_sujet']?></a>
							</div>
							<div class="dernierMessageAuteurAccueilForum">
								<?php $dateEntiereSujet = date_create($dernierMessage['m_date']) ?>
		            <?php $dateSujet = date_format($dateEntiereSujet, 'd/m/Y') ?>
		            <?php $heureSujet = date_format($dateEntiereSujet, 'H:i:s') ?>
								<?php echo $par ?> <a href="index.php?page=profil&nom=<?php echo $dernierMessage['m_auteur'] ?>"><?php echo $dernierMessage['m_auteur'] ?></a> <?php echo $le ?> <b><?php echo $dateSujet ?></b> <?php echo $a ?> <b><?php echo $heureSujet ?></b>
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="descriptionAccueilForum">
						<?php echo $rechergroupe ?>
					</td>
				</tr>
			</table>

			<!-- AUTOUR DES GROUPES -->
			<table class="autourDesEventsAccueilForum">
				<thead class="enTeteAccueilForum">
					<tr>
						<th class="titreCategorieAccueilForum">
							<h3> <?php echo $forum3entete1 ?> </h3>
						</th>
						<th class="nbrSujetsAccueilForum">
							<?php echo $forum1entete2 ?>
						</th>
						<th class="nbrMessagesAccueilForum">
							<?php echo $forum1entete3 ?>
						</th>
						<th class="dernierMessageAccueilForum">
							<?php echo $forum1entete4 ?>
						</th>
					</tr>
				</thead>

				<tr>
					<?php $nbrSujets = $forum->recupSujetsAccueil("Compétitions")->fetch() ?>
					<?php $nbrMessages = $forum->recupMessagesAccueil("Compétitions")->fetch() ?>
					<?php $dernierMessage = $forum->recupDernierMessageAccueil("Compétitions")->fetch(); ?>
					<?php $dernierSujet = $forum->recupDernierSujetAccueil("Compétitions")->fetch(); ?>
					<td class="nomCategorieAccueilForum">
						<a href="index.php?page=forum&categorie=Compétitions" > <?php echo $nomforum5 ?> </a>
					</td>
					<td class="nbrSujetsAccueilForum" rowspan = "2">
						<?php echo $nbrSujets[0] ?>
					</td>
					<td class="nbrMessagesAccueilForum" rowspan = "2">
						<?php echo $nbrMessages[0] ?>
					</td>
					<td class="dernierMessageAccueilForum" rowspan = "2">
						<?php if($dernierMessage != array()){ ?>
							<div class="dernierMessageSujetAccueilForum">
								<?php echo $dans ?> <a href="index.php?page=sujetforum&id=<?php echo $dernierSujet['f_id']?>"><?php echo $dernierSujet['f_sujet']?></a>
							</div>
							<div class="dernierMessageAuteurAccueilForum">
								<?php $dateEntiereSujet = date_create($dernierMessage['m_date']) ?>
		            <?php $dateSujet = date_format($dateEntiereSujet, 'd/m/Y') ?>
		            <?php $heureSujet = date_format($dateEntiereSujet, 'H:i:s') ?>
								<?php echo $par ?> <a href="index.php?page=profil&nom=<?php echo $dernierMessage['m_auteur'] ?>"><?php echo $dernierMessage['m_auteur'] ?></a> <?php echo $le ?> <b><?php echo $dateSujet ?></b> <?php echo $a ?> <b><?php echo $heureSujet ?></b>
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="descriptionAccueilForum">
						<?php echo $compeforum ?>
					</td>
				</tr>

				<tr>
					<?php $nbrSujets = $forum->recupSujetsAccueil("Cours")->fetch() ?>
					<?php $nbrMessages = $forum->recupMessagesAccueil("Cours")->fetch() ?>
					<?php $dernierMessage = $forum->recupDernierMessageAccueil("Cours")->fetch(); ?>
					<?php $dernierSujet = $forum->recupDernierSujetAccueil("Cours")->fetch(); ?>
					<td class="nomCategorieAccueilForum">
						<a href="index.php?page=forum&categorie=Cours" > <?php echo $nomforum6 ?> </a>
					</td>
					<td class="nbrSujetsAccueilForum" rowspan = "2">
						<?php echo $nbrSujets[0] ?>
					</td>
					<td class="nbrMessagesAccueilForum" rowspan = "2">
						<?php echo $nbrMessages[0] ?>
					</td>
					<td class="dernierMessageAccueilForum" rowspan = "2">
						<?php if($dernierMessage != array()){ ?>
							<div class="dernierMessageSujetAccueilForum">
								<?php echo $dans ?> <a href="index.php?page=sujetforum&id=<?php echo $dernierSujet['f_id']?>"><?php echo $dernierSujet['f_sujet']?></a>
							</div>
							<div class="dernierMessageAuteurAccueilForum">
								<?php $dateEntiereSujet = date_create($dernierMessage['m_date']) ?>
		            <?php $dateSujet = date_format($dateEntiereSujet, 'd/m/Y') ?>
		            <?php $heureSujet = date_format($dateEntiereSujet, 'H:i:s') ?>
								<?php echo $par ?> <a href="index.php?page=profil&nom=<?php echo $dernierMessage['m_auteur'] ?>"><?php echo $dernierMessage['m_auteur'] ?></a> <?php echo $le ?> <b><?php echo $dateSujet ?></b> <?php echo $a ?> <b><?php echo $heureSujet ?></b>
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="descriptionAccueilForum">
						<?php echo $coursforum ?>
					</td>
				</tr>

				<tr>
					<?php $nbrSujets = $forum->recupSujetsAccueil("Autres")->fetch() ?>
					<?php $nbrMessages = $forum->recupMessagesAccueil("Autres")->fetch() ?>
					<?php $dernierMessage = $forum->recupDernierMessageAccueil("Autres")->fetch(); ?>
					<?php $dernierSujet = $forum->recupDernierSujetAccueil("Autres")->fetch(); ?>
					<td class="nomCategorieAccueilForum">
						<a href="index.php?page=forum&categorie=Autres" > <?php echo $nomforum7 ?> </a>
					</td>
					<td class="nbrSujetsAccueilForum" rowspan = "2">
						<?php echo $nbrSujets[0] ?>
					</td>
					<td class="nbrMessagesAccueilForum" rowspan = "2">
						<?php echo $nbrMessages[0] ?>
					</td>
					<td class="dernierMessageAccueilForum" rowspan = "2">
						<?php if($dernierMessage != array()){ ?>
							<div class="dernierMessageSujetAccueilForum">
								<?php echo $dans ?> <a href="index.php?page=sujetforum&id=<?php echo $dernierSujet['f_id']?>"><?php echo $dernierSujet['f_sujet']?></a>
							</div>
							<div class="dernierMessageAuteurAccueilForum">
								<?php $dateEntiereSujet = date_create($dernierMessage['m_date']) ?>
		            <?php $dateSujet = date_format($dateEntiereSujet, 'd/m/Y') ?>
		            <?php $heureSujet = date_format($dateEntiereSujet, 'H:i:s') ?>
								<?php echo $par ?> <a href="index.php?page=profil&nom=<?php echo $dernierMessage['m_auteur'] ?>"><?php echo $dernierMessage['m_auteur'] ?></a> <?php echo $le ?> <b><?php echo $dateSujet ?></b> <?php echo $a ?> <b><?php echo $heureSujet ?></b>
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="descriptionAccueilForum">
						<?php echo $autresforum ?> 
					</td>
				</tr>
			</table>
		</div>

  </body>
