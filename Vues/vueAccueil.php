<?php $this->titre = "Accueil"; ?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="Contenu/vueAccueil.css" />
	<title>Accueil</title>
</head>

<body>

<?php
	if(isset($_SESSION['pseudo'])){
		$n = 1;
	} else{
		$n = 2;
	}
?>

<?php if ($n == 1){ ?>

	<?php if ($invit[0][0] != "" || $acq[0][0] != "" || $notif[0][0] != "" || $nouv[0][0] != ""){ ?>
		<div class="notifications">
			<?php if (count($invit)+count($acq)+count($notif)+count($nouv) == 1): ?>
				<h3> Vous avez <?php echo count($invit)+count($acq)+count($notif)+count($nouv) ?> notification ! </h3>
			<?php endif; ?>
			<?php if (count($invit)+count($acq)+count($notif)+count($nouv) != 1): ?>
				<h3> Vous avez <?php echo count($invit)+count($acq)+count($notif)+count($nouv) ?> notifications ! </h3>
			<?php endif; ?>
			<table>
				<?php foreach ($invit as list($admin, $invitationGroupe)) { ?>
					<tr>
						<td>
							<?php echo $admin?> vous invite à rejoindre son Groupe : 	<a href="index.php?page=groupe&nom=<?php echo $invitationGroupe?>"> <?php echo $invitationGroupe?> </a>
						</td>
						<td>
							<a href="index.php?page=acceptgroupe&nom=<?php echo $invitationGroupe?>" > Accepter </a>
							<a href="index.php?page=supprimernotif&nom=<?php echo $invitationGroupe?>" > Refuser </a>
						</td>
					</tr>
				<?php } ?>
				<?php foreach ($nouv as list($admin, $nouveauGroupe)) { ?>
					<tr>
						<td>
							<?php echo $admin?> a créer un nouveau Groupe correspondant à vos préférences : 	<a href="index.php?page=groupe&nom=<?php echo $nouveauGroupe?>"> <?php echo $nouveauGroupe?> </a>
						</td>
						<td>
							<a href="index.php?page=acceptgroupe&nom=<?php echo $nouveauGroupe?>" > Accepter </a>
							<a href="index.php?page=supprimernotif&nom=<?php echo $nouveauGroupe?>" > Refuser </a>
						</td>
					</tr>
				<?php } ?>
				<?php foreach ($acq as list($admin, $acquittementGroupe, $membre)) { ?>
					<tr>
						<td>
							<?php echo $membre?> a rejoint votre Groupe : 	<a href="index.php?page=groupe&nom=<?php echo $acquittementGroupe?>"> <?php echo $acquittementGroupe?> </a>
						</td>
					</tr>
				<?php } ?>
				<?php foreach ($notif as list($admin, $notificationGroupe, $membre)) { ?>
					<tr>
						<td>
							<?php echo $membre?> a rejoint votre Groupe : 	<a href="index.php?page=groupe&nom=<?php echo $notificationGroupe?>"> <?php echo $notificationGroupe?> </a>
						</td>
					</tr>
				<?php } ?>
				<?php if ($acq[0][0] != "" || $notif[0][0] != "" ){ ?>
				<tr>
					<td class="Ok">
						<a href="index.php?page=supprimeracquittement" > Ok </a>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>
	<?php } ?>

	<div class="calendrierEvents">
		<div class="calendrier">
			<?php
				$date = new accueil();
				$year = Date('Y');
				$dates = $date->calendrier($year);
				$events = $date->recupEvents();
			?>
			<div class="year">
				<h3><?php echo $year ?></h3>
			</div>
				<div class="months">
					<ul>
						<?php foreach ($date->months as $id => $m): ?>
							<li> <a href="#" id="linkMonth<?php echo $id+1; ?>"><?php echo utf8_encode(substr(utf8_decode($m), 0, 3)) ?></a> </li>
						<?php endforeach; ?>
					</ul>
				</div>

			<div class="periods">
				<?php $dates = current($dates); ?>
				<?php foreach ($dates as $m => $days) { ?>
					<div class="month relative" id="month<?php echo $m ?>">
						<table>
							<thead>
								<tr>
									<?php foreach ($date->days as $d): ?>
										<th>
											<?php echo substr($d, 0, 3) ?>
										</th>
									<?php endforeach; ?>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php
									$end = end($days);
									foreach ($days as $d => $w):
									?>
										<?php $time = strtotime("$year-$m-$d"); ?>
										<?php if ($d == 1 && $d != $w ): ?>
											<td colspan="<?php echo $w - 1 ?>" class = "padding">
											</td>
										<?php endif; ?>
											<td onmouseover="focusEvent('<?php echo "date$d".sprintf('%02d',$m)."$year" ?>')" onmouseout="unfocusEvent('<?php echo "date$d".sprintf('%02d',$m)."$year" ?>')">
												<div <?php if ($time == strtotime(date('Y-m-d'))){ ?> class="today" <?php } else{ ?> class="day" <?php } ?>>
													<?php echo $d ?>
												</div>
												<ul class="events">
													<?php if (isset($events[$time])): ?>
														<?php foreach ($events[$time] as $event): ?>
															<li><?php echo $event; ?></li>
														<?php endforeach; ?>
													<?php endif; ?>
													<div class="daytitle">
														<?php echo $date->days[$w-1] ?>	<?php echo $d ?> <?php echo $date->months[$m-1] ?>
													</div>
												</ul>
											</td>
										<?php if ($w == 7): ?>
											</tr>
											<tr>
										<?php endif; ?>
									<?php endforeach; ?>
									<?php if ($end != 7): ?>
										<td colspan="<?php echo 7 - $end ?>" class="padding">
										</td>
									<?php endif; ?>
								</tr>
							</tbody>
						</table>
					</div>
				<?php } ?>
			</div>
		</div>

		<div class="mesGroupes">
			<h3> Mes Groupes </h3>
			<?php $groupe = new groupes() ?>
			<?php $event = new evenements() ?>

			<?php if ($groupes[0][0] == ""){ ?>
				<div class="pasDeGroupe">
					<b>Vous ne faites pas encore partie d'un groupe ... </b> <br> </br>
					Rejoignez-en un vite ! <br> </br>
					<a href="index.php?page=groupes"><input type="button" name="rejoindreGroupe" value="Rejoindre un Groupe"></a> <br> </br>
					Ou créez votre propre groupe ! <br> </br>
					<a href="index.php?page=creationgroupe"><input type="button" name="creerGroupe" value="Créer un groupe"></a>
				</div>
			<?php } ?>

			<?php foreach ($groupes as list($nomGroupe, $nomAdmin, $nomSport)){ ?>
			<table>
					<tr>
						<td>
							<?php $afficherImageSport = $groupe->afficherImage($nomGroupe)->fetch(); ?>
							<img src="imageSports/<?php echo $afficherImageSport['s_image']; ?>"/>
						</td>
						<td>
							<a href="index.php?page=groupe&nom=<?php echo $nomGroupe?>" style="font-weight: bold;"> <?php echo $nomGroupe?> </a>
						</td>
					</tr>
					<?php
						$afficherEvent = $event->listerEvenementsUtilisateur($nomGroupe)->fetchAll();
						foreach ($afficherEvent as list($nomEvent, $createurEvent, $dateEvent, $heureEvent,$nomclub)){
							$dateEvent = date_create($dateEvent);
					?>
					<tr class = "evenementsGroupe">
						<td>
						</td>
						<td id="<?php echo "date".date_format($dateEvent, 'dmY') ?>">
							<?php
								echo "événement le ".date_format($dateEvent, 'd/m/Y')." à ".substr($heureEvent, 0, 5)." : ".$nomEvent;
							?>
						</td>
					</tr>
					<?php } ?>
			</table>
			<?php } ?>
		</div>
	</div>

	<div class="conteneur2">
		<div class="suggestionGroupes">
			<h3> Vous habitez <?php echo $departement[0] ?> ? Essayez un nouveau sport ! </h3>
			<?php if ($suggestiongroupes[0][0] == ""){ ?>
				<div class="pasDeGroupe">
					<p> <b>Il n'y a aucun groupe disponible dans votre région </b> </p>
					<p> <a href="index.php?page=creationgroupe">Créez votre propre groupe !</a> </p>
				</div>
			<?php } ?>
			<table>
				<?php foreach ($suggestiongroupes as list($nomGroupesSuggeres, $nomSport)) { ?>
					<tr>
						<td>
							<?php $afficherImageSport = $groupe->afficherImage($nomGroupesSuggeres)->fetch(); ?>
							<img src="imageSports/<?php echo $afficherImageSport['s_image']; ?>"/>
						</td>
						<td>
							<a href="index.php?page=groupe&nom=<?php echo $nomGroupesSuggeres?>" style="font-weight: bold;"> <?php echo $nomGroupesSuggeres?> </a> pour pratiquer <?php echo $nomSport ?>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
		<div class="suggestionSports">
			<h3> Pratiquez le <?php echo $sport[0][0] ?> près de chez vous : </h3>
			<?php if ($suggestionsports[0][0] == ""){ ?>
				<?php if ($sport[0][0] != ""){ ?>
					<div class="pasDeGroupe">
						<p><b> Il n'y a aucun groupe disponible relatif à vos sports </b> </p>
						<p><a href="index.php?page=creationgroupe">Créez votre propre groupe !</a></p>
					</div>
				<?php } else {?>
					<div class="pasDeSport">
						<p> <b>  Vous n'avez pas renseigné de sport ! Nous vous suggérons d'en ajouter un ! </b> </p>
						<p> <a href="index.php?page=profil&nom=<?php echo $_SESSION['pseudo'] ?>"> Ajoutez un sport </a> </p>
					</div>
				<?php } ?>
			<?php } ?>
			<table>
				<?php foreach ($suggestionsports as list($nomSportsSuggeres)) { ?>
					<tr>
						<td>
							<?php $afficherImageSport = $groupe->afficherImage($nomSportsSuggeres)->fetch(); ?>
							<img src="imageSports/<?php echo $afficherImageSport['s_image']; ?>"/>
						</td>
						<td>
							<a href="index.php?page=groupe&nom=<?php echo $nomSportsSuggeres?>" style="font-weight: bold;"> <?php echo $nomSportsSuggeres?> </a>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
<?php } ?>

<?php if ($n == 2){ ?>
	<body>
		<div class="messageBienvenue">
			<h2>Bienvenue sur TeamHub !</h2>
		</div>
	</body>
<?php } ?>





<script src="http://code.jquery.com/jquery-2.2.3.js" integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4=" crossorigin="anonymous"></script>
<script type="text/javascript">
	function focusEvent(date) {
		var events = document.querySelectorAll('#'+date.toString())
		for (var i = 0; i < events.length; i++) {
			events[i].style.fontWeight = "bold"
			events[i].style.fontSize = "1.2em"
		}
	}

	function unfocusEvent(date) {
		var events = document.querySelectorAll('#'+date.toString())
		for (var i = 0; i < events.length; i++) {
			events[i].style.fontWeight = ""
			events[i].style.fontSize = ""
		}
	}

	jQuery(function($){
		var Tmonth = new Date();
		var month = Tmonth.getMonth()+1
		$('.month').hide();
		$('#month'+month).show();
		$('#linkMonth'+month).show();
		$('#linkMonth'+month).addClass('active');
		var current = month;
		$('.months a').click(function(){
			var month = $(this).attr('id').replace('linkMonth', '');
			if(month != current){
				$('#month'+current).slideUp();
				$('#month'+month).slideDown();
				$('.months a').removeClass('active');
				$('.months a#linkMonth'+month).addClass('active');
				current = month;
			}
			return false;
		});
	});
</script>
