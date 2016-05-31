<?php $this->titre = "Forum - Sujet"; ?>
<body>
		<?php
    require_once 'Controleurs/controleurAdministration.php';
    $admin = new controleurAdministration();
    $verifAdmin = $admin->verifAdmin();
			if(isset($_SESSION['pseudo'])){
        if ($verifAdmin == true){
				  $n = 2;
        } elseif($message['f_auteur'] == $_SESSION['pseudo']){
          $n = 1;
        } else {
          $n = 3;
        }
			} else {
        $n = 4;
      }
		?>

		<div class="conteneurVueSujetForum">
			<table class = "detailsSujetVueSujetForum">
				<tr class="enTeteSujetTopVueSujetForum">
					<td>
						<?php echo $message['f_sujet'] ?>
					</td>
					<td class="dateActionsVueSujetForum">
						<div class="dateVueSujetForum">
							<?php $dateEntiereSujet = date_create($message['f_date']) ?>
							<?php $dateSujet = date_format($dateEntiereSujet, 'd/m/Y') ?>
							<?php $heureSujet = date_format($dateEntiereSujet, 'H:i:s') ?>
							le <b> <?php echo $dateSujet ?> </b> à <b> <?php echo $heureSujet ?> </b>
						</div>
						<div class="actionsVueSujetForum">
							<?php if (($n == 1 || $n == 2) && $message['f_actif'] == "1"){ ?>
								<a href="index.php?page=cloreSujet&id=<?php echo $_GET['id'] ?>"> Clore le Sujet </a>
							<?php } ?>
							<?php if ($n == 2){ ?>
								<a href="index.php?page=supprimersujet&id=<?php echo $_GET['id'] ?>"> Supprimer le Sujet </a>
							<?php } ?>
						</div>
					</td>
				</tr>

				<tr class="messageVueSujetForum">
					<td class="photoMembreSujetVueSujetForum">
						<div class="photoVueSujetForum">
							<?php
								$utilisateur = new utilisateurs();
								$photo = $utilisateur->afficherPhotoForum($message['f_auteur'])->fetch();
							?>
							<img src="imagesUtilisateurs/<?php echo $photo[0] ?>"/>
						</div>
						<div class="pseudoVueSujetForum">
							<?php echo $message['f_auteur'] ?>
						</div>
					</td>
					<td>
						<?php echo $message['f_message'] ?>
					</td>
				</tr>

				<?php foreach ($reponses as list($auteur, $reponse, $id, $date)){ ?>
					<tr class="enTeteSujetVueSujetForum">
						<td>
							Re : <?php echo $message['f_sujet'] ?>
						</td>
						<td class="dateActionsVueSujetForum">
							<div class="dateVueSujetForum">
							<?php $dateEntiereMessage = date_create($date) ?>
							<?php $dateMessage = date_format($dateEntiereMessage, 'd/m/Y') ?>
							<?php $heureMessage = date_format($dateEntiereMessage, 'H:i:s') ?>
							le <b> <?php echo $dateMessage ?> </b> à <b> <?php echo $heureMessage ?> </b>
						</div>
						<div class="actionsVueSujetForum">
							<?php if ($n == 2){ ?>
								<a href="index.php?page=supprimermessage&id=<?php echo $id ?>"> Supprimer le message</a>
							<?php } ?>
						</div>
						</td>
					</tr>

				<tr class="messageVueSujetForum">
					<td class="photoMembreSujetVueSujetForum">
						<div class="photoVueSujetForum">
							<?php
								$utilisateur = new utilisateurs();
								$photo = $utilisateur->afficherPhotoForum($auteur)->fetch();
							?>
							<img src="imagesUtilisateurs/<?php echo $photo[0] ?>"/>
						</div>
						<div class="pseudoVueSujetForum">
							<?php echo $auteur ?>
						</div>
					</td>
					<td>
						<?php echo $reponse ?>
					</td>
				</tr>
				<?php } ?>
			</table>
		</div>

		<?php if (($n == 1 || $n == 2 || $n == 3) && $message['f_actif'] == "1"){ ?>
			<div class="conteneur2VueSujetForum">
				Postez une réponse !
				<form name = "formulaireNouvelleReponse" method="post" action = "">
					<textarea name="message" rows="7" cols="70"> </textarea>
					<p> <input type="submit" name="Repondre" value="Répondre"> </p>
				</form>
			</div>
		<?php } ?>


  </body>
