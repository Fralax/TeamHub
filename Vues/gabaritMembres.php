<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/style.css" />
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">

            <header>
              <div id="gauche"> <a href="index.php"><img id="logo" src="/TeamHub/Autres/Logo.png" width="306" height="172" ></a> </div>
              <div id="droite">
              <?php echo "Bonjour, ", $_POST['pseudo'], " ! "; ?>

              <ul>
				        <li><a href="index.php?page=accueilmembres"> Accueil </a></li>
				        <li><a href="index.php?page="> Groupe </a></li>
				        <li><a href="index.php?page="> Club </a></li>
				        <li><a href="index.php?page="> Profil </a></li>
			       </ul>

           </div>

            </header>

            <div id="contenu">
                <?= $contenu ?>
            </div>

            <footer id="piedBlog">
              <div>
                <a href="index.php?page=aproposmembres"> A propos </a>
              </div>

              Site réalisé par Valentin Fortun et Romain Frayssinet
            </footer>

        </div>
    </body>
</html>
