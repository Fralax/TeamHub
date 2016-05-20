<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Modeles/groupes.php';
require_once 'Vues/vue.php';

class accueil{

  public function affichageAccueil(){
//     for ($i=0; $i < 10; $i++) {
//       $destinataire = "alexandre.121095@gmail.com";
//       $sujet = "Ceci est un spam";
//       $message ="
// Coucou Alexandre ! Bienvenue sur TeamHub ! Ceci est un spam !
// --------------------------------
// Merci de ne pas répondre à ce mail.";
//       mail($destinataire, $sujet, $message);
//     }

    $groupe = new groupes();
    $afficherMesGroupes = $groupe->afficherGroupesAccueil()->fetchAll();
    $evenements = new evenements();
    $afficherEvenements = $evenements->listerEvenementsAccueil()->fetchAll();
    $vue = new Vue('Accueil');
    $vue->generer(array("groupes" => $afficherMesGroupes, "evenements" => $afficherEvenements));
  }

  public function affichageAPropos(){
    $vue = new Vue('APropos');
    $vue->generer();
  }
}

?>
