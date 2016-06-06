<!doctype html>
<html>

<?php include('Vues/francais.php');
if($_COOKIE['langue'] == "Francais"){
	include('Vues/francais.php');
}
elseif($_COOKIE['langue'] == "English") {
	include('Vues/English.php');
}?>

<head>
    <meta charset="UTF-8" />

    <link rel="stylesheet" href="Contenu/gabarit.css" />
    <link rel="stylesheet" href="Contenu/vueGroupe.css" />
    <link rel="stylesheet" href="Contenu/vueGroupes.css" />
    <link rel="stylesheet" href="Contenu/vueAccueil.css" />
    <link rel="stylesheet" href="Contenu/vueAccueilForum.css" />
    <link rel="stylesheet" href="Contenu/vueResultatsRecherche.css" />
    <link rel="stylesheet" href="Contenu/vueAdmin.css" />
    <link rel="stylesheet" href="Contenu/vueAdminGroupeAModifier.css" />
    <link rel="stylesheet" href="Contenu/vueAjoutClub.css" />
    <link rel="stylesheet" href="Contenu/vueAjoutFAQ.css" />
    <link rel="stylesheet" href="Contenu/vueAnnulationNotifGroupe.css" />
    <link rel="stylesheet" href="Contenu/vueAPropos.css" />
    <link rel="stylesheet" href="Contenu/vueBanni.css" />
    <link rel="stylesheet" href="Contenu/vueBannirMembreGroupe.css" />
    <link rel="stylesheet" href="Contenu/vueCategorieForum.css" />
    <link rel="stylesheet" href="Contenu/vueClub.css" />
    <link rel="stylesheet" href="Contenu/vueConfirmationBannissementMembre.css" />
    <link rel="stylesheet" href="Contenu/vueConfirmationClub.css" />
    <link rel="stylesheet" href="Contenu/vueConfirmationEvenement.css" />
    <link rel="stylesheet" href="Contenu/vueConfirmationGroupe.css" />
    <link rel="stylesheet" href="Contenu/vueConfirmationMotDePasseReinitialise.css" />
    <link rel="stylesheet" href="Contenu/vueConfirmationNotifGroupe.css" />
    <link rel="stylesheet" href="Contenu/vueConfirmationNouveauMotDePasse.css" />
    <link rel="stylesheet" href="Contenu/vueCreationEvenements.css" />
    <link rel="stylesheet" href="Contenu/vueCreationGroupe.css" />
    <link rel="stylesheet" href="Contenu/vueCreationSujetForum.css" />
		<link rel="stylesheet" href="Contenu/vueFAQ.css" />
    <link rel="stylesheet" href="Contenu/vueInscription.css" />
    <link rel="stylesheet" href="Contenu/vueInvitationUtilisateur.css" />
    <link rel="stylesheet" href="Contenu/vueMailNonConfirme.css" />
    <link rel="stylesheet" href="Contenu/vueMdpOublie.css" />
    <link rel="stylesheet" href="Contenu/vueMdpOublieFormulaire.css" />
    <link rel="stylesheet" href="Contenu/vueMesGroupes.css" />
    <link rel="stylesheet" href="Contenu/vueModerationCommentairesClub.css" />
    <link rel="stylesheet" href="Contenu/vueModifAdmin.css" />
    <link rel="stylesheet" href="Contenu/vueModifClub.css" />
    <link rel="stylesheet" href="Contenu/vueModifPhotoClub.css" />
    <link rel="stylesheet" href="Contenu/vueProfil.css" />
    <link rel="stylesheet" href="Contenu/vueQuitterEvenement.css" />
    <link rel="stylesheet" href="Contenu/vueQuitterGroupe.css" />
    <link rel="stylesheet" href="Contenu/vueRechercheAvancee.css" />
    <link rel="stylesheet" href="Contenu/vueResultatsRechercheAvanceeClubs.css" />
    <link rel="stylesheet" href="Contenu/vueResultatsRechercheAvanceeGroupes.css" />
    <link rel="stylesheet" href="Contenu/vueResultatsRechercheAvanceeMembres.css" />
    <link rel="stylesheet" href="Contenu/vueResultatsRecherche.css" />
    <link rel="stylesheet" href="Contenu/vueSujetForum.css" />
    <link rel="stylesheet" href="Contenu/vueSuppressionEvenement.css" />
    <link rel="stylesheet" href="Contenu/vueSuppressionGroupe.css" />
    <link rel="stylesheet" href="Contenu/vueValidationCompte.css" />
    <link rel="stylesheet" href="Contenu/vueVoirLesClubs.css" />
    <link rel="stylesheet" href="Contenu/vueVoirLesMembres.css" />
    <link rel="stylesheet" href="Contenu/vueMessagerie.css" />
    <link rel="stylesheet" href="Contenu/vueNouvelleConversation.css" />
    <link rel="stylesheet" href="Contenu/vueConversation.css" />




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
                  <input type="text" name="BarreRecherche" placeholder="<?php echo $phRecherche ?>">
                  <input type="submit" name="Recherche" value="<?php echo $rec ?>">
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
			 			<span class="nbrMessages" style="background-color:red;color:white;font-weight:bold;border-radius:30px;border: 2px solid;padding:2px 3px 2px 4px;top: -6px;right:-6px;font-size:1em;">0</span>
            <ul>
              <?php require_once 'Controleurs/controleurMembres.php';
              $photo = new membres();
              $afficher = $photo->affichagePhoto($_SESSION['pseudo']);
              ?>
              <li><img src="imagesUtilisateurs/<?php echo $afficher[0]?>" height="70em" width="70em"/></li>

							<li> <a href="index.php?page=messagerie"><?php echo $ssmenu12 ?> </a> <span class="nbrMessages" style="background-color:red;color:white;font-weight:bold;border-radius:30px;border: 2px solid;padding:2px 3px 2px 4px;top: -6px;right:-6px;font-size:1em;">0</span></li>

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

				<?php if($_COOKIE['langue'] == "English") {?>
					TeamHub (c) 2016 Copyright Holder All Rights Reserved.
				<?php } else { ?>
					TeamHub &copy; 2016 - Tous droits r&eacute;serv&eacute;s
				<?php } ?>

      </footer>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
			<script type="text/javascript">

			function chargerNbrMessages(){
				setTimeout(function(){
					$.ajax({
						url : "index.php?page=recupnbrmessagesnonlus",
						type : "GET",
						success : function(data){
							$(".nbrMessages").replaceWith(data);
						}
					})
					chargerNbrMessages();
				}, 500);
			}
			chargerNbrMessages();

			</script>
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
                  <input type="text" name="BarreRecherche" placeholder="<?php echo $phRecherche ?>">
                  <input type="submit" name="Recherche" value="<?php echo $rec ?>">
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
			 			<span class="nbrMessages" style="background-color:red;color:white;font-weight:bold;border-radius:30px;border: 2px solid;padding:2px 3px 2px 4px;top: -6px;right:-6px;font-size:1em;">0</span>
            <ul>
              <?php require_once 'Controleurs/controleurMembres.php';
              $photo = new membres();
              $afficher = $photo->affichagePhoto($_SESSION['pseudo']);
              ?>
              <li><img src="imagesUtilisateurs/<?php echo $afficher[0]?>" height="70em" width="70em"/></li>

							<li> <a href="index.php?page=messagerie"><?php echo $ssmenu12 ?> </a> <span class="nbrMessages" style="background-color:red;color:white;font-weight:bold;border-radius:30px;border: 2px solid;padding:2px 3px 2px 4px;top: -6px;right:-6px;font-size:1em;">0</span></li>

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

				<?php if($_COOKIE['langue'] == "English") {?>
					TeamHub (c) 2016 Copyright Holder All Rights Reserved.
				<?php } else { ?>
					TeamHub &copy; 2016 - Tous droits r&eacute;serv&eacute;s
				<?php } ?>
      </footer>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
			<script type="text/javascript">

			function chargerNbrMessages(){
				setTimeout(function(){
					$.ajax({
						url : "index.php?page=recupnbrmessagesnonlus",
						type : "GET",
						success : function(data){
							$(".nbrMessages").replaceWith(data);
						}
					})
					chargerNbrMessages();
				}, 500);
			}

			chargerNbrMessages();

			</script>
    </body>
  <?php } ?>

<?php if($j == 2){ ?>
    <body>

      <header>

        <div id="logo">
          <a href="index.php?page=accueil"><img id="logo" src="Autres/Logo.png" width="306" height="172" ></a>
          <h1> <?php echo $slogan  ?>  </h1>
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
                    <input type="submit" name="Recherche" value="<?php echo $rec ?>" id="Rechercher">
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
                    <p> <input type="text" name="pseudo" id="pseudo" placeholder="<?php echo $forminsc7 ?>" required> </p>
                    <p> <input type="password" name="PasswordAccueil" id="passwordaccueil" placeholder="<?php echo $phConnexion ?>" required> </p>
                    <p> <input name="connexion" type="submit" id="connexion" value = "<?php echo $co ?>"> </p>
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
          <a id = "lienAPropos" href="index.php?page=apropos"> <?php echo $footer ?> </a>
        </div>
        <div class="langue">
          <a href="index.php?page=changementlangue&langue=Francais"> <img src="Autres/Fr.jpg" alt="facebook" height="30" width="30"> </a>
          &nbsp;
          <a href="index.php?page=changementlangue&langue=English"> <img src="Autres/En.png" alt="twitter" height="32" width="32"> </a>
        </div>

				<?php if($_COOKIE['langue'] == "English") {?>
					TeamHub (c) 2016 Copyright Holder All Rights Reserved.
				<?php } else { ?>
					TeamHub &copy; 2016 - Tous droits r&eacute;serv&eacute;s
				<?php } ?>

      </footer>

    </body>

  <?php } ?>

</html>
