<?php

class Vue {

  private $fichier;
  private $titre;

  public function __construct($action) {

    $this->fichier = "Vues/vue" . $action . ".php";

  }


  public function genererVisiteurs($donnees=[]) {

    $contenu = $this->genererFichier($this->fichier, $donnees);
    $vue = $this->genererFichier('Vues/gabaritVisiteurs.php', array('titre' => $this->titre, 'contenu' => $contenu));
    echo $vue;

  }

  public function genererMembres($donnees=[]) {

    $contenu = $this->genererFichier($this->fichier, $donnees);
    $vue = $this->genererFichier('Vues/gabaritMembres.php', array('titre' => $this->titre, 'contenu' => $contenu));
    echo $vue;

  }


  private function genererFichier($fichier, $donnees) {

    if (file_exists($fichier)) {
      extract($donnees);
      ob_start();
      require $fichier;
      return ob_get_clean();
    }

    else {
      throw new Exception("Fichier '$fichier' introuvable");
    }

  }

}
