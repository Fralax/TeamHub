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
              <p>

              </p>
            </header>

            <div id="contenu">
                <?= $contenu ?>
            </div>

            <footer id="piedBlog">
                Site réalisé par Valentin Fortun et Romain Frayssinet
            </footer>

        </div>
    </body>
</html>
