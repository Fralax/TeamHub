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
    if (isset($_POST['bannir']) && $_POST['bannir'] == 'bannir'){
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

  public function affichageBanni(){
    $vue = new Vue('Banni');
    $vue->generer();
  }

}


?>
