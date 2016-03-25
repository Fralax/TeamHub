<<?php
require_once 'Controleurs/controleurConnexion.php';
require_once 'Controleurs/controleurInscription.php';
require_once 'Vues/vue.php';

class routeur{
  private $controleurConnexion;
  private $controleurInscription;

  public function __construct() {
    $this->controleurConnexion = new connexion();
    $this->controleurInscription = new inscription();
  }

  public function routerRequete() {
    try {

    }
    catch(Exception $e){

    }
  }
}

 ?>
