<body>

<?php
	if(isset($_SESSION['pseudo'])){
		$i = 1;
	} else{
		$i = 2;
	}
?>

<?php if ($i == 1){ ?>
	<?php
		$days=array('Lun','Mar','Mer','Jeu','Ven','Sam','Dim');
		$debut = new DateTime('first day of this month');
		//echo 'debut : '.$debut->format('Y-m-d').'<br />';
		$fin = clone $debut;
		$fin->modify('+1year');
		//echo 'fin : '.$debut->format('Y-m-d').'<br />';
		$premiereBoucleInterval = new DateInterval('P1M');
		$secondeBoucleInterval = new DateInterval('P1D');
		$i=4;
		foreach(new DatePeriod($debut,$premiereBoucleInterval,$fin) as $moisCourant){
			$finDeMois = clone $moisCourant;
			$finDeMois->modify('first day of next month');
							echo '<br />'.$moisCourant->format('M Y').'<br />';
			 echo '<table><tr>';
			 foreach($days as $day){
				 echo '<td>'.$day.'</td>';
			 }
			 echo '</tr><tr>';
			 for($j=0;$j<$i;$j++){
				 echo '<td></td>';
			 }
			 foreach(new DatePeriod($moisCourant, $secondeBoucleInterval,$finDeMois) as $jour){
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
<?php } ?>

<?php if ($i == 2){ ?>
	<body>
	</body>
<?php } ?>
