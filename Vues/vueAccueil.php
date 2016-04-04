<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Accueil</title>
</head>

<?php if(isset($_SESSION['pseudo'])){ ?>

	<body>

	<?php

		$debut = new DateTime('first day of this month');
		//echo 'debut : '.$debut->format('Y-m-d').'<br />';

		$fin = clone $debut;
		$fin->modify('+1year');

		//echo 'fin : '.$debut->format('Y-m-d').'<br />';

		$premiereBoucleInterval = new DateInterval('P1M');
		$secondeBoucleInterval = new DateInterval('P1D');

		foreach(new DatePeriod($debut,$premiereBoucleInterval,$fin) as $moisCourant){
	    //donne un affichage au petit calendrier pour Un mois.
	    $finDeMois = clone $moisCourant;
	    $finDeMois->modify('first day of next month');
	            echo '<br />'.$moisCourant->format('M Y').'<br />';
	     foreach(new DatePeriod($moisCourant, $secondeBoucleInterval,$finDeMois) as $jour){
	            //afficher le jour
	            echo $jour->format('d').' ';
	    }
		}

	?>

	</body>

	<?php } else{?>

		<body>


		</body>

	<?php } ?>

</html>
