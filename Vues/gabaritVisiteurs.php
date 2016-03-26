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

                  <div class= "gauche">
                    <a href="index.php"><img id="logo" src="/TeamHub/Autres/Logo.png" width="306" height="172" ></a>
                  </div>

                  <div class= "droite">
              		  <form action="" id="formulaireAccueil" name="formulaireAccueil" method="post">
              			  <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
                		  <input type="password" name="PasswordAccueil" id="passwordaccueil" placeholder="Mot de Passe" required>
                		  <input name="connexion" type="submit" id="connexion" value = "Connexion">
              		  </form>
            			  <a href="index.php?page=inscription"> <input name="inscription" type="button" id="inscription" value = "Inscription"> </a>
                  </div>
            		</p>

            </header>

            <div id="contenu">
                <?= $contenu ?>
            </div>

            <footer id="piedBlog">
              <div>
                <a href="index.php?page=aproposvisiteurs"> A propos </a>
              </div>

                Site réalisé par Valentin Fortun et Romain Frayssinet
            </footer>

        </div>
    </body>
</html>
