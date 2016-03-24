<?php

abstract class modele {

  private $bdd;

  protected function executerRequete($sql, $parametres = null) {
    if ($parametres == null){
      $resultat = $this->getBdd()->query($sql);
    }
    else {
      $resultat = $this->getBdd()->prepare($sql);
      $resultat->execute($parametres);
    }
  }

  private function getBdd() {
    if ($this->bdd == null) {
      $this->bdd = new PDO('mysql:host=localhost; dbname=teamhub; charset=utf8', 'root', 'root');
    }
    return $this->bdd;
  }
}
?>
