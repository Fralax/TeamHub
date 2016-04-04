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

  public function modificationMesCoordonnes(){
    $utilisateurs = new utilisateurs();
    $afficherMesInfos = $utilisateurs->afficherMesInfos()->fetch();
    $vue = new Vue('ModifMesCoordonnes');
    $vue->generer(["infos" => $afficherMesInfos]);
  }

  public function modificationMonAdresse(){
    $utilisateurs = new utilisateurs();
    $afficherMesInfos = $utilisateurs->afficherMesInfos()->fetch();
    $vue = new Vue('ModifMonAdresse');
    $vue->generer(["infos" => $afficherMesInfos]);
  }

  public function modificationMonMdp(){
    $vue = new Vue('ModifMonMdp');
    $vue->generer();
  }



}


?>
