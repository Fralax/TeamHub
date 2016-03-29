<?php

class membres{

  public function afficherAccueilMembres(){
    $vue = new Vue('AccueilMembres');
    $vue->genererMembres();

  }

  public function afficherAProposMembres(){
    $vue = new Vue('APropos');
    $vue->genererMembres();
  }
}


?>
