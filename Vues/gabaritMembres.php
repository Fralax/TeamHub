<!doctype html>
<html lang="fr">

    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/style.css" />
        <title><?= $titre ?></title>
    </head>

    <body>

      <header>
        <div id="headerGauche"> <a href="index.php"><img id="logo" src="/TeamHub/Autres/Logo.png" width="306" height="172" ></a> </div>
        <div id="headerDroite">
        <?php echo "Bonjour, ", $_POST['pseudo'], " ! "; ?>
        <ul>
          <li><a href="index.php?page=accueilmembres"> Accueil </a></li>
          <li><a href="index.php?page=creationgroupe"> Groupe </a></li>
          <li><a href="index.php?page="> Club </a></li>
          <li><a href="index.php?page="> Profil </a></li>
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
          <a href="index.php?page=aproposmembres"> A propos </a>
        </div>
        Site réalisé par le groupe G5C
      </footer>

    </body>

</html>
