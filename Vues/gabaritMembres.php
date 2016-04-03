<!doctype html>
<html lang="fr">

    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/styleMembre.css" />
        <title><?= $titre ?></title>
    </head>

    <body>

      <header>
        <div id="headerGauche"> <a href="index.php"><img id="logo" src="/TeamHub/Autres/Logo.png" width="306" height="172" ></a> </div>
        <div id="headerDroite">
        <ul id="menu-deroulant">
          <li><a href="index.php?page=accueilmembres"> Accueil </a>
          </li>

          <li> Groupe
            <ul>
              <li><a href="index.php?page=creationgroupe"> Créer un Groupe </a> </li>
              <li><a href="index.php?page=groupes"> Rejoindre un Groupe </a> </li>
              <li><a href="index.php?page=mesgroupes"> Mes Groupes </a> </li>
            </ul>
          </li>

          <li> Club
            <ul>
              <li><a href="index.php?page="> Voir la liste des clubs </a> </li>
            </ul>
          </li>

          <li> Profil
            <ul>
              <li><a href="index.php?page=mesinfos"> Modifier ses informations personnelles </a> </li>
            </ul>
          </li>

          <li> <?php echo"Bonjour, ", $_SESSION['pseudo'] ?>
            <ul>
              <li><a href="index.php?page="> Déconnexion </a> </li>
            </ul>
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
          <a href="index.php?page=aproposmembres"> A propos </a>
        </div>
        Site réalisé par le groupe G5C
      </footer>

    </body>

</html>
