<!doctype html>
<html>

<?php include('Vues/français.php');
if($_COOKIE['langue'] == "Francais"){
  include('Vues/français.php');
}
elseif($_COOKIE['langue'] == "English") {
  include('Vues/English.php');
}?>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="Contenu/gabarit.css" />
    <link rel="stylesheet" href="Contenu/vueAccueil.css" />
    <link rel="stylesheet" href="Contenu/vueResultatsRecherche.css" />
    <link rel="stylesheet" href="Contenu/vueAdmin.css" />
    <link rel="stylesheet" href="Contenu/vueAdminGroupeAModifier.css" />
    <link rel="stylesheet" href="Contenu/vueAjoutClub.css" />
    <link rel="stylesheet" href="Contenu/vueAjoutFAQ.css" />
    <link rel="stylesheet" href="Contenu/vueAnnulationNotifGroupe.css" />
    <link rel="stylesheet" href="Contenu/vueAPropos.css" />
    <link rel="stylesheet" href="Contenu/vueBanni.css" />
    <link rel="stylesheet" href="Contenu/vueBannirMembre.css" />
    <link rel="stylesheet" href="Contenu/vueBannirMembreGroupe.css" />
    <link rel="stylesheet" href="Contenu/vueCategorieForum.css" />
    <title><?= $titre ?></title>
</head>
  <?php
    require_once 'Controleurs/controleurAdministration.php';
    $admin = new controleurAdministration();
    $verifAdmin = $admin->verifAdmin();
    if(isset($_SESSION['pseudo'])){
      if($verifAdmin == true){
        $j = 0;
      } else{
        $j = 1;
      }

    } else{
      $j = 2;
    }
  ?>

  <?php if($j == 0){ ?>

    <body>

      <header>
        <div id="logo">
          <a href="index.php?page=accueil"><img id="logo" src="Autres/Logo.png" width="306" height="172" ></a>
          <h1> <?php echo $slogan  ?> </h1>
        </div>

        <nav>
          <ul id="barreMenu">
          <li> <a href="index.php?page=accueil"> <?php echo $menu1  ?> </a> </li><!--
       --><li> <?php echo $menu2 ?>
            <ul>
              <li><a href="index.php?page=creationgroupe"> <?php echo $ssmenu1 ?> </a> </li>
              <li><a href="index.php?page=groupes"> <?php echo $ssmenu2 ?> </a> </li>
              <li><a href="index.php?page=mesgroupes"> <?php echo $ssmenu3 ?> </a> </li>
            </ul>
          </li><!--
       --><li> <?php echo $menu3 ?>
            <ul>
              <li><a href="index.php?page=listeclubs"> <?php echo $ssmenu4 ?> </a> </li>
              <li><a href="index.php?page=ajoutclub"> <?php echo $ssmenu5 ?> </a> </li>
            </ul>
          </li><!--
       --><li> <?php echo $menu4 ?>
            <ul>
              <li>
                <?php
                require_once 'Controleurs/controleurRecherche.php';
                $recherche = new controleurRecherche();
                $recherche->rechercheGroupes();
                ?>
                <form action="" id="formulaireRecherche" name="formulaireRecherche" method="post">
                  <input type="text" name="BarreRecherche" placeholder=<?php echo $phRecherche ?>>
                  <input type="submit" name="Recherche" value="Rechercher">
                </form>
               </li>
               <li>
                 <a href="index.php?page=rechercheavancee"> <?php echo $rechercheAvancee ?> </a>
               </li>
            </ul>
          </li><!--
        --><li> <?php echo $menu5 ?>
              <ul>
                <li><a href="index.php?page=afficheraccueilforum"> <?php echo $ssmenu6 ?> </a> </li>
                <li><a href="index.php?page=affichagefaq"> <?php echo $ssmenu7 ?> </a> </li>
              </ul>
           </li><!--
       --><li> <?php echo $menu6.", ", strtoupper($_SESSION['pseudo']) ?>
            <ul>
              <?php require_once 'Controleurs/controleurMembres.php';
              $photo = new membres();
              $afficher = $photo->affichagePhoto();
              ?>
              <li><img src="imagesUtilisateurs/<?php echo $afficher[0]?>" height="70em" width="70em"/></li>

              <li><a href="index.php?page=profil&nom=<?php echo $_SESSION['pseudo'] ?>"> <?php echo $ssmenu8 ?> </a></li>

              <li><a href="index.php?page=administration"> <?php echo $ssmenu9 ?> </a></li>
              <li><a href="index.php?"> <?php echo $ssmenu10 ?> </a></li>
            </ul>
          </li>
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
          <a href="index.php?page=apropos"> <?php echo $footer ?> </a>
        </div>
        <div class="langue">
          <a href="index.php?page=changementlangue&langue=Francais"> <img src="Autres/Fr.jpg" alt="facebook" height="30" width="30"> </a>
          &nbsp;
          <a href="index.php?page=changementlangue&langue=English"> <img src="Autres/En.png" alt="twitter" height="32" width="32"> </a>
        </div>

        TeamHub &copy; 2016 - Tous droits r&eacute;serv&eacute;s
      </footer>
    </body>
  <?php } ?>

  <?php if($j == 1){ ?>

    <body>

      <header>
        <div id="logo">
          <a href="index.php?page=accueil"><img id="logo" src="Autres/Logo.png" width="306" height="172" ></a>
          <h1> <?php echo $slogan  ?> </h1>
        </div>

        <nav>
          <ul id="barreMenu">
          <li> <a href="index.php?page=accueil"> <?php echo $menu1  ?> </a> </li><!--
       --><li> <?php echo $menu2 ?>
            <ul>
              <li><a href="index.php?page=creationgroupe"> <?php echo $ssmenu1 ?> </a> </li>
              <li><a href="index.php?page=groupes"> <?php echo $ssmenu2 ?> </a> </li>
              <li><a href="index.php?page=mesgroupes"> <?php echo $ssmenu3 ?> </a> </li>
            </ul>
          </li><!--
       --><li> <?php echo $menu3 ?>
            <ul>
              <li><a href="index.php?page=listeclubs"> <?php echo $ssmenu4 ?> </a> </li>
              <li><a href="index.php?page=ajoutclub"> <?php echo $ssmenu5 ?> </a> </li>
            </ul>
          </li><!--
       --><li> <?php echo $menu4 ?>
            <ul>
              <li>
                <?php
                require_once 'Controleurs/controleurRecherche.php';
                $recherche = new controleurRecherche();
                $recherche->rechercheGroupes();
                ?>
                <form action="" id="formulaireRecherche" name="formulaireRecherche" method="post">
                  <input type="text" name="BarreRecherche" placeholder=<?php echo $phRecherche ?>>
                  <input type="submit" name="Recherche" value="Rechercher">
                </form>
               </li>
               <li>
                 <a href="index.php?page=rechercheavancee"> <?php echo $rechercheAvancee ?> </a>
               </li>
            </ul>
          </li><!--
        --><li> <?php echo $menu5 ?>
              <ul>
                <li><a href="index.php?page=afficheraccueilforum"> <?php echo $ssmenu6 ?> </a> </li>
                <li><a href="index.php?page=affichagefaq"> <?php echo $ssmenu7 ?> </a> </li>
              </ul>
           </li><!--
       --><li> <?php echo $menu6.", ", strtoupper($_SESSION['pseudo']) ?>
            <ul>
              <?php require_once 'Controleurs/controleurMembres.php';
              $photo = new membres();
              $afficher = $photo->affichagePhoto();
              ?>
              <li><img src="imagesUtilisateurs/<?php echo $afficher[0]?>" height="70em" width="70em"/></li>

              <li><a href="index.php?page=profil&nom=<?php echo $_SESSION['pseudo'] ?>"> <?php echo $ssmenu8 ?> </a></li>

              <li><a href="index.php?"> <?php echo $ssmenu10 ?> </a></li>
            </ul>
          </li>
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
          <a href="index.php?page=apropos"> <?php echo $footer ?> </a>
        </div>
        <div class="langue">
          <a href="index.php?page=changementlangue&langue=Francais"> <img src="Autres/Fr.jpg" alt="facebook" height="30" width="30"> </a>
          &nbsp;
          <a href="index.php?page=changementlangue&langue=English"> <img src="Autres/En.png" alt="twitter" height="32" width="32"> </a>
        </div>

        TeamHub &copy; 2016 - Tous droits r&eacute;serv&eacute;s
      </footer>
    </body>
  <?php } ?>

<?php if($j == 2){ ?>
    <body>

      <header>

        <div id="logo">
          <a href="index.php?page=accueil"><img id="logo" src="Autres/Logo.png" width="306" height="172" ></a>
          <h1> Le sport, pour tous. </h1>
        </div>

        <nav>
          <ul id="barreMenu">
            <li> <a href="index.php?page=accueil"> <?php echo $menu1 ?> </a> </li><!--
         --><li>  <?php echo $menu4 ?>
              <ul>
                <li>
                  <?php
                  require_once 'Controleurs/controleurRecherche.php';
                  $recherche = new controleurRecherche();
                  $recherche->rechercheGroupes();
                  ?>
                  <form action="" id="formulaireRecherche" name="formulaireRecherche" method="post">
                    <input type="text" name="BarreRecherche" placeholder="<?php echo $phRecherche ?>">
                    <input type="submit" name="Recherche" value="Rechercher" id="Rechercher">
                  </form>
                 </li>
                 <li>
                   <a href="index.php?page=rechercheavancee"> <?php echo $rechercheAvancee ?> </a>
                 </li>
              </ul>
            </li><!--
            --><li> <?php echo $menu5 ?>
                  <ul>
                    <li><a href="index.php?page=afficheraccueilforum"> <?php echo $ssmenu6 ?> </a> </li>
                    <li><a href="index.php?page=affichagefaq"> <?php echo $ssmenu7 ?> </a> </li>
                  </ul>
               </li><!--
         --><li> <?php echo $menu7 ?>
              <ul>
                <li>
                  <?php
                  require_once 'Controleurs/controleurConnexion.php';
                  $cnx = new connexion();
                  $cnx->connexionUtilisateurs();
                  ?>
                  <form action="" id="formulaireAccueil" name="formulaireAccueil" method="post">
                    <p> <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required> </p>
                    <p> <input type="password" name="PasswordAccueil" id="passwordaccueil" placeholder=<?php echo $phConnexion ?> required> </p>
                    <p> <input name="connexion" type="submit" id="connexion" value = "Connexion"> </p>
                  </form>
                  <a href="index.php?page=motdepasseoublie"><?php echo $ssmenu11 ?></a>
                </li>
              </ul>
            </li><!--
         --><li> <a href="index.php?page=inscription"> <?php echo $menu8 ?> </a> </li>
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
          <a href="index.php?page=apropos"> <?php echo $footer ?> </a>
        </div>
        <div class="langue">
          <a href="index.php?page=changementlangue&langue=Francais"> <img src="Autres/Fr.jpg" alt="facebook" height="30" width="30"> </a>
          &nbsp;
          <a href="index.php?page=changementlangue&langue=English"> <img src="Autres/En.png" alt="twitter" height="32" width="32"> </a>
        </div>

        TeamHub &copy; 2016 - Tous droits r&eacute;serv&eacute;s
      </footer>

    </body>

  <?php } ?>

</html>
