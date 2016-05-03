<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="Contenu/gabarit.css" />
    <title><?= $titre ?></title>
</head>

  <?php if(isset($_SESSION['pseudo'])){ ?>

    <body>

      <header>
        <div id="logo">
          <a href="index.php?page=accueil"><img id="logo" src="/TeamHub/Autres/Logo.tiff" width="306" height="172" ></a>
          <h1> Le sport, pour tous. </h1>
        </div>

        <nav>
          <ul id="barreMenu">
          <li> <a href="index.php?page=accueil"> ACCUEIL </a> </li><!--
       --><li> <a href=""> GROUPE </a>
            <ul>
              <li><a href="index.php?page=creationgroupe"> Créer un Groupe </a> </li>
              <li><a href="index.php?page=groupes"> Rejoindre un Groupe </a> </li>
              <li><a href="index.php?page=mesgroupes"> Mes Groupes </a> </li>
            </ul>
          </li><!--
       --><li> <a href=""> CLUB </a>
            <ul>
              <li><a href="index.php?page=accueil"> Voir la liste des clubs </a> </li>
              <li><a href="index.php?page=accueil"> Ajout d'un club </a> </li>
            </ul>
          </li><!--
       --><li> <a href=""> RECHERCHER </a>
            <ul>
              <li>
                <?php
                require_once 'Controleurs/controleurRecherche.php';
                $recherche = new controleurRecherche();
                $recherche->rechercheGroupes();
                ?>
                <form action="" id="formulaireRecherche" name="formulaireRecherche" method="post">
                  <input type="text" name="BarreRecherche" placeholder="Rechercher">
                  <input type="submit" name="Recherche" value="Rechercher">
                </form>
               </li>
            </ul>
          </li><!--
       --><li> <a href="">  <?php echo "BONJOUR, ", strtoupper($_SESSION['pseudo']) ?> </a>
            <ul>
              <li><a href="index.php?page=mesinfos"> Modifier son profil </a></li>
              <li><a href="index.php"> Déconnexion </a></li>
            </ul>
          </li>
        </ul>
        </nav>
      </header>

      <div id="wrap">
        <div id="main" class="clearfix">
          <?= $contenu ?>
        </div>
      </div>

      <footer>
        <div class="reseaux">
          <a href="https://www.facebook.com/TeamHub-1068359279883250/?fref=ts"> <img src="Autres/facebook.png" alt="facebook" height="30" width="30"> </a>
          &nbsp;
          <a href="https://twitter.com/TimHeub"> <img src="Autres/twitter.png" alt="twitter" height="32" width="32"> </a>
        </div>
        <div class="aPropos">
          <a href="index.php?page=apropos"> A propos </a>
        </div>

        TeamHub &copy; 2016 - Tous droits r&eacute;serv&eacute;s
      </footer>

    </body>

  <?php } else{ ?>

    <body>

      <header>

        <div id="logo">
          <a href="index.php?page=accueil"><img id="logo" src="/TeamHub/Autres/Logo.tiff" width="306" height="172" ></a>
          <h1> Le sport, pour tous. </h1>
        </div>

        <nav>
          <ul id="barreMenu">
            <li> <a href="index.php"> ACCUEIL </a> </li><!--
         --><li> <a href="">  RECHERCHER </a>
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
            </li><!--
         --><li> <a href=""> CONNEXION </a>
              <ul>
                <li>
                  <?php
                  require_once 'Controleurs/controleurConnexion.php';
                  $cnx = new connexion();
                  $cnx->connexionUtilisateurs();
                  ?>
                  <form action="" id="formulaireAccueil" name="formulaireAccueil" method="post">
                    <p> <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required> </p>
                    <p> <input type="password" name="PasswordAccueil" id="passwordaccueil" placeholder="Mot de Passe" required> </p>
                    <p> <input name="connexion" type="submit" id="connexion" value = "Connexion"> </p>
                  </form>
                </li>
              </ul>
            </li><!--
         --><li> <a href="index.php?page=inscription"> INSCRIPTION </a> </li>
          </ul>
        </nav>

      </header>

      <div id="wrap">
        <div id="main" class="clearfix">
          <?= $contenu ?>
        </div>
      </div>

      <footer>
        <div class="reseaux">
          <a href="https://www.facebook.com/TeamHub-1068359279883250/?fref=ts"> <img src="Autres/facebook.png" alt="facebook" height="30" width="30"> </a>
          &nbsp;
          <a href="https://twitter.com/TimHeub"> <img src="Autres/twitter.png" alt="twitter" height="32" width="32"> </a>
        </div>
        <div class="aPropos">
          <a href="index.php?page=apropos"> A propos </a>
        </div>

        TeamHub &copy; 2016 - Tous droits r&eacute;serv&eacute;s
      </footer>

    </body>

  <?php } ?>

</html>
