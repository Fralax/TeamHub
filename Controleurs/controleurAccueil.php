<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Modeles/groupes.php';
require_once 'Vues/vue.php';

class accueil{

  var $days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
  var $months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');

  public function affichageAccueil(){

    $groupe = new groupes();
    $afficherMesGroupes = $groupe->afficherGroupesAccueil()->fetchAll();
    $invitations = $groupe->invitation()->fetchAll();
    $evenements = new evenements();
    $afficherEvenements = $evenements->listerEvenementsAccueil()->fetchAll();
    $afficherSugestionGroupes = $groupe->afficherGroupeRegion()->fetchAll();
    $département = $groupe->recupDepartement()->fetch();
    $sports = $groupe->recupSportRandom()->fetchAll();
    $afficherSugestionSports = $groupe->afficherGroupeSport($sports[0][0])->fetchAll();
    $vue = new Vue('Accueil');
    $vue->generer(array("groupes" => $afficherMesGroupes,'invit'=>$invitations, "evenements" => $afficherEvenements, "suggestiongroupes"=>$afficherSugestionGroupes, "departement"=>$département, "sport"=>$sports, "suggestionsports"=>$afficherSugestionSports));
  }

  public function affichageAPropos(){
    $vue = new Vue('APropos');
    $vue->generer();
  }

  public function calendrier($year){
    $date = new DateTime($year.'-01-01');
    while ($date->format('Y') <= $year){
      $y = $date->format('Y');
      $m = $date->format('n');
      $d = $date->format('j');
      $w = str_replace('0', '7', $date->format('w'));
      $r[$y][$m][$d] = $w;
      $date->add(new DateInterval('P1D'));
    }
    return $r;
  }

  public function recupEvents(){
    $event = new evenements();
    $r = array();
    $mesEvents = $event->listerEvenementsAccueil()->fetchAll();
    foreach($mesEvents as list($nom, $createur, $date, $heure)){
      $r[strtotime($date)] = $nom;
      echo "<pre>";
      var_dump($r);
      echo  "</pre>";
    }
    return $r;
  }

  public function suppressionNotif($nomGroupe){
    $groupe = new groupes();
    $groupe->supprimerInvitation($nomGroupe);
    header("Location: index.php?page=accueil");
  }

  // public function envoieConfirm($nomGroupe){
  //   $groupe = new groupes();
  //   $groupe->confirmerInvitation($nomGroupe);
  // }
}

?>
