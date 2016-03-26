<?php

class membres{

  public function afficherAccueilMembres(){
    $vue = new Vue('AccueilMembres');
    $vue->genererMembres();
  }

  

}


?>
