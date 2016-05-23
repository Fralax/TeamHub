<?php

require_once 'Modeles/recherche.php';
require_once 'Vues/vue.php';

class controleurRecherche{

  public function rechercheGroupes(){
    $recherche = $_POST['Recherche'];
    if (isset($recherche) && $recherche == 'Rechercher'){
      header('Location: index.php?page=resultatsrecherche&resultatsrecherche='.$_POST['BarreRecherche']);
      exit;
    }
  }

  public function affichageResultatsRecherche(){
    $recherche = new recherche();
    $resultatRechercheGroupes = $recherche->rechercherGroupes()->fetchAll();
    $resultatRechercheMembres = $recherche->rechercherMembres()->fetchAll();
    $resultatRechercheClubs = $recherche->rechercherClubs()->fetchAll();

    $vue = new Vue('ResultatsRecherche');
    $vue->generer(['groupes' => $resultatRechercheGroupes, 'membres' => $resultatRechercheMembres, 'clubs' => $resultatRechercheClubs]);
  }

  public function affichageRechercheAvancee(){
    if (isset($_POST['Rechercher1']) && $_POST['Rechercher1'] == 'Rechercher'){
      header('Location: index.php?page=resultatsrechercheavancee&recherche1='.$_POST['nomGroupe'].'&recherche2='.$_POST['departement'].'&recherche3='.$_POST['sport'].'&recherche4='.$_POST['administrateur']);
    }
    $vue = new Vue('RechercheAvancee');
    $vue->generer();
  }

  public function resultatRechercheAvancee(){
    $recherche = new recherche();
    $resultatRechercheAvanceeGroupes = $recherche->rechercherAvanceeGroupes($_GET['recherche1'], $_GET['recherche2'], $_GET['recherche3'], $_GET['recherche4'])->fetchAll();

    $vue = new Vue('ResultatsRechercheAvancee');
    $vue->generer(['groupes' => $resultatRechercheAvanceeGroupes]);
  }
}

?>
