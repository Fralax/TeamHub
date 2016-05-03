<!DOCTYPE html>
<html>

  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Groupe</title>
  </head>

  <body>

    <?php
    if(isset($_SESSION['pseudo'])){
      if ($caract['g_admin'] == $_SESSION['pseudo']) {
        $i = 1;
      } else{
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

  <h2>Groupe <?php echo $caract['g_nom']?> </h2>

  <?php if ($i == 1){ ?>
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
    <p> <a href = "index.php?page=creationevenements&nom=<?php echo $caract['g_nom']?>" > <input type = "button" name="Evenement" value="Créer un événement" > </a> </p>
    <h3>Événements</h3>
    <table>
      <?php foreach ($evenement as list($nom, $date, $heure, $createur, $club)){ ?>
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
          <?php echo "au club ".$club ?>
        </td>
      </tr>
      <?php } ?>
    </table>
  <?php } ?>

  <?php if ($i == 2){ ?>
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
    <p> <a href = "index.php?page=creationevenements&nom=<?php echo $caract['g_nom']?>" > <input type = "button" name="Evenement" value="Créer un événement" > </a> </p>
    <h3>Événements</h3>
    <table>
      <?php foreach ($evenement as list($nom, $date, $heure, $createur, $club)){ ?>
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
          <?php echo "au club ".$club ?>
        </td>
      </tr>
      <?php } ?>
    </table>
  <?php } ?>

  <?php if ($i == 3){ ?>
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
    <p> <input type = "button" name="rejoindre" value="Rejoindre ce groupe" > </p>
    <h3>Événements</h3>
    <table>
      <?php foreach ($evenement as list($nom, $date, $heure, $createur, $club)){ ?>
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
          <?php echo "au club ".$club ?>
        </td>
      </tr>
      <?php } ?>
    </table>
    <p> <a href="index.php?page=confirmationgroupe&nom=<?php echo $caract['g_nom']?>"> <input type = "button" name="rejoindre" value="Rejoindre ce groupe" > </a> </p>
  <?php } ?>

  <?php if ($i == 4){ ?>
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
    <h3>Événements</h3>
    <table>
      <?php foreach ($evenement as list($nom, $date, $heure, $createur, $club)){ ?>
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
          <?php echo "au club ".$club ?>
        </td>
      </tr>
      <?php } ?>
    </table>
  <?php } ?>

  <?php if ($i == 5){ ?>
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
    <h3>Événements</h3>
    <table>
      <?php foreach ($evenement as list($nom, $date, $heure, $createur, $club)){ ?>
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
          <?php echo "au club ".$club ?>
        </td>
      </tr>
      <?php } ?>
    </table>
    <p> <a href="index.php?page=inscription"> <input type = "button" name="inscription" value="S'inscrire sur le site" > </a> </p>
  <?php } ?>


  </body>
</html>
