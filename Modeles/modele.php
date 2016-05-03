<<<<<<< HEAD
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
      $this->bdd = new PDO('mysql:host=localhost; dbname=TeamHub; charset=utf8', 'root', 'root');
    }
    return $this->bdd;
  }
}
?>
=======
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
      $this->bdd = new PDO('mysql:host=localhost; dbname=TeamHub; charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    return $this->bdd;
  }
}
?>
>>>>>>> 33c2dcf6fa3c61c857735f20171a690ed1910e92
