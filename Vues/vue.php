<?php

class Vue{

  private $fichier;  // Nom du fichier associé à la vue
  private $titre;  // Titre de la vue (défini dans le fichier vue)

  public function __construct($action){
    $this->fichier = "Vues/vue".$action.".php";
  }

// Génère et affiche la vue
  public function generer($donnees){
    $contenu = $this->genererFichier($this->$fichier, $donnees);
    $vue = $this->genererFichier('Vues/gabarit.php', array('titre' => $this->titre, 'contenu' => $contenu));
    echo $vue;
  }

  private function genererFichier($fichier, $donnees){
    if (file_exists($fichier)){
      extract($donnees);
      ob_start();
      require $fichier;
      return ob_get_clean();
    }
    else{
      throw new Exception("Le fichier '$fichier' est introuvable");

    }
  }
}







 ?>
