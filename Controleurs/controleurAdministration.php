<?php

require_once 'Modeles/administration.php';
require_once 'Vues/vue.php';

class controleurAdministration{

  public function affichageAdministration(){
    $vue = new Vue('Admin');
    $vue->generer();
  }

  public function bannissementMembre(){
    $admin = new administration();
    $groupe = new groupes();
    $appartient = new utilisateurs();
    $mail = $admin->recupMail()->fetch();
    $groupesAdmin = $admin->ListerGroupesAdmin($_POST['banni'])->fetchAll();
    $groupesNonAdmin = $admin->ListerGroupesNonAdmin($_POST['banni'])->fetchAll();
    if (isset($_POST['bannir']) && $_POST['bannir'] == 'Bannir'){
      if ($_POST['banni'] != ""){
        $ajouterbanni = $admin->bannirMembre($mail[0]);

        foreach ($groupesAdmin as list($nomGroupesAdmin)){
          $groupe->supprimerGroupeBdd($nomGroupesAdmin);
        }
        foreach ($groupesNonAdmin as list($nomGroupesNonAdmin)){
          $appartient->supprimerAppartientBddNonAdmin($nomGroupesNonAdmin);
          $groupe->augmenterPlacesLibres($nomGroupesNonAdmin);
        }
        header("Location: index.php?page=administration");
      }
    }
    $banniPossible = $admin->listerAbannir()->fetchAll();
    $banni = $admin->listerBanni()->fetchAll();
    $vue = new Vue('BannirMembre');
    $vue->generer(array('abannir'=>$banniPossible, 'banni'=>$banni));
  }

  public function affichageBanni(){
    $vue = new Vue('Banni');
    $vue->generer();
  }

  public function debanni($nom){
    $admin = new administration();
    $debanni = $admin->debannir($nom);
    header("Location: index.php?page=administration");
  }

  public function groupesSupprimables(){
    $admin = new administration();
    $groupes = $admin->ListerGroupes()->fetchAll();
    $vue = new Vue('GroupesASupprimer');
    $vue->generer(array('listeGroupes'=>$groupes));
  }

  public function evenementsSupprimables(){
    $admin = new administration();
    $evenements = $admin->ListerEvenements()->fetchAll();
    $vue = new Vue('EvenementsASupprimer');
    $vue->generer(array('listeEvenements'=>$evenements));
  }

}


?>
