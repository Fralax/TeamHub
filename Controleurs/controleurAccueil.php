<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Modeles/groupes.php';
require_once 'Vues/vue.php';

class accueil{

  public function affichageAccueil(){
    // for ($i=0; $i < 100; $i++) {
    //   $destinataire = "natacha.gerard@free.fr";
    //   $sujet = "Confirmation d'inscription" ;
    //   $entete = "Inscription sur le site" ;
    //   $message = 'Bienvenue sur TeamHub,
    //
    //   Merci de votre inscription et bienvenue sur TeamHub !
    //
    //   ---------------
    //   Ceci est un mail automatique, Merci de ne pas y répondre.';
    //
    //   mail($destinataire, $sujet, $message, $entete);
    // }

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
