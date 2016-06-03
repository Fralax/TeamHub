<?php $this->titre = $vueCategorieForum.$_GET['categorie'];
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>

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
        <p> <a href="index.php?page=creersujet&categorie=<?php echo $_GET['categorie'] ?>" > <?php echo $nouvsuj ?></a> </p>
      </div>
      <?php } ?>
      <table class="tableauSujetsCategorieForum">

				<thead class="enTeteCategorieForum">
					<tr>
						<th class="titreCategorieCategorieForum">
							<h3><?php echo $_GET['categorie'] ?></h3>
						</th>
						<th class="nbrReponsesCategorieForum">
							<?php echo $rep ?>
						</th>
						<th class="nbrVuesCategorieForum">
							<?php echo $vues ?>
						</th>
						<th class="dernierMessageCategorieForum">
							<?php echo $forum1entete4 ?>
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
							<?php echo $par ?> <a href="index.php?page=profil&nom=<?php echo $dernierMessage['m_auteur'] ?>"> <?php echo $dernierMessage['m_auteur'] ?> </a>
						</div>
						<div class="dernierMessageDateCategorieForum">
							<?php $dateEntiereSujet = date_create($dernierMessage['m_date']) ?>
							<?php $dateSujetDernierMessage = date_format($dateEntiereSujet, 'd/m/Y') ?>
							<?php $heureSujetDernierMessage = date_format($dateEntiereSujet, 'H:i:s') ?>
							<?php echo $le ?> <b><?php echo $dateSujetDernierMessage ?></b> à <b><?php echo $heureSujetDernierMessage ?></b>
						</div>
          </td>
        </tr>
        <tr>
          <td class="nomAuteurDateCategorieForum">
            <?php $dateEntiereSujet = date_create($dateSujet) ?>
            <?php $dateSujet = date_format($dateEntiereSujet, 'd/m/Y') ?>
            <?php $heureSujet = date_format($dateEntiereSujet, 'H:i:s') ?>
            <?php echo $par ?> <b><a href="index.php?page=profil&nom=<?php echo $auteurSujet ?>"><?php echo $auteurSujet ?></a></b>, <?php echo $le ?> <b><?php echo $dateSujet ?></b> <?php echo $a ?> <b><?php echo $heureSujet ?></b>
          </td>
        </tr>
        <?php } ?>
			</table>

    </div>

  </body>
