<?php $this->titre = "Administration - Bannissement Groupe";
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>
	<body>

    <?php
      if ($caract['g_admin'] == $_SESSION['pseudo']) {
        $i = 1;
      } else{
        $i = 2;
      }
    ?>
		<div class="bannirMembreGroupe">
    <?php if( $i == 1){ ?>
		<div class="membres">
			<h2> <?php echo $listpeutban.$nom?> </h2>
      <table>
        <?php foreach ($membres as list($nomMembre)) { ?>
					<?php if ($nomMembre != $_SESSION['pseudo']){ ?>
          <tr>
            <td>
              <a href="index.php?page=profil&nom=<?php echo $nomMembre ?>"> <p> <?php echo $nomMembre?></p></a>
            </td>
            <td>
              <a href="#" onclick="if (confirm('<?php echo $surban.$nomMembre ?> ?')) window.location='index.php?page=confirmationbannissementmembre&nom=<?php echo $_GET['nom'] ?>&pseudo=<?php echo $nomMembre ?>'; return false"> <input type="button" name="bannirDuGroupe" value="<?php echo $bagr ?>"> </a>
            </td>
          </tr>
					<?php } ?>
        <?php } ?>
      </table>
		</div>
    <?php } ?>

    <?php if($i == 2){ ?>
        <?php echo $nonacces ?>
    <?php } ?>
		</div>
  </body>
