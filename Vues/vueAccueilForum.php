<?php $this->titre = "Forum - Accueil"; ?>
<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueAccueilForum.css" />
		<title>Forum</title>
		<?php $forum = new forum() ?>
	</head>

	<body>
		<div class="titre">
			<h2> Bienvenue sur le Forum de TeamHub ! </h2>
		</div>

		<div class="conteneur">

			<!-- DISCUSSION GENERALE -->
			<table class="discussionGenerale">

				<thead class="enTete">
					<tr>
						<th class="titreCategorie">
							<h3>Autour de TeamHub</h3>
						</th>
						<th class="nbrSujets">
							Sujets
						</th>
						<th class="nbrMessages">
							Messages
						</th>
						<th class="dernierMessage">
							Dernier Message
						</th>
					</tr>
				</thead>

				<tr>
					<?php $nbrSujets = $forum->recupSujetsAccueil("Discussion Générale")->fetch() ?>
					<?php $nbrMessages = $forum->recupMessagesAccueil("Discussion Générale")->fetch() ?>
					<?php $dernierMessage = $forum->recupDernierMessageAccueil("Discussion Générale")->fetch(); ?>
					<?php $dernierSujet = $forum->recupDernierSujetAccueil("Discussion Générale")->fetch(); ?>
					<td class="nomCategorie">
						<a href="index.php?page=forum&categorie=Discussion Générale">Discussion Générale</a>
					</td>
					<td class="nbrSujets" rowspan = "2">
						<?php echo $nbrSujets[0] ?>
					</td>
					<td class="nbrMessages" rowspan = "2">
						<?php echo $nbrMessages[0] ?>
					</td>
					<td class="dernierMessage" rowspan = "2">
						<?php if($dernierMessage != array()){ ?>
							<div class="dernierMessageSujet">
								Dans : <a href="index.php?page=sujetforum&id=<?php echo $dernierSujet['f_id']?>"><?php echo $dernierSujet['f_sujet']?></a>
							</div>
							<div class="dernierMessageAuteur">
								<?php $dateEntiereSujet = date_create($dernierMessage['m_date']) ?>
		            <?php $dateSujet = date_format($dateEntiereSujet, 'd/m/Y') ?>
		            <?php $heureSujet = date_format($dateEntiereSujet, 'H:i:s') ?>
								Par <a href="index.php?page=profil&nom=<?php echo $dernierMessage['m_auteur'] ?>"><?php echo $dernierMessage['m_auteur'] ?></a> le <b><?php echo $dateSujet ?></b> à <b><?php echo $heureSujet ?></b>
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="description">
						Un endroit pour parler de tout et de rien !
					</td>
				</tr>

				<tr>
					<?php $nbrSujets = $forum->recupSujetsAccueil("Suggestions")->fetch() ?>
					<?php $nbrMessages = $forum->recupMessagesAccueil("Suggestions")->fetch() ?>
					<?php $dernierMessage = $forum->recupDernierMessageAccueil("Suggestions")->fetch(); ?>
					<?php $dernierSujet = $forum->recupDernierSujetAccueil("Suggestions")->fetch(); ?>
					<td class="nomCategorie">
						<a href="index.php?page=forum&categorie=Suggestions">Suggestions</a>
					</td>
					<td class="nbrSujets" rowspan = "2">
						<?php echo $nbrSujets[0] ?>
					</td>
					<td class="nbrMessages" rowspan = "2">
						<?php echo $nbrMessages[0] ?>
					</td>
					<td class="dernierMessage" rowspan = "2">
						<?php if($dernierMessage != array()){ ?>
							<div class="dernierMessageSujet">
								Dans : <a href="index.php?page=sujetforum&id=<?php echo $dernierSujet['f_id']?>"><?php echo $dernierSujet['f_sujet']?></a>
							</div>
							<div class="dernierMessageAuteur">
								<?php $dateEntiereSujet = date_create($dernierMessage['m_date']) ?>
		            <?php $dateSujet = date_format($dateEntiereSujet, 'd/m/Y') ?>
		            <?php $heureSujet = date_format($dateEntiereSujet, 'H:i:s') ?>
								Par <a href="index.php?page=profil&nom=<?php echo $dernierMessage['m_auteur'] ?>"><?php echo $dernierMessage['m_auteur'] ?></a> le <b><?php echo $dateSujet ?></b> à <b><?php echo $heureSujet ?></b>
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="description">
						Une suggestion ? Un bug sur le site ? Signalez vos remarques dans cette partie du forum !
					</td>
				</tr>
			</table>

			<!-- AUTOUR DES GROUPES -->
			<table class="autourDesGroupes">
				<thead class="enTete">
					<tr>
						<th class="titreCategorie">
							<h3>Autour des Groupes ...</h3>
						</th>
						<th class="nbrSujets">
							Sujets
						</th>
						<th class="nbrMessages">
							Messages
						</th>
						<th class="dernierMessage">
							Dernier Message
						</th>
					</tr>
				</thead>

				<tr>
					<?php $nbrSujets = $forum->recupSujetsAccueil("Parlez de votre Groupe !")->fetch() ?>
					<?php $nbrMessages = $forum->recupMessagesAccueil("Parlez de votre Groupe !")->fetch() ?>
					<?php $dernierMessage = $forum->recupDernierMessageAccueil("Parlez de votre Groupe !")->fetch(); ?>
					<?php $dernierSujet = $forum->recupDernierSujetAccueil("Parlez de votre Groupe !")->fetch(); ?>
					<td class="nomCategorie">
						<a href="index.php?page=forum&categorie=Parlez de votre Groupe !">Parlez de votre Groupe !</a>
					</td>
					<td class="nbrSujets" rowspan = "2">
						<?php echo $nbrSujets[0] ?>
					</td>
					<td class="nbrMessages" rowspan = "2">
						<?php echo $nbrMessages[0] ?>
					</td>
					<td class="dernierMessage" rowspan = "2">
						<?php if($dernierMessage != array()){ ?>
							<div class="dernierMessageSujet">
								Dans : <a href="index.php?page=sujetforum&id=<?php echo $dernierSujet['f_id']?>"><?php echo $dernierSujet['f_sujet']?></a>
							</div>
							<div class="dernierMessageAuteur">
								<?php $dateEntiereSujet = date_create($dernierMessage['m_date']) ?>
		            <?php $dateSujet = date_format($dateEntiereSujet, 'd/m/Y') ?>
		            <?php $heureSujet = date_format($dateEntiereSujet, 'H:i:s') ?>
								Par <a href="index.php?page=profil&nom=<?php echo $dernierMessage['m_auteur'] ?>"><?php echo $dernierMessage['m_auteur'] ?></a> le <b><?php echo $dateSujet ?></b> à <b><?php echo $heureSujet ?></b>
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="description">
						Venez parler de votre Groupe pour qu'un maximum de membres le rejoignent !
					</td>
				</tr>

				<tr>
					<?php $nbrSujets = $forum->recupSujetsAccueil("Vous recherchez un Groupe ?")->fetch() ?>
					<?php $nbrMessages = $forum->recupMessagesAccueil("Vous recherchez un Groupe ?")->fetch() ?>
					<?php $dernierMessage = $forum->recupDernierMessageAccueil("Vous recherchez un Groupe ?")->fetch(); ?>
					<?php $dernierSujet = $forum->recupDernierSujetAccueil("Vous recherchez un Groupe ?")->fetch(); ?>
					<td class="nomCategorie">
						<a href="index.php?page=forum&categorie=Vous recherchez un Groupe ?">Vous recherchez un Groupe ?</a>
					</td>
					<td class="nbrSujets" rowspan = "2">
						<?php echo $nbrSujets[0] ?>
					</td>
					<td class="nbrMessages" rowspan = "2">
						<?php echo $nbrMessages[0] ?>
					</td>
					<td class="dernierMessage" rowspan = "2">
						<?php if($dernierMessage != array()){ ?>
							<div class="dernierMessageSujet">
								Dans : <a href="index.php?page=sujetforum&id=<?php echo $dernierSujet['f_id']?>"><?php echo $dernierSujet['f_sujet']?></a>
							</div>
							<div class="dernierMessageAuteur">
								<?php $dateEntiereSujet = date_create($dernierMessage['m_date']) ?>
		            <?php $dateSujet = date_format($dateEntiereSujet, 'd/m/Y') ?>
		            <?php $heureSujet = date_format($dateEntiereSujet, 'H:i:s') ?>
								Par <a href="index.php?page=profil&nom=<?php echo $dernierMessage['m_auteur'] ?>"><?php echo $dernierMessage['m_auteur'] ?></a> le <b><?php echo $dateSujet ?></b> à <b><?php echo $heureSujet ?></b>
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="description">
						Si vous recherchez un groupe et que vous ne savez pas trop où aller, postez un message ici !
					</td>
				</tr>
			</table>

			<!-- AUTOUR DES GROUPES -->
			<table class="autourDesEvents">
				<thead class="enTete">
					<tr>
						<th class="titreCategorie">
							<h3>Autour des Événements ...</h3>
						</th>
						<th class="nbrSujets">
							Sujets
						</th>
						<th class="nbrMessages">
							Messages
						</th>
						<th class="dernierMessage">
							Dernier Message
						</th>
					</tr>
				</thead>

				<tr>
					<?php $nbrSujets = $forum->recupSujetsAccueil("Compétitions")->fetch() ?>
					<?php $nbrMessages = $forum->recupMessagesAccueil("Compétitions")->fetch() ?>
					<?php $dernierMessage = $forum->recupDernierMessageAccueil("Compétitions")->fetch(); ?>
					<?php $dernierSujet = $forum->recupDernierSujetAccueil("Compétitions")->fetch(); ?>
					<td class="nomCategorie">
						<a href="index.php?page=forum&categorie=Compétitions" > Compétitions </a>
					</td>
					<td class="nbrSujets" rowspan = "2">
						<?php echo $nbrSujets[0] ?>
					</td>
					<td class="nbrMessages" rowspan = "2">
						<?php echo $nbrMessages[0] ?>
					</td>
					<td class="dernierMessage" rowspan = "2">
						<?php if($dernierMessage != array()){ ?>
							<div class="dernierMessageSujet">
								Dans : <a href="index.php?page=sujetforum&id=<?php echo $dernierSujet['f_id']?>"><?php echo $dernierSujet['f_sujet']?></a>
							</div>
							<div class="dernierMessageAuteur">
								<?php $dateEntiereSujet = date_create($dernierMessage['m_date']) ?>
		            <?php $dateSujet = date_format($dateEntiereSujet, 'd/m/Y') ?>
		            <?php $heureSujet = date_format($dateEntiereSujet, 'H:i:s') ?>
								Par <a href="index.php?page=profil&nom=<?php echo $dernierMessage['m_auteur'] ?>"><?php echo $dernierMessage['m_auteur'] ?></a> le <b><?php echo $dateSujet ?></b> à <b><?php echo $heureSujet ?></b>
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="description">
						Vous voulez organisez ou participer à des compétitons ?
					</td>
				</tr>

				<tr>
					<?php $nbrSujets = $forum->recupSujetsAccueil("Cours")->fetch() ?>
					<?php $nbrMessages = $forum->recupMessagesAccueil("Cours")->fetch() ?>
					<?php $dernierMessage = $forum->recupDernierMessageAccueil("Cours")->fetch(); ?>
					<?php $dernierSujet = $forum->recupDernierSujetAccueil("Cours")->fetch(); ?>
					<td class="nomCategorie">
						<a href="index.php?page=forum&categorie=Cours" > Cours </a>
					</td>
					<td class="nbrSujets" rowspan = "2">
						<?php echo $nbrSujets[0] ?>
					</td>
					<td class="nbrMessages" rowspan = "2">
						<?php echo $nbrMessages[0] ?>
					</td>
					<td class="dernierMessage" rowspan = "2">
						<?php if($dernierMessage != array()){ ?>
							<div class="dernierMessageSujet">
								Dans : <a href="index.php?page=sujetforum&id=<?php echo $dernierSujet['f_id']?>"><?php echo $dernierSujet['f_sujet']?></a>
							</div>
							<div class="dernierMessageAuteur">
								<?php $dateEntiereSujet = date_create($dernierMessage['m_date']) ?>
		            <?php $dateSujet = date_format($dateEntiereSujet, 'd/m/Y') ?>
		            <?php $heureSujet = date_format($dateEntiereSujet, 'H:i:s') ?>
								Par <a href="index.php?page=profil&nom=<?php echo $dernierMessage['m_auteur'] ?>"><?php echo $dernierMessage['m_auteur'] ?></a> le <b><?php echo $dateSujet ?></b> à <b><?php echo $heureSujet ?></b>
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="description">
						Vous voulez organiser ou particier à des cours ?
					</td>
				</tr>

				<tr>
					<?php $nbrSujets = $forum->recupSujetsAccueil("Autres")->fetch() ?>
					<?php $nbrMessages = $forum->recupMessagesAccueil("Autres")->fetch() ?>
					<?php $dernierMessage = $forum->recupDernierMessageAccueil("Autres")->fetch(); ?>
					<?php $dernierSujet = $forum->recupDernierSujetAccueil("Autres")->fetch(); ?>
					<td class="nomCategorie">
						<a href="index.php?page=forum&categorie=Autres" > Autres </a>
					</td>
					<td class="nbrSujets" rowspan = "2">
						<?php echo $nbrSujets[0] ?>
					</td>
					<td class="nbrMessages" rowspan = "2">
						<?php echo $nbrMessages[0] ?>
					</td>
					<td class="dernierMessage" rowspan = "2">
						<?php if($dernierMessage != array()){ ?>
							<div class="dernierMessageSujet">
								Dans : <a href="index.php?page=sujetforum&id=<?php echo $dernierSujet['f_id']?>"><?php echo $dernierSujet['f_sujet']?></a>
							</div>
							<div class="dernierMessageAuteur">
								<?php $dateEntiereSujet = date_create($dernierMessage['m_date']) ?>
		            <?php $dateSujet = date_format($dateEntiereSujet, 'd/m/Y') ?>
		            <?php $heureSujet = date_format($dateEntiereSujet, 'H:i:s') ?>
								Par <a href="index.php?page=profil&nom=<?php echo $dernierMessage['m_auteur'] ?>"><?php echo $dernierMessage['m_auteur'] ?></a> le <b><?php echo $dateSujet ?></b> à <b><?php echo $heureSujet ?></b>
							</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td class="description">
						Vous organisez un événement particulier ? C'est par ici !
					</td>
				</tr>
			</table>
		</div>

  </body>
</html>
