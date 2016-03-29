<!doctype html>
<html lang="fr">

    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/style.css" />
        <title><?= $titre ?></title>
    </head>

    <body>

      <header>
        <div id= "headerGauche">
          <a href="index.php"><img id="logo" src="/TeamHub/Autres/Logo.png" width="306" height="172" ></a>
        </div>
        <div id= "headerDroite">
          <form action="" id="formulaireAccueil" name="formulaireAccueil" method="post">
            <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required>
            <input type="password" name="PasswordAccueil" id="passwordaccueil" placeholder="Mot de Passe" required>
            <input name="connexion" type="submit" id="connexion" value = "Connexion">
            <a href="index.php?page=inscription"> <input name="inscription" type="button" id="inscription" value = "Inscription"> </a>
          </form>
        </div>
      </header>

      <div id="wrap">
        <div id="main" class="clearfix">
          <?= $contenu ?>
        </div>
      </div>

      <footer>
        <div>
          <a href="index.php?page=aproposmembres"> A propos </a>
        </div>
        Site réalisé par le groupe G5C
      </footer>

    </body>
</html>
