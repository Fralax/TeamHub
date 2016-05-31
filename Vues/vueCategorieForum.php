<?php $this->titre = "Forum - ".$_GET['categorie']; ?>

  <body>
    <?php
    require_once 'Controleurs/controleurAdministration.php';
    $admin = new controleurAdministration();
    $verifAdmin = $admin->verifAdmin();
      if(isset($_SESSION['pseudo'])){
        if($verifAdmin == true){
          $n = 3;
        } else {
          $n = 1;
        }
      } else{
        $n = 2;
      }
    ?>

    <div class="conteneurCategorieForum">
      <?php if ($n == 1 || $n == 3){ ?>
      <div class="boutonNouveauSujetCategorieForum">
        <p> <a href="index.php?page=creersujet&categorie=<?php echo $_GET['categorie'] ?>" > Créer un nouveau Sujet </a> </p>
      </div>
      <?php } ?>
      <table class="tableauSujetsCategorieForum">

				<thead class="enTeteCategorieForum">
					<tr>
						<th class="titreCategorieCategorieForum">
							<h3><?php echo $_GET['categorie'] ?></h3>
						</th>
						<th class="nbrReponsesCategorieForum">
							Réponses
						</th>
						<th class="nbrVuesCategorieForum">
							Vues
						</th>
						<th class="dernierMessageCategorieForum">
							Dernier Message
						</th>
					</tr>
				</thead>

        <?php foreach ($sujets as list($id, $nomSujet, $dateSujet, $auteurSujet, $nombreReponsesSujet, $activiteSujet, $nbrVues)){ ?>
        <tr>
          <td class="nomSujetCategorieForum">
						<?php if ($activiteSujet == "0"): ?>
							<img src="Autres/lock.png" width="20px" height="20px"/>
						<?php endif; ?>
            <a href="index.php?page=sujetforum&id=<?php echo $id?>"> <?php echo $nomSujet?> </a>
          </td>
          <td class="nbrReponsesCategorieForum" rowspan = "2">
            <?php echo $nombreReponsesSujet ?>
          </td>
          <td class="nbrVuesCategorieForum" rowspan = "2">
            <?php echo $nbrVues ?>
          </td>
          <td class="dernierMessageCategorieForum" rowspan = "2">
            <?php
						$forum = new forum();
						$dernierMessage = $forum->recupDernierMessage($id)->fetch();
						?>
						<div class="dernierMessageAuteurCategorieForum">
							Par <a href="index.php?page=profil&nom=<?php echo $dernierMessage['m_auteur'] ?>"> <?php echo $dernierMessage['m_auteur'] ?> </a>
						</div>
						<div class="dernierMessageDateCategorieForum">
							<?php $dateEntiereSujet = date_create($dernierMessage['m_date']) ?>
							<?php $dateSujetDernierMessage = date_format($dateEntiereSujet, 'd/m/Y') ?>
							<?php $heureSujetDernierMessage = date_format($dateEntiereSujet, 'H:i:s') ?>
							le <b><?php echo $dateSujetDernierMessage ?></b> à <b><?php echo $heureSujetDernierMessage ?></b>
						</div>
          </td>
        </tr>
        <tr>
          <td class="nomAuteurDateCategorieForum">
            <?php $dateEntiereSujet = date_create($dateSujet) ?>
            <?php $dateSujet = date_format($dateEntiereSujet, 'd/m/Y') ?>
            <?php $heureSujet = date_format($dateEntiereSujet, 'H:i:s') ?>
            par <b><a href="index.php?page=profil&nom=<?php echo $auteurSujet ?>"><?php echo $auteurSujet ?></a></b>, le <b><?php echo $dateSujet ?></b> à <b><?php echo $heureSujet ?></b>
          </td>
        </tr>
        <?php } ?>
			</table>

    </div>

  </body>
