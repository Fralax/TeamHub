<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="Contenu/vueAccueil.css" />
	<title>Inscription</title>
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
	<div class="conteneur">
		<div class="calendrier">
			<?php $days=array('Lun','Mar','Mer','Jeu','Ven','Sam','Dim');
		$debut = new DateTime('first day of this month');
		//echo 'debut : '.$debut->format('Y-m-d').'<br />';
		$fin = clone $debut;
		$fin->modify('+1month');
		//echo 'fin : '.$debut->format('Y-m-d').'<br />';
		$premiereBoucleInterval = new DateInterval('P1M');
		$secondeBoucleInterval = new DateInterval('P1D');
		$i=6;
		foreach(new DatePeriod($debut,$premiereBoucleInterval,$fin) as $moisCourant){
	    //donne un affichage au petit calendrier pour Un mois.
	    $finDeMois = clone $moisCourant;
	    $finDeMois->modify('first day of next month');
	            echo '<br />'.$moisCourant->format('M Y').'<br />';
			 echo '<table><tr>';
			 foreach($days as $day){
				 echo '<td>'.$day.'</td>';
			 }
			 echo '</tr><tr>';
			 //$end=end($moisCourant);
			 for($j=0;$j<$i;$j++){
				 echo '<td></td>';
			 }
	     foreach(new DatePeriod($moisCourant, $secondeBoucleInterval,$finDeMois) as $jour){
	            //afficher le jour
							echo '<td id="mois">'.$jour->format('d').'</td>';
							$i++;
							if($i==7):
								echo '</tr><tr>';
								$i=0;
							endif;
	    }
			echo '</tr></table>';
			echo '</br>';
		}
		?>
		</div>

		<div class="mesEvenements">
			<h3> Mes Événements </h3>
			<table>
				<?php foreach ($evenements as list($nomMesEvenements)) { ?>
						<tr>
							<td>
								<a href=""> <?php echo $nomMesEvenements?> </a>
							</td>
						</tr>

				<?php } ?>
			</table>
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
	</div>
<?php } ?>
<?php if ($n == 2){ ?>
	<body>
		<div class="messageBienvenue">
			<h2>Bienvenue sur TeamHub !</h2>
		</div>
	</body>
<?php } ?>
