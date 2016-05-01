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

        <div id="headerGauche">
          <a href="index.php?page=accueil"><img id="logo" src="/TeamHub/Autres/Logo.tiff" width="306" height="172" ></a>
        </div>

        <div id="headerDroite">
          <ul id="menu-deroulant">
          <li><a href="index.php?page=accueil"> Accueil </a>
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
              <li><a href="index.php?page=accueil"> Voir la liste des clubs </a> </li>
            </ul>
          </li>

          <li> Rechercher
            <ul>
              <li>
                <?php
                require_once 'Controleurs/controleurRecherche.php';
                $recherche = new controleurRecherche();
                $recherche->rechercheGroupes();
                ?>
                <form action="" id="formulaireRecherche" name="formulaireRecherche" method="post">
                  <input type="text" name="BarreRecherche" placeholder="Rechercher">
                  <p> <input type="submit" name="Recherche" value="Rechercher" onclick="return true;"> </p>
                </form>
               </li>
            </ul>
          </li>

          <li> <?php echo"Bonjour, ", $_SESSION['pseudo'] ?>
            <ul>
              <li><a href="index.php?page=mesinfos"> Modifier ses informations personnelles </a></li>
              <li><a href="index.php"> Déconnexion </a></li>
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
          <a href="index.php?page=apropos"> A propos </a>
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
          <a href="index.php"><img id="logo" src="/TeamHub/Autres/Logo.tiff" width="306" height="172" ></a>
        </div>
        <div id= "headerDroite">
          <ul id="menu-deroulant">
            <li><a href="index.php"> Accueil </a>
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

            <li> Rechercher
              <ul>
                <li>
                  <?php
                  require_once 'Controleurs/controleurRecherche.php';
                  $recherche = new controleurRecherche();
                  $recherche->rechercheGroupes();
                  ?>
                  <form action="" id="formulaireRecherche" name="formulaireRecherche" method="post">
                    <input type="text" name="BarreRecherche" placeholder="Rechercher">
                    <input type="submit" name="Recherche" value="Rechercher" id="Rechercher">
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
        <a href="index.php?page=apropos"> A propos </a>
      </footer>

    </body>

  <?php } ?>

</html>
