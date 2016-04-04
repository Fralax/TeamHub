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

  public function modificationMesCoordonnees(){
    $utilisateurs = new utilisateurs();
    if (isset($_POST['Envoyer']) && $_POST['Envoyer'] == 'Envoyer'){
      $modifierMesCoord = $utilisateurs->modifierMesCoordonnees();
      header("Location: index.php?page=mesinfos");
    }
    $afficherMesInfos = $utilisateurs->afficherMesInfos()->fetch();
    $vue = new Vue('ModifMesCoordonnes');
    $vue->generer(["infos" => $afficherMesInfos]);
  }

  public function modificationMonAdresse(){
    $utilisateurs = new utilisateurs();
    if (isset($_POST['Envoyer']) && $_POST['Envoyer'] == 'Envoyer'){
      $modifierMesCoord = $utilisateurs->modifierMonAdresse();
      header("Location: index.php?page=mesinfos");
    }
    $afficherMesInfos = $utilisateurs->afficherMesInfos()->fetch();
    $vue = new Vue('ModifMonAdresse');
    $vue->generer(["infos" => $afficherMesInfos]);
  }

}


?>
