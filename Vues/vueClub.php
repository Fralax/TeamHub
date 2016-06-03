<?php $this->titre = "Club - ".$caractClub['c_nom'];
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>

	<body>

		<div class="conteneurVueClub">
			<div class="clubVueClub">
	      <h2><?php echo $caractClub['c_nom']?> </h2>
	      <img src="imagesClubs/<?php echo $caractClub['c_image']; ?>"/>
	      <p> <?php echo $formclub2 ?> :
	      <?php echo $caractClub['c_adresse'] ?>
	      </p>
	      <p>
	      <?php echo $caractClub['c_cp'] ?> <?php echo $caractClub['c_ville'] ?>
	      </p>
	      <p> <?php echo $formclub4 ?> :
	      <?php echo $caractClub['c_numero'] ?>
	      </p>
				<div class="horairesVueClub">
					<table>
		        <tr>
		          <td> <?php echo $formclub8 ?> : </td>
							<td> <?php echo $formclub7.$caractClub['c_hoLundiDebut'] ?> <?php echo $formclub18.$caractClub['c_hoLundiFin'] ?> </td>
		        </tr>
		        <tr>
							<td> <?php echo $formclub9 ?> : </td>
							<td> <?php echo $formclub7.$caractClub['c_hoMardiDebut'] ?> <?php echo $formclub18.$caractClub['c_hoMardiFin'] ?> </td>
		        </tr>
						<tr>
							<td> <?php echo $formclub10 ?> : </td>
							<td> <?php echo $formclub7.$caractClub['c_hoMercrediDebut'] ?> <?php echo $formclub18.$caractClub['c_hoMercrediFin'] ?> </td>
						</tr>
						<tr>
							<td> <?php echo $formclub11 ?> : </td>
							<td> <?php echo $formclub7.$caractClub['c_hoJeudiDebut'] ?> <?php echo $formclub18.$caractClub['c_hoJeudiFin'] ?> </td>
						</tr>
						<tr>
							<td> <?php echo $formclub12 ?> : </td>
							<td> <?php echo $formclub7.$caractClub['c_hoVendrediDebut'] ?> <?php echo $formclub18.$caractClub['c_hoVendrediFin'] ?> </td>
						</tr>
						<tr>
							<td> <?php echo $formclub13 ?> : </td>
							<td> <?php echo $formclub7.$caractClub['c_hoSamediDebut'] ?> <?php echo $formclub18.$caractClub['c_hoSamediFin'] ?> </td>
						</tr>
						<tr>
							<td> <?php echo $formclub14 ?> : </td>
							<td> <?php echo $formclub7.$caractClub['c_hoDimancheDebut'] ?> <?php echo $formclub18.$caractClub['c_hoDimancheFin'] ?> </td>
						</tr>
		      </table>
				</div>
				<div class="commentairesHorairesVueClub">
						<?php echo $caractClub['c_hoCommentaire'] ?>
				</div>
			</div>

			<div class="commentairesVueClub">
				<div class="derniersVueClub">
					<table>
						<th>
							<h3> <?php echo $dercomm ?></h3>
							___________________
						</th>
						<?php if ($derniereNoteClub[0]==""){ ?>
							<tr>
								<td>
									<b> <?php echo $riencomm ?></b>
								</td>
							</tr>
						<?php } ?>
						<?php foreach ($derniereNoteClub as list($pseudo, $note, $commentaire, $date)){?>
							<tr>
								<td class="infosCommentaireVueClub"> <a href="index.php?page=profil&nom=<?php echo $pseudo ?>"><b><?php echo $pseudo?></b></a>, <?php echo $le ?> <?php echo $date ?> : </td>
							</tr>
							<tr>
								<td>
									<?php echo $commentaire?>
								</td>
							</tr>
							<tr>
								<td>
									<?php for ($i=0; $i < $note; $i++) { ?>
										<img src="Autres/etoile.png" height="15px" width="15px" />
									<?php } ?>
								</td>
							</tr>
							<tr>
								<td>
									___________________
								</td>
							</tr>
						<?php } ?>
					</table>
				</div>
				<div class="meilleursVueClub">
					<table>
						<th>
							<h3> <?php echo $bestcomm ?> </h3>
							___________________
						</th>
						<?php if ($derniereNoteClub[0]==""){ ?>
							<tr>
								<td>
									<b><?php echo $riencomm ?> </b>
								</td>
							</tr>
						<?php } ?>
						<?php foreach ($meilleureNoteClub as list($pseudo, $note, $commentaire, $date)){?>
							<tr>
								<td class="infosCommentaireVueClub"> <a href="index.php?page=profil&nom=<?php echo $pseudo ?>"><b><?php echo $pseudo?></b></a>, <?php echo $le ?> <?php echo $date ?> : </td>
							</tr>
							<tr>
								<td>
									<?php echo $commentaire?>
								</td>
							</tr>
							<tr>
								<td>
									<?php for ($i=0; $i < $note; $i++) { ?>
										<img src="Autres/etoile.png" height="15px" width="15px" />
									<?php } ?>
								</td>
							</tr>
							<tr>
								<td>
									___________________
								</td>
							</tr>
						<?php } ?>
					</table>
				</div>
				<div class="piresVueClub">
					<table>
						<th>
							<h3><?php echo $wcomm ?> </h3>
							___________________
						</th>
						<?php if ($derniereNoteClub[0]==""){ ?>
							<tr>
								<td>
									<b><?php echo $riencomm ?> </b>
								</td>
							</tr>
						<?php } ?>
						<?php foreach ($pireNoteClub as list($pseudo, $note, $commentaire, $date)){?>
							<tr>
								<td class="infosCommentaireVueClub"> <a href="index.php?page=profil&nom=<?php echo $pseudo ?>"><b><?php echo $pseudo?></b></a>, <?php echo $le ?> <?php echo $date ?> : </td>
							</tr>
							<tr>
								<td>
									<?php echo $commentaire?>
								</td>
							</tr>
							<tr>
								<td>
									<?php for ($i=0; $i < $note; $i++) { ?>
										<img src="Autres/etoile.png" height="15px" width="15px" />
									<?php } ?>
								</td>
							</tr>
							<tr>
								<td>
									___________________
								</td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>

			<div class="FormulaireVueClub">
				<div class="noterCommenterVueClub">

					<?php
					if(isset($_SESSION['pseudo'])){
						if($membresNote[0][0] != ""){
							foreach($membresNote as list($nomMembre)){
								if($nomMembre != $_SESSION['pseudo']){
									$i=1;
								} else{
									$i=2;
									break;
								}
							}
						} else{
							$i=1;
						}
					} else{
						$i=3;
					}

					?>

					<?php if($i == 1){ ?>
						<h3> <?php echo $notecomm ?></h3>
						<form name = "formulaireNotation" method="post" action = "">
							<div class="ratingVueClub"><!--
							--><input name="noteClub" value="5" id="e5" type="radio"><label for="e5">☆</label><!--
							--><input name="noteClub" value="4" id="e4" type="radio"><label for="e4">☆</label><!--
							--><input name="noteClub" value="3" id="e3" type="radio"><label for="e3">☆</label><!--
							--><input name="noteClub" value="2" id="e2" type="radio"><label for="e2">☆</label><!--
							--><input name="noteClub" value="1" id="e1" type="radio"><label for="e1">☆</label>
							</div>
							<p>
							 <label for="commentaireClub"> <?php echo $ajcomm ?> </label> <br/><br/>
							 <textarea name="commentaireClub"> </textarea>
							</p>
						 <p> <input type="submit" name="Noter" value="<?php echo $not ?>"> </p>
					 </form>
				 <?php }?>

					<?php if($i == 2){ ?>
						<b> <?php echo $thxavis ?> </b>
					<?php }?>

					<?php if($i == 3){ ?>
					 	 <?php echo $inscnote ?> <a href="index.php?page=inscription"><input type="button" name="inscription" value="<?php echo $insc ?>"></a>
				 	<?php }?>
				</div>
			</div>
		</div>


  </body>
