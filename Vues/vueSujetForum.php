<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueSujetForum.css" />
		<title>Sujet</title>
	</head>

	<body>
		<?php
    require_once 'Controleurs/controleurAdministration.php';
    $admin = new controleurAdministration();
    $verifAdmin = $admin->verifAdmin();
			if(isset($_SESSION['pseudo'])){
        if ($message['f_auteur'] == $_SESSION['pseudo']){
				  $n = 1;
        } elseif($verifAdmin == true){
          $n = 2;
        } else {
          $n = 3;
        }
			} else {
        $n = 4;
      }
		?>

		<div class="conteneur">
			<table class = "detailsSujet">
				<tr class="enTeteSujet">
					<td>
						<?php echo $message['f_sujet'] ?>
					</td>
					<td>
						
					</td>
				</tr>

				<tr class="message">
					<td class="photoMembreSujet">
						<div class="photo">
							<?php
								$utilisateur = new utilisateurs();
								$photo = $utilisateur->afficherPhotoForum($message['f_auteur'])->fetch();
							?>
							<img src="imagesUtilisateurs/<?php echo $photo[0] ?>"/>
						</div>
						<div class="pseudo">
							<?php echo $message['f_auteur'] ?>
						</div>
					</td>
					<td>
						<?php echo $message['f_message'] ?>
					</td>
				</tr>

				<?php foreach ($reponses as list($auteur, $reponse, $id)){ ?>
					<tr class="enTeteSujet">
						<td>
							Re : <?php echo $message['f_sujet'] ?>
						</td>
						<td>

						</td>
					</tr>

				<tr class="message">
					<td class="photoMembreSujet">
						<div class="photo">
							<?php
								$utilisateur = new utilisateurs();
								$photo = $utilisateur->afficherPhotoForum($auteur)->fetch();
							?>
							<img src="imagesUtilisateurs/<?php echo $photo[0] ?>"/>
						</div>
						<div class="pseudo">
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
				<form name = "formulaireNouvelleReponse" method="post" action = "">
					<textarea name="message" rows="7" cols="70"> </textarea>
					<p> <input type="submit" name="Repondre" value="Répondre"> </p>
				</form>
			<?php } ?>


  </body>
</html>
