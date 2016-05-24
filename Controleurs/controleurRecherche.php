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
      header('Location: index.php?page=resultatsrechercheavancee1&recherche1='.$_POST['nomGroupe'].'&recherche2='.$_POST['departementGroupe'].'&recherche3='.$_POST['sport'].'&recherche4='.$_POST['administrateur']);
    }
    if (isset($_POST['Rechercher2']) && $_POST['Rechercher2'] == 'Rechercher'){
      header('Location: index.php?page=resultatsrechercheavancee2&recherche1='.$_POST['nomMembre'].'&recherche2='.$_POST['localisationMembre']);
    }
    if (isset($_POST['Rechercher3']) && $_POST['Rechercher3'] == 'Rechercher'){
      header('Location: index.php?page=resultatsrechercheavancee3&recherche1='.$_POST['nomClub'].'&recherche2='.$_POST['departementClub']);
    }
    $vue = new Vue('RechercheAvancee');
    $vue->generer();
  }

  public function resultatRechercheAvanceeGroupes(){
    $recherche = new recherche();
    $resultatRechercheAvanceeGroupes = $recherche->rechercherAvanceeGroupes($_GET['recherche1'], $_GET['recherche2'], $_GET['recherche3'], $_GET['recherche4'])->fetchAll();

    $vue = new Vue('ResultatRechercheAvanceeGroupes');
    $vue->generer(['groupes' => $resultatRechercheAvanceeGroupes]);
  }

  public function resultatRechercheAvanceeMembres(){
    $recherche = new recherche();
    $resultatRechercheAvanceeMembres = $recherche->rechercherAvanceeMembres($_GET['recherche1'], $_GET['recherche2'])->fetchAll();

    $vue = new Vue('ResultatRechercheAvanceeMembres');
    $vue->generer(['membres' => $resultatRechercheAvanceeMembres]);
  }

  public function resultatRechercheAvanceeClubs(){
    $recherche = new recherche();
    $resultatRechercheAvanceeClubs = $recherche->rechercherAvanceeClubs($_GET['recherche1'], $_GET['recherche2'])->fetchAll();

    $vue = new Vue('ResultatRechercheAvanceeClubs');
    $vue->generer(['clubs' => $resultatRechercheAvanceeClubs]);
  }
}

?>
