<?php

class membres{

  public function afficherInscription(){
    $vue = new Vue('InscriptionTerminee');
    $vue->generer();
  }

}


?>
