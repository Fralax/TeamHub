<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class membres{

  public function afficherAccueilMembres(){
    $vue = new Vue('AccueilMembres');
    $vue->genererMembres();

  }

  public function afficherAProposMembres(){
    $vue = new Vue('APropos');
    $vue->genererMembres();
  }

  public function affichageMesInfos(){
    $utilisateurs = new utilisateurs();
    $afficherMesInfos = $utilisateurs->afficherMesInfos()->fetch();
    $vue = new Vue('MesInfos');
    $vue->genererMembres(["infos" => $afficherMesInfos]);
  }

  public function modificationMesInfos(){
    $vue = new Vue('ModifMesInfos');
    $vue->genererMembres();
  }

  public function (){
    $utilisateurs = new utilisateurs();
    $afficherMesInfos = $utilisateurs->modifierMesInfos();
  }


}


?>
