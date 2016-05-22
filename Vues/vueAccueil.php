<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="Contenu/vueAccueil.css" />
	<title>Accueil</title>

	<script src="http://code.jquery.com/jquery-2.2.3.js" integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4=" crossorigin="anonymous"></script>
	<script type="text/javascript">
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
											<td>
												<div class="relative">
													<div <?php if ($time == strtotime(date('Y-m-d'))){ ?> class="today" <?php } else{ ?> class="day" <?php } ?>>
														<?php echo $d ?>
													</div>
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

		<div class="evenements">
			<h3> Événements </h3>
		</div>
	</div>

	<div class="mesGroupes">
		<h3> Mes Groupes </h3>
		<?php if ($groupes[0][0] == ""){ ?>
			<div class="pasDeGroupe">
				<b>Vous ne faites pas encore partie d'un groupe ... </b> <br> </br>
				Rejoignez-en un vite ! <br> </br>
				<a href="index.php?page=groupes"><input type="button" name="rejoindreGroupe" value="Rejoindre un Groupe"></a> <br> </br>
				Ou créez votre propre groupe ! <br> </br>
				<a href="index.php?page=creationgroupe"><input type="button" name="creerGroupe" value="Créer un groupe"></a>
			</div>
		<?php } ?>
		<table>
			<?php foreach ($groupes as list($nomMesGroupe)) { ?>
				<tr>
					<td>
						<a href="index.php?page=groupe&nom=<?php echo $nomMesGroupe?>"> <?php echo $nomMesGroupe?> </a>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>

	<div class="conteneur2">
		<div class="suggestionGroupes">
			<h3> Parce que vous êtes à <?php echo $departement[0] ?> Nous vous suggérons les groupes : </h3>
			<?php if ($suggestiongroupes[0][0] == ""){ ?>
				<div class="pasDeGroupe">
					<b>Il n'y a aucun groupe disponible dans votre région </b> <br> </br>
					<a href="index.php?page=creationgroupe">Créez votre propre groupe !</a>
				</div>
			<?php } ?>
			<table>
				<?php foreach ($suggestiongroupes as list($nomGroupesSugérés)) { ?>
					<tr>
						<td>
							<a href="index.php?page=groupe&nom=<?php echo $nomGroupesSugérés?>"> <?php echo $nomGroupesSugérés?> </a>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
		<div class="suggestionSports">
			<h3> Parce que vous pratiquez : <?php echo $sport[0][0] ?> Nous vous suggérons les groupes : </h3>
			<?php if ($suggestionsports[0][0] == ""){ ?>
				<?php if ($sport[0][0] != ""){ ?>
					<div class="pasDeGroupe">
						<h3>Il n'y a aucun groupe disponible relatif à vos sports </h3> <br> </br>
						<a href="index.php?page=creationgroupe">Créez votre propre groupe !</a>
					</div>
				<?php } else {?>
					<div class="pasDeSport">
						<h3>  Vous n'avez pas renseigné de sport ! Nous vous suggérons d'en ajouter un ! </h3>
						<a href="index.php?page=ajoutsport"> <h4>Ajoutez un sport</h4> </a>
					</div>
				<?php } ?>
			<?php } ?>
			<table>
				<?php foreach ($suggestionsports as list($nomSportsSugérés)) { ?>
					<tr>
						<td>
							<a href="index.php?page=groupe&nom=<?php echo $nomSportsSugérés?>"> <?php echo $nomSportsSugérés?> </a>
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
