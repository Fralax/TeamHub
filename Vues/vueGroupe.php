<!DOCTYPE html>
<html>

  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="Contenu/vueGroupe.css" />
  <title>Groupe</title>
  </head>

  <body>

    <?php
    if(isset($_SESSION['pseudo'])){
      if ($caract['g_admin'] == $_SESSION['pseudo']) {
        $i = 1;
      }
      else{
        foreach ($membres as list($membre)) {
          if ($membre == $_SESSION['pseudo']){
            $i = 2;
            break;
          }
          if ($membre != $_SESSION['pseudo']){
            if($caract['g_placesLibres'] !=0){
              $i = 3;
            } else{
              $i = 4;
            }
          }
        }
      }
    } else{
      $i = 5;
    }
  ?>

  <div class="groupe">
    <?php if ($i == 1){ ?>
      <h2>Groupe <?php echo $caract['g_nom']?> </h2>
      <p> Description du groupe :
      <?php echo $caract['g_description'] ?>
      <a href = "index.php?page=affichagemodificationdescription&nom=<?php echo $caract['g_nom']?>" > <input type="button" name="Description" value="Modifier la description"> </a>
      </p>
      <p> Administrateur :
      <?php echo $caract['g_admin'] ?>
      <a href = "index.php?page=affichagemodificationadmin&nom=<?php echo $caract['g_nom']?>" > <input type="button" name="Admin" value="Désigner un nouvel Admin"> </a>
      </p>
      <p> Nombre de places :
      <?php echo $caract['g_placesLibres'] ?>
      <a href = "index.php?page=affichagemodificationplaces&nom=<?php echo $caract['g_nom']?>" > <input type="button" name="Places" value="Changer le nombre de places"> </a> </p>
      </p>
      <p> Sport : <?php echo $caract['g_sport'] ?></p>
      <p> Lieu : <?php echo $caract['g_departement'] ?></p>
      <div class="evenement">
        <h3>Événements auxquels je participe</h3>
        <table>
          <?php foreach ($afficherMesEvenements as list($nom, $createur, $date, $heure, $nomClub)){ ?>
          <tr>
            <td>
              <?php echo $nom ?> </a>
            </td>
            <td>
              <?php echo "le ".$date ?>
            </td>
            <td>
              <?php echo "à ".$heure ?>
            </td>
            <td>
              <?php echo "créé par ".$createur ?>
            </td>
            <td>
              <?php echo "au club ".$nomClub ?>
            </td>
            <td>
              <a href="#" onclick="if (confirm('Voulez vous vraiment quitter l'évenement : <?php echo $nom ?> ?')) window.location='index.php?page=quitterevenement&evenement=<?php echo $nom; ?>'; return false"> <input type = "button" name="Quitter" value="Quitter" > </a>
            </td>
            <td>
              <a href="#" onclick="if (confirm('Voulez vous vraiment supprimer l'événement : <?php echo $nom ?> ?')) window.location='index.php?page=suppressionevenement&evenement=<?php echo $nom; ?>'; return false"> <input type = "button" name="Supprimer" value="Supprimer" > </a>
            </td>
          </tr>
          <?php } ?>
        </table>
        <h3>Événements du groupe</h3>
        <table>
          <?php foreach ($evenementsGroupe as list($nom, $createur, $date, $heure, $nomClub)){ ?>
          <tr>
            <td>
              <?php echo $nom?> </a>
            </td>
            <td>
              <?php echo "le ".$date ?>
            </td>
            <td>
              <?php echo "à ".$heure ?>
            </td>
            <td>
              <?php echo "créé par ".$createur ?>
            </td>
            <td>
              <?php echo "au club ".$nomClub ?>
            </td>
            <td>
              <a href="#" onclick="if (confirm('Voulez vous vraiment rejoindre l'événement : <?php echo $nom ?> ?')) window.location='index.php?page=rejoindreevenement&evenement=<?php echo $nom; ?>'; return false"> <input type = "button" name="Rejoindre" value="Rejoindre" > </a>
            </td>
            <td>
              <a href="" onclick="if (confirm('Voulez vous vraiment supprimer l'événement : <?php echo $nom ?> ?')) window.location='index.php?page=suppressionevenement&evenement=<?php echo $nom; ?>'; return false"> <input type = "button" name="Supprimer" value="Supprimer" > </a>
            </td>
          </tr>
          <?php } ?>
        </table>
      </div>
      <p> <a href = "index.php?page=creationevenement&nom=<?php echo $caract['g_nom']?>" > <input type = "button" name="Evenement" value="Créer un événement" > </a> </p>
  <?php } ?>

  <?php if ($i == 2){ ?>
    <h2>Groupe <?php echo $caract['g_nom']?> </h2>
    <p> Description du groupe :
    <?php echo $caract['g_description'] ?>
    </p>
    <p> Administrateur :
    <?php echo $caract['g_admin'] ?>
    </p>
    <p> Nombre de places :
    <?php echo $caract['g_placesLibres'] ?>
    </p>
    <p> Sport : <?php echo $caract['g_sport'] ?></p>
    <p> Lieu : <?php echo $caract['g_departement'] ?></p>
    <div class="evenement">
      <h3>Événements auxquels je participe</h3>
      <table>
        <?php foreach ($afficherMesEvenements as list($nom, $createur, $date, $heure, $nomClub)){ ?>
        <tr>
          <td>
            <?php echo $nom?> </a>
          </td>
          <td>
            <?php echo "le ".$date ?>
          </td>
          <td>
            <?php echo "à ".$heure ?>
          </td>
          <td>
            <?php echo "créé par ".$createur ?>
          </td>
          <td>
            <?php echo "au club ".$nomClub ?>
          </td>
          <td>
            <a href="#" onclick="if (confirm('Voulez vous vraiment quitter l'évenement : <?php echo $nom ?> ?')) window.location='index.php?page=quitterevenement&evenement=<?php echo $nom; ?>'; return false">  <input type = "button" name="Quitter" value="Quitter" > </a>
          </td>
          <?php if ($createur == $_SESSION['pseudo']){ ?>
          <td>
            <a href="#" onclick="if (confirm('Voulez vous vraiment supprimer l'événement : <?php echo $nom ?> ?')) window.location='index.php?page=suppressionevenement&evenement=<?php echo $nom; ?>'; return false"> <input type = "button" name="Supprimer" value="Supprimer" > </a>
          </td>
          <?php } ?>
        </tr>
        <?php } ?>
      </table>
      <h3>Événements du groupe</h3>
      <table>
        <?php foreach ($evenementsGroupe as list($nom, $createur, $date, $heure, $nomClub)){ ?>
        <tr>
          <td>
            <?php echo $nom?> </a>
          </td>
          <td>
            <?php echo "le ".$date ?>
          </td>
          <td>
            <?php echo "à ".$heure ?>
          </td>
          <td>
            <?php echo "créé par ".$createur ?>
          </td>
          <td>
            <?php echo "au club ".$nomClub ?>
          </td>
          <td>
            <a href="#" onclick="if (confirm('Voulez vous vraiment rejoindre l'événement : <?php echo $nom ?> ?')) window.location='index.php?page=rejoindreevenement&evenement=<?php echo $nom; ?>'; return false"> <input type = "button" name="Rejoindre" value="Rejoindre" > </a>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
    <p> <a href = "index.php?page=creationevenement&nom=<?php echo $caract['g_nom']?>" > <input type = "button" name="Evenement" value="Créer un événement" > </a> </p>
  <?php } ?>

  <?php if ($i == 3){ ?>
    <h2>Groupe <?php echo $caract['g_nom']?> <a href="#" onclick="if (confirm('Voulez vraiment rejoindre le groupe : <?php echo $caract['g_nom'] ?> ?')) window.location='index.php?page=confirmationgroupe&nom=<?php echo $caract['g_nom']; ?>'; return false"> <input type = "button" name="rejoindre" value="Rejoindre ce groupe" > </a></h2>
    <p> Description du groupe :
    <?php echo $caract['g_description'] ?>
    </p>
    <p> Administrateur :
    <?php echo $caract['g_admin'] ?>
    </p>
    <p> Nombre de places :
    <?php echo $caract['g_placesLibres'] ?>
    </p>
    <p> Sport : <?php echo $caract['g_sport'] ?></p>
    <p> Lieu : <?php echo $caract['g_departement'] ?></p>
    <div class="evenement">
      <h3>Événements du groupe</h3>
      <table>
        <?php foreach ($evenementsGroupe as list($nom, $createur, $date, $heure, $nomClub)){ ?>
        <tr>
          <td>
            <?php echo $nom?> </a>
          </td>
          <td>
            <?php echo "le ".$date ?>
          </td>
          <td>
            <?php echo "à ".$heure ?>
          </td>
          <td>
            <?php echo "créé par ".$createur ?>
          </td>
          <td>
            <?php echo "au club ".$nomlub ?>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
  <?php } ?>

  <?php if ($i == 4){ ?>
    <h2>Groupe <?php echo $caract['g_nom']?> </h2>
    <p> Description du groupe :
    <?php echo $caract['g_description'] ?>
    </p>
    <p> Administrateur :
    <?php echo $caract['g_admin'] ?>
    </p>
    <p> Nombre de places :
    <?php echo $caract['g_placesLibres'] ?>
    </p>
    <p> Sport : <?php echo $caract['g_sport'] ?></p>
    <p> Lieu : <?php echo $caract['g_departement'] ?></p>
    <div class="evenement">
      <h3>Événements du groupe</h3>
      <table>
        <?php foreach ($evenementsGroupe as list($nom, $createur, $date, $heure, $nomClub)){ ?>
        <tr>
          <td>
            <?php echo $nom?> </a>
          </td>
          <td>
            <?php echo "le ".$date ?>
          </td>
          <td>
            <?php echo "à ".$heure ?>
          </td>
          <td>
            <?php echo "créé par ".$createur ?>
          </td>
          <td>
            <?php echo "au club ".$nomClub ?>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
  <?php } ?>

  <?php if ($i == 5){ ?>
    <h2>Groupe <?php echo $caract['g_nom']?> </h2>
    <p> Description du groupe :
    <?php echo $caract['g_description'] ?>
    </p>
    <p> Administrateur :
    <?php echo $caract['g_admin'] ?>
    </p>
    <p> Nombre de places :
    <?php echo $caract['g_placesLibres'] ?>
    </p>
    <p> Sport : <?php echo $caract['g_sport'] ?></p>
    <p> Lieu : <?php echo $caract['g_departement'] ?></p>
    <p> <a href="index.php?page=inscription"> <input type = "button" name="inscription" value="S'inscrire sur le site" > </a> </p>
    <div class="evenement">
      <h3>Événements</h3>
      <table>
        <?php foreach ($evenement as list($nom, $createur, $date, $heure, $nomClub)){ ?>
        <tr>
          <td>
            <?php echo $nom?> </a>
          </td>
          <td>
            <?php echo "le ".$date ?>
          </td>
          <td>
            <?php echo "à ".$heure ?>
          </td>
          <td>
            <?php echo "créé par ".$createur ?>
          </td>
          <td>
            <?php echo "au club ".$nomClub ?>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
  <?php } ?>
</div>

</body>
</html>
