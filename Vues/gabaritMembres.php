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
              <p> <a href="index.php"><img id="logo" src="/TeamHub/Autres/Logo.png" width="306" height="172" ></a> </p>


              <ul>
				        <li><a href="index.php?page=accueilmembres"> <input name="Accueil" type="button" id="Accueil" value = "Accueil"> </a></li>
				        <li><a href="index.php?page="> <input name="Groupe" type="button" id="Groupe" value = "Groupe"> </a></li>
				        <li><a href="index.php?page="> <input name="Club" type="button" id="Club" value = "Club"> </a></li>
				        <li><a href="index.php?page="> <input name="Profil" type="button" id="Profil" value = "Profil"> </a></li>
			       </ul>

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
