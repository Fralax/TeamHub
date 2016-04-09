<?php

require_once 'Modeles/recherche.php';
require_once 'Vues/vue.php';

class controleurRecherche{

  public function rechercheGroupes(){
    $recherche = $_POST['Recherche'];
    if (isset($recherche) && $recherche == 'Rechercher'){
      header('Location: index.php?page=resultatsrecherche&resultatsrecherche='.$_POST['BarreRecherche']);
    }
  }

  public function affichageResultatsRecherche(){
    $recherche = new recherche();
    $resultatRechercheGroupes = $recherche->rechercherGroupes()->fetchAll();
    $resultatRechercheMembres = $recherche->rechercherMembres()->fetchAll();

    $vue = new Vue('ResultatsRecherche');
    $vue->generer(['groupes' => $resultatRechercheGroupes, 'membres' => $resultatRechercheMembres]);
  }
}

?>
