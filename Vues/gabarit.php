<!doctype html>
<html lang="fr">

  <?php if(isset($_SESSION['pseudo'])){ ?>

    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/styleMembre.css" />
        <title><?= $titre ?></title>
    </head>

    <body>

      <header>
        <div id="headerGauche"> <a href="index.php?page=accueilmembres"><img id="logo" src="/TeamHub/Autres/Logo.png" width="306" height="172" ></a> </div>
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
              <li><a href="index.php?page=accueilmembres"> Voir la liste des clubs </a> </li>
            </ul>
          </li>

          <li> Profil
            <ul>
              <li><a href="index.php?page=mesinfos"> Modifier ses informations personnelles </a> </li>
            </ul>
          </li>

          <li> <?php echo"Bonjour, ", $_SESSION['pseudo'] ?>
            <ul>
              <li><a href="index.php"> Déconnexion </a> </li>
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

  <?php } else{ ?>

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
                  <?php
                  require_once 'Controleurs/controleurConnexion.php';
                  $cnx = new connexion();
                  $cnx->connexionUtilisateurs();
                  ?>
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

  <?php } ?>

</html>
