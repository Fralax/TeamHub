<?php $this->titre = "Recherche Avancée - Membre";
include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
} ?>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueResultatsRecherche.css" />
		<title>Recherche</title>
	</head>

	<body>
		<div class="conteneurVueRechAvanceeMembres">
			<h2><?php echo"Résultats pour la recherche : "?></h2>
      <table>
        <caption> <h3><?php echo $membrs ?></h3> </caption>
        <?php if ($membres == array()){ ?>
          <tr>
            <td>
              <?php echo $nonemem ?>
            </td>
          </tr>
        <?php } else{ ?>
        <?php foreach ($membres as list($nom, $departement, $photo)){ ?>
          <tr>
            <td>
              <img src="imagesUtilisateurs/<?php echo $photo?>"/>
            </td>
            <td>
              <a href="index.php?page=profil&nom=<?php echo $nom?>"> <?php echo $nom?> </a>
            </td>
          </tr>
          <?php } ?>
        <?php } ?>
      </table>
		</div>
  </body>
</html>
