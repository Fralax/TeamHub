<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class membres{

  public function afficherAccueilMembres(){
    $vue = new Vue('AccueilMembres');
    $vue->generer();

  }

  public function afficherAProposMembres(){
    $vue = new Vue('APropos');
    $vue->generer();
  }

  public function affichageMesInfos(){
    $utilisateurs = new utilisateurs();
    $afficherMesInfos = $utilisateurs->afficherMesInfos()->fetch();
    $vue = new Vue('MesInfos');
    $vue->generer(["infos" => $afficherMesInfos]);
  }


}


?>
