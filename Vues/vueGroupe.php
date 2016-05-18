<!DOCTYPE html>
<html>

  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="Contenu/vueGroupe.css" />
  <title>Groupe</title>
  </head>

  <body>

    <?php
    $nbrMembres = $caract['g_placesTotal'] - $caract['g_placesLibres'];
    if(isset($_SESSION['pseudo'])){ //Si l'utilisateur est connecté
      if ($caract['g_admin'] == $_SESSION['pseudo']) { //Si c'est l'admin du groupe
        $i = 1;
      }
      else{
        foreach ($membres as list($membre)) { //Bloucle sur les membres du groupe pour voir si l'utilisateur appartient à ce groupe
          if ($membre == $_SESSION['pseudo']){ //S'il appartien à ce groupe

            $i = 2;
            break;
          }
          if ($membre != $_SESSION['pseudo']){ // S'il n'appartient pas à ce groupe
            if($caract['g_placesLibres'] !=0){ // S'il reste des places dans le groupe
              $i = 3;
            } else{ // S'il ne reste pas de place dans le groupe
              $i = 4;
            }
          }
        }
      }
    } else{ // Si l'utilisateur n'est pas connecté
      $i = 5;
    }
  ?>

  <div class="groupe">

    <?php if ($i == 1){ ?>
      <div class="infos">
        <div class="nomEtDescription">
          <h2>Groupe <?php echo $caract['g_nom']?> </h2>
          <p><?php echo $caract['g_description'] ?></p>
        </div>
        <div class="infosGenerales">
          <h2>Informations :</h2>
          <p> <b> Administrateur : </b> <a href="index.php?page=profil&nom=<?php echo $caract['g_admin'] ?>"> <?php echo $caract['g_admin'] ?> </a> </p>
          <p> <b> Nombre de participants au groupe : </b> <?php echo $nbrMembres."/".$caract['g_placesTotal'] ?> </p>
          <p> <b> Sport : </b> <?php echo $caract['g_sport'] ?></p>
          <p> <b> Département : </b><?php echo $caract['g_departement'] ?> </p>
        </div>
        <div class="actionsGroupe">
          <a href="index.php?page=affichagemodificationdescription&nom=<?php echo $caract['g_nom']?>"> <h3> Modifier la description du groupe </h3></a>
          <a href="index.php?page=affichagemodificationadmin&nom=<?php echo $caract['g_nom']?>"><h3>Désigner un nouvel administrateur</h3></a>
          <a href="index.php?page=affichagemodificationplaces&nom=<?php echo $caract['g_nom']?>"><h3>Modifier le nombre de places dans le groupe</h3></a>
          <a href="index.php?page=creationevenement&nom=<?php echo $caract['g_nom']?>"><h3>Créer un événement</h3></a>
          <a href="index.php?page=listemembres&nom=<?php echo $_GET['nom']?>"><h3>Voir les membres</h3></a>
          <a href="#" onclick="if (confirm('Voulez vraiment supprimer le groupe : <?php echo $_GET['nom'] ?> ?')) window.location='index.php?page=suppressiongroupe&nom=<?php echo $_GET['nom'] ?>'; return false"><h3>Supprimer le groupe</h3></a>
        </div>
      </div>
      <div class="evenements">
        <div class="mesEvenements">
          <h3>Événements auxquels je participe</h3>
          <?php if($afficherMesEvenements[0][0] == ""){ ?>
            Vous ne participez à aucun événement !
          <?php } else{?>
          <table>
            <?php foreach ($afficherMesEvenements as list($nom, $createur, $date, $heure, $nomClub, $placesTotal, $placesLibres)){ ?>
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
                <?php echo "au club ".$nomClub ?>
              </td>
              <td>
                <?php
                  $participants = $placesTotal-$placesLibres;
                  if($participants == 1){
                    echo $participants." participant";
                  } else{
                    echo $participants." participants";
                  }
                ?>
              </td>
              <td>
                <a href="#" onclick="if (confirm('Voulez vous vraiment quitter l\'événement : <?php echo $nom ?> ?')) window.location='index.php?page=quitterevenement&evenement=<?php echo $nom; ?>'; return false"> <input type = "button" name="Quitter" value="Quitter" > </a>
              </td>
              <td>
                <a href="#" onclick="if (confirm('Voulez vous vraiment supprimer l\'événement : <?php echo $nom ?> ?')) window.location='index.php?page=suppressionevenement&evenement=<?php echo $nom; ?>'; return false"> <input type = "button" name="Supprimer" value="Supprimer" > </a>
              </td>
            </tr>
            <?php } ?>
          </table>
          <?php } ?>
        </div>
        <div class="evenementsGroupe">
          <h3>Événements du groupe</h3>
          <?php if($evenementsGroupe[0][0] == ""){ ?>
            Aucun événement en cours dans ce groupe ...
          <?php } else{?>
          <table>
            <?php foreach ($evenementsGroupe as list($nom, $createur, $date, $heure, $nomClub, $placesTotal, $placesLibres)){ ?>
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
                <?php echo "au club ".$nomClub ?>
              </td>
              <td>
                <?php
                  $participants = $placesTotal-$placesLibres;
                  if($participants == 1){
                    echo $participants." participant";
                  } else{
                    echo $participants." participants";
                  }
                ?>
              </td>
              <?php
                if ($placesLibres != 0){
                  if($placesLibres == 1){
              ?>
              <td>
                <?php echo $placesLibres." place restante" ?>
              </td>
              <?php } else{ ?>
              <td>
                <?php echo $placesLibres." places restantes" ?>
              </td>
              <?php } ?>
              <td>
                <a href="#" onclick="if (confirm('Voulez vous vraiment rejoindre l\'événement : <?php echo $nom ?> ?')) window.location='index.php?page=rejoindreevenement&evenement=<?php echo $nom ?>'; return false"> <input type = "button" name="Rejoindre" value="Rejoindre" > </a>
              </td>
              <?php } else{ ?>
                <td>
                  Plus de place disponible ...
                </td>
              <?php } ?>
              <td>
                <a href="#" onclick="if (confirm('Voulez vous vraiment supprimer l\'événement : <?php echo $nom ?> ?')) window.location='index.php?page=suppressionevenement&evenement=<?php echo $nom ?>'; return false"> <input type = "button" name="Supprimer" value="Supprimer" > </a>
              </td>
            </tr>
            <?php } ?>
          </table>
          <?php } ?>
        </div>
      </div>
  <?php } ?>

  <?php if ($i == 2){ ?>
    <div class="infos">
      <div class="nomEtDescription">
        <h2>Groupe <?php echo $caract['g_nom']?> </h2>
        <p><?php echo $caract['g_description'] ?></p>
      </div>
      <div class="infosGenerales">
        <h2>Informations :</h2>
        <p> <b> Administrateur : </b> <a href="index.php?page=profil&nom=<?php echo $caract['g_admin'] ?>"> <?php echo $caract['g_admin'] ?> </a> </p>
        <p> <b> Nombre de participants au groupe : </b> <?php echo $nbrMembres."/".$caract['g_placesTotal'] ?> </p>
        <p> <b> Sport : </b> <?php echo $caract['g_sport'] ?></p>
        <p> <b> Département : </b><?php echo $caract['g_departement'] ?> </p>
      </div>
      <div class="actionsGroupe">
        <a href="index.php?page=creationevenement&nom=<?php echo $caract['g_nom']?>"><h3>Créer un événement</h3></a>
        <a href="index.php?page=listemembres&nom=<?php echo $_GET['nom']?>"><h3>Voir les membres</h3></a>
        <a href="#" onclick="if (confirm('Voulez vraiment quitter le groupe : <?php echo $_GET['nom'] ?> ?')) window.location='index.php?page=quittergroupe&nom=<?php echo $_GET['nom'] ?>'; return false"><h3>Quitter le groupe</h3></a>
      </div>
    </div>
    <div class="evenements">
      <div class="mesEvenements">
        <h3>Événements auxquels je participe</h3>
        <?php if($afficherMesEvenements[0][0] == ""){ ?>
          Vous ne participez à aucun événement !
        <?php } else{?>
        <table>
          <?php foreach ($afficherMesEvenements as list($nom, $createur, $date, $heure, $nomClub, $placesTotal, $placesLibres)){ ?>
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
              <?php echo "au club ".$nomClub ?>
            </td>
            <td>
              <?php
                $participants = $placesTotal-$placesLibres;
                if($participants == 1){
                  echo $participants." participant";
                } else{
                  echo $participants." participants";
                }
              ?>
            </td>
            <td>
              <a href="#" onclick="if (confirm('Voulez vous vraiment quitter l\'événement : <?php echo $nom ?> ?')) window.location='index.php?page=quitterevenement&evenement=<?php echo $nom ?>'; return false">  <input type = "button" name="Quitter" value="Quitter" > </a>
            </td>
            <?php if ($createur == $_SESSION['pseudo']){ ?>
            <td>
              <a href="#" onclick="if (confirm('Voulez vous vraiment supprimer l\'événement : <?php echo $nom ?> ?')) window.location='index.php?page=suppressionevenement&evenement=<?php echo $nom ?>'; return false"> <input type = "button" name="Supprimer" value="Supprimer" > </a>
            </td>
            <?php } ?>
          <?php } ?>
          </tr>
        </table>
        <?php } ?>
      </div>
      <div class="evenementsGroupe">
        <h3>Événements du groupe</h3>
        <?php if($evenementsGroupe[0][0] == ""){ ?>
          Aucun événement en cours dans ce groupe ...
        <?php } else{?>
        <table>
          <?php foreach ($evenementsGroupe as list($nom, $createur, $date, $heure, $nomClub, $placesTotal, $placesLibres)){ ?>
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
              <?php echo "au club ".$nomClub ?>
            </td>
            <td>
              <?php
                $participants = $placesTotal-$placesLibres;
                if($participants == 1){
                  echo $participants." participant";
                } else{
                  echo $participants." participants";
                }
              ?>
            </td>
            <?php
              if ($placesLibres != 0){
                if($placesLibres == 1){
            ?>
            <td>
              <?php echo $placesLibres." place restante" ?>
            </td>
            <?php } else{ ?>
            <td>
              <?php echo $placesLibres." places restantes" ?>
            </td>
            <?php } ?>
            <td>
              <a href="#" onclick="if (confirm('Voulez vous vraiment rejoindre l\'événement : <?php echo $nom ?> ?')) window.location='index.php?page=rejoindreevenement&evenement=<?php echo $nom ?>'; return false"> <input type = "button" name="Rejoindre" value="Rejoindre" > </a>
            </td>
            <?php } else{ ?>
              <td>
                Plus de place disponible ...
              </td>
            <?php } ?>
          </tr>
          <?php } ?>
        </table>
        <?php } ?>
      </div>
    </div>
  <?php } ?>

  <?php if ($i == 3){ ?>
    <div class="infos">
      <div class="nomEtDescription">
        <h2>Groupe <?php echo $caract['g_nom']?> </h2>
        <p><?php echo $caract['g_description'] ?></p>
      </div>
      <div class="infosGenerales">
        <h2>Informations :</h2>
        <p> <b> Administrateur : </b> <a href="index.php?page=profil&nom=<?php echo $caract['g_admin'] ?>"> <?php echo $caract['g_admin'] ?> </a> </p>
        <p> <b> Nombre de participants au groupe : </b> <?php echo $nbrMembres."/".$caract['g_placesTotal'] ?> </p>
        <p> <b> Sport : </b> <?php echo $caract['g_sport'] ?></p>
        <p> <b> Département : </b><?php echo $caract['g_departement'] ?> </p>
      </div>
      <div class="actionsGroupe">
        <a href="#" onclick="if (confirm('Voulez vraiment rejoindre le groupe : <?php echo $_GET['nom'] ?> ?')) window.location='index.php?page=confirmationgroupe&nom=<?php echo $_GET['nom'] ?>'; return false"> <h3> Rejoindre le groupe <h3></a>
        <a href="index.php?page=listemembres&nom=<?php echo $_GET['nom']?>"><h3>Voir les membres</h3></a>
      </div>
    </div>
    <div class="evenements">
      <div class="mesEvenements">
        <h3>Événements auxquels je participe</h3>
        <p>Vous devez rejoindre ce groupe avant de pouvoir participer à un événement ...</p>
      </div>
      <div class="evenementsGroupe">
        <h3>Événements du groupe</h3>
        <?php if($evenementsGroupe[0][0] == ""){ ?>
          Aucun événement en cours dans ce groupe ...
        <?php } else{?>
        <table>
          <?php foreach ($evenementsGroupe as list($nom, $createur, $date, $heure, $nomClub, $placesTotal, $placesLibres)){ ?>
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
              <?php echo "au club ".$nomClub ?>
            </td>
            <td>
              <?php
                $participants = $placesTotal-$placesLibres;
                if($participants == 1){
                  echo $participants." participant";
                } else{
                  echo $participants." participants";
                }
              ?>
            </td>
            <?php
              if ($placesLibres != 0){
                if($placesLibres == 1){
            ?>
            <td>
              <?php echo $placesLibres." place restante" ?>
            </td>
            <?php } else{ ?>
            <td>
              <?php echo $placesLibres." places restantes" ?>
            </td>
            <?php }
            } else{ ?>
              <td>
                Plus de place disponible ...
              </td>
            <?php } ?>
          </tr>
          <?php } ?>
        </table>
        <?php } ?>
      </div>
    </div>
  <?php } ?>

  <?php if ($i == 4){ ?>
    <div class="infos">
      <div class="nomEtDescription">
        <h2>Groupe <?php echo $caract['g_nom']?> </h2>
        <p><?php echo $caract['g_description'] ?></p>
      </div>
      <div class="infosGenerales">
        <h2>Informations :</h2>
        <p> <b> Administrateur : </b> <a href="index.php?page=profil&nom=<?php echo $caract['g_admin'] ?>"> <?php echo $caract['g_admin'] ?> </a> </p>
        <p> <b> Nombre de participants au groupe : </b> <?php echo $nbrMembres."/".$caract['g_placesTotal'] ?> </p>
        <p> <b> Sport : </b> <?php echo $caract['g_sport'] ?></p>
        <p> <b> Département : </b><?php echo $caract['g_departement'] ?> </p>
      </div>
      <div class="actionsGroupe">
        <a href="#"><h3>Me notifier quand une place se libère</h3></a>
        <a href="index.php?page=listemembres&nom=<?php echo $_GET['nom']?>"><h3>Voir les membres</h3></a>
      </div>
    </div>
    <div class="evenements">
      <div class="mesEvenements">
        <h3>Événements auxquels je participe</h3>
        <p>Vous devez rejoindre ce groupe avant de pouvoir participer à un événement ... Mais il n'y a plus de place !</p>
      </div>
      <div class="evenementsGroupe">
        <h3>Événements du groupe</h3>
        <?php if($evenementsGroupe[0][0] == ""){ ?>
          Aucun événement en cours dans ce groupe ...
        <?php } else{?>
        <table>
          <?php foreach ($evenementsGroupe as list($nom, $createur, $date, $heure, $nomClub, $placesTotal, $placesLibres)){ ?>
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
              <?php echo "au club ".$nomClub ?>
            </td>
            <td>
              <?php
                $participants = $placesTotal-$placesLibres;
                if($participants == 1){
                  echo $participants." participant";
                } else{
                  echo $participants." participants";
                }
              ?>
            </td>
            <?php
              if ($placesLibres != 0){
                if($placesLibres == 1){
            ?>
            <td>
              <?php echo $placesLibres." place restante" ?>
            </td>
            <?php } else{ ?>
            <td>
              <?php echo $placesLibres." places restantes" ?>
            </td>
            <?php }
            } else{ ?>
              <td>
                Plus de place disponible ...
              </td>
            <?php } ?>
          </tr>
          <?php } ?>
        </table>
        <?php } ?>
      </div>
    </div>
  <?php } ?>

  <?php if ($i == 5){ ?>
    <div class="infos">
      <div class="nomEtDescription">
        <h2>Groupe <?php echo $caract['g_nom']?> </h2>
        <p><?php echo $caract['g_description'] ?></p>
      </div>
      <div class="infosGenerales">
        <h2>Informations :</h2>
        <p> <b> Administrateur : </b> <a href="index.php?page=profil&nom=<?php echo $caract['g_admin'] ?>"> <?php echo $caract['g_admin'] ?> </a> </p>
        <p> <b> Nombre de participants au groupe : </b> <?php echo $nbrMembres."/".$caract['g_placesTotal'] ?> </p>
        <p> <b> Sport : </b> <?php echo $caract['g_sport'] ?></p>
        <p> <b> Département : </b><?php echo $caract['g_departement'] ?> </p>
      </div>
      <div class="actionsGroupe">
        <a href="index.php?page=inscription"><h3>S'inscrire sur le site</h3></a>
        <a href="index.php?page=listemembres&nom=<?php echo $_GET['nom']?>"><h3>Voir les membres</h3></a>
      </div>
    </div>
    <div class="evenements">
      <div class="mesEvenements">
        <h3>Événements auxquels je participe</h3>
        <p>Vous devez vous inscrire sur le site avant de pouvoir rejoindre ce groupe ...</p>
      </div>
      <div class="evenementsGroupe">
        <h3>Événements du groupe</h3>
        <?php if($evenementsGroupe[0][0] == ""){ ?>
          Aucun événement en cours dans ce groupe ...
        <?php } else{?>
        <table>
          <?php foreach ($evenementsGroupe as list($nom, $createur, $date, $heure, $nomClub, $placesTotal, $placesLibres)){ ?>
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
              <?php echo "au club ".$nomClub ?>
            </td>
            <td>
              <?php
                $participants = $placesTotal-$placesLibres;
                if($participants == 1){
                  echo $participants." participant";
                } else{
                  echo $participants." participants";
                }
              ?>
            </td>
            <?php
              if ($placesLibres != 0){
                if($placesLibres == 1){
            ?>
            <td>
              <?php echo $placesLibres." place restante" ?>
            </td>
            <?php } else{ ?>
            <td>
              <?php echo $placesLibres." places restantes" ?>
            </td>
            <?php }
            } else{ ?>
              <td>
                Plus de place disponible ...
              </td>
            <?php } ?>
          </tr>
          <?php } ?>
        </table>
        <?php } ?>
      </div>
    </div>
  <?php } ?>
</div>

</body>
</html>
