<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Groupe</title>
</head>
<body>

<h2>Groupe <?php echo $caract['g_nom']?> </h2>

<?php if ($caract['g_admin'] == $_SESSION['pseudo']) {?>

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

<p> <input type = "button" name="Evenement" value="Créer un événement" > </p>

<?php } else{ ?>
  <?php if(isset($_SESSION['pseudo'])){ ?>
    <?php foreach ($membres as list($membre)) {
      if ($membre == $_SESSION['pseudo']){ ?>
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

        <p> <input type = "button" name="Evenement" value="Créer un événement" > </p>

        <?php break; ?>

        <?php } if ($membre != $_SESSION['pseudo']){
                  if($caract['g_placesLibres'] !=0){ ?>
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

                  <?php } else{ ?>

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

                    <?php } ?>

          <?php break; ?>

      <?php   }
            }
          } else{?>

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

    <p> <input type = "button" name="inscription" value="S'inscrire sur le site" > </p>

  <?php }
      } ?>
  </body>
</html>
