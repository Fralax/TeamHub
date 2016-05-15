<?php

require_once 'Modeles/administration.php';
require_once 'Vues/vue.php';

class controleurAdministration{

  public function affichageAdministration(){
    $vue = new Vue('Admin');
    $vue->generer();
  }

  public function banissementMembre(){
    $admin = new administration();
    $mail = $admin->recupMail()->fetch();
    if (isset($_POST['Banir']) && $_POST['Banir'] == 'Banir'){
      $ajouterBani = $admin->banirMembre($mail[0]);
      header("Location: index.php?page=admin");
    }
    $baniPossible = $admin->listerABanir()->fetchAll();
    $vue = new Vue('BanirMembre');
    $vue->generer(array('abanir'=>$baniPossible));
  }

}


?>
