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
	</div>
<?php } ?>

<?php if ($n == 2){ ?>
	<body>
		<div class="messageBienvenue">
			<h2>Bienvenue sur TeamHub !</h2>
		</div>
	</body>
<?php } ?>
