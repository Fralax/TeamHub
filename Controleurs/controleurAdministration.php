<?php

require_once 'Modeles/administration.php';
require_once 'Vues/vue.php';

class controleurAdministration{

  public function affichageAdministration(){
    $vue = new Vue('Admin');
    $vue->generer();
  }

  public function bannissementMembre(){
    $admin = new administration();
    $mail = $admin->recupMail()->fetch();
    if (isset($_POST['bannir']) && $_POST['bannir'] == 'Bannir'){
      if ($_POST['banni'] != ""){
        $ajouterbanni = $admin->bannirMembre($mail[0]);
        header("Location: index.php?page=administration");
      }
    }
    $banniPossible = $admin->listerAbannir()->fetchAll();
    $banni = $admin->listerBanni()->fetchAll();
    $vue = new Vue('bannirMembre');
    $vue->generer(array('abannir'=>$banniPossible, 'banni'=>$banni));
  }

  public function debanni($nom){
    $admin = new administration();
    $debanni = $admin->debannir($nom);
    header("Location: index.php?page=administration");
  }

  public function groupesSupprimables(){
    $admin = new administration();
    $groupes = $admin->ListerGroupes()->fetchAll();
    $vue = new Vue('GroupesASupprimer');
    $vue->generer(array('listeGroupes'=>$groupes));
  }

  public function affichageBanni(){
    $vue = new Vue('Banni');
    $vue->generer();
  }

}


?>
