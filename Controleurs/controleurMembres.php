<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class membres{

  public function affichageMesInfos(){
    $utilisateurs = new utilisateurs();
    $afficherMesInfos = $utilisateurs->afficherMesInfos()->fetch();
    $vue = new Vue('MesInfos');
    $vue->generer(["infos" => $afficherMesInfos]);
  }

  public function affichageModificationMesCoordonnes(){
    $utilisateurs = new utilisateurs();
    $afficherMesInfos = $utilisateurs->afficherMesInfos()->fetch();
    $vue = new Vue('ModifMesCoordonnes');
    $vue->generer(["infos" => $afficherMesInfos]);
  }

  public function affichageModificationMonAdresse(){
    $utilisateurs = new utilisateurs();
    $afficherMesInfos = $utilisateurs->afficherMesInfos()->fetch();
    $vue = new Vue('ModifMonAdresse');
    $vue->generer(["infos" => $afficherMesInfos]);
  }

  public function affichageModificationMonMdp(){
    $vue = new Vue('ModifMonMdp');
    $vue->generer();
  }

  public function modificationMesCoordonnes(){
    if (isset($_POST['Envoyer'])){
      $utilisateurs = new utilisateurs();
      $modifierMesCoord = $utilisateurs->modifierMesCoordonnees();
      $afficherMesInfos = $utilisateurs->afficherMesInfos()->fetch();
      header("Location : index.php?=mesinfos");
    }

  }


}


?>
