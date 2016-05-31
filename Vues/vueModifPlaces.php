<?php $this->titre = "Groupe - Places"; ?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueModifPlaces.css" />
		<title>Changement du nombre de places dans le Groupe</title>
	</head>
	<body>

		<?php
      if ($caract['g_admin'] == $_SESSION['pseudo']) {
        $i = 1;
      } else{
        $i = 2;
      }
    ?>

		<?php if( $i == 1){ ?>
		<h2>Changement du nombre de places dans le groupe </h2>

    <form action="" method="post">
      <input type="number" name="placesTotales" placeholder="Nombre de places" size="25" min="0"  />
      <input type="submit" name="Modifier" value="Modifier" >
    </form>
		<?php } ?>
		<?php if($i == 2){ ?>
        Vous n'avez pas accès à cette page.
    <?php } ?>
  </body>
</html>
