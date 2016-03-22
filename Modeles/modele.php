<?php

abstract class modele {

  private $bdd;

  protected function executerRequete($sql, $parametres) {
    if ($parametres == null){
      $req = $this->getBdd()->query($sql);
    }
    else {
      $req = $this->getBdd()->prepare($sql);
      $req->execute($parametres);
    }
    $resultat = $req->fetch();
    return $resultat;
  }

  private function getBdd() {
    if ($this->bdd == null) {
      $this->bdd = new PDO('mysql:host=localhost; dbname=teamhub; charset=utf8', 'root', 'root');
    }
    return $this->bdd;
  }
}
?>
