<!doctype html>
<html lang="fr">

    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/styleVisiteur.css" />
        <title><?= $titre ?></title>
    </head>

    <body>

      <header>
        <div id= "headerGauche">
          <a href="index.php"><img id="logo" src="/TeamHub/Autres/Logo.png" width="306" height="172" ></a>
        </div>
        <div id= "headerDroite">
          <ul id="menu-deroulant">
            <li><a href="index.php?page="> Accueil </a>
            </li>

            <li> Connexion
              <ul>
                <li>
                  <form action="" id="formulaireAccueil" name="formulaireAccueil" method="post">
                    <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
                    <input type="password" name="PasswordAccueil" id="passwordaccueil" placeholder="Mot de Passe" required>
                    <input name="connexion" type="submit" id="connexion" value = "Connexion">
                  </form>
                </li>
              </ul>
            </li>

            <li><a href="index.php?page=inscription"> Inscription </a>
            </li>

          </ul>


        </div>
      </header>

      <div id="wrap">
        <div id="main" class="clearfix">
          <?= $contenu ?>
        </div>
      </div>

      <footer>
        <div>
          Site réalisé par le groupe G5C
        </div>
        <a href="index.php?page=aproposvisiteurs"> A propos </a>
      </footer>

    </body>
</html>
