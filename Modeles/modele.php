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
    return $resultat;
  }

  private function getBdd() {
    if ($this->bdd == null) {
      $this->bdd = new PDO('mysql:host=mysql.hostinger.fr; dbname=teamh; charset=utf8', 'u654853168_root', 'Totolino1', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    return $this->bdd;
  }
}
?>
