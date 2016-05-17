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
      $ajouterbanni = $admin->bannirMembre($mail[0]);
      header("Location: index.php?page=admin");
    }
    $banniPossible = $admin->listerAbannir()->fetchAll();
    $vue = new Vue('BannirMembre');
    $vue->generer(array('abannir'=>$banniPossible));
  }

  public function affichageBanni(){
    $vue = new Vue('Banni');
    $vue->generer();
  }

}


?>
