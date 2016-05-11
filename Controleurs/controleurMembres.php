<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class membres{

  public function affichageMesInfos(){
    $utilisateurs = new utilisateurs();
    $afficherMesInfos = $utilisateurs->afficherMesInfos()->fetch();
    $vue = new Vue('MesInfos');
    $vue->generer(["infos" => $afficherMesInfos]);
  }

  public function affichageModificationMesCoordonnes(){
    $utilisateurs = new utilisateurs();
    $afficherMesInfos = $utilisateurs->afficherMesInfos()->fetch();
    $vue = new Vue('ModifMesCoordonnees');
    $vue->generer(["infos" => $afficherMesInfos]);
  }

  public function affichageModificationMonAdresse(){
    $utilisateurs = new utilisateurs();
    $afficherMesInfos = $utilisateurs->afficherMesInfos()->fetch();
    $vue = new Vue('ModifMonAdresse');
    $vue->generer(["infos" => $afficherMesInfos]);
  }

  public function affichageModificationMonMdp(){
    $vue = new Vue('ModifMonMdp');
    $vue->generer();
  }

  public function modificationPhoto(){
    $utilisateurs = new utilisateurs();
    if (isset($_POST['modifier']) && $_POST['modifier'] == 'Modifier ma photo de Profil'){
      $modifierPhoto = $utilisateurs->modifierPhoto();
      header("Refresh:2; index.php?page=mesinfos");
    }
  }

  public function modificationMesCoordonnees(){
    $utilisateurs = new utilisateurs();
    if (isset($_POST['Envoyer']) && $_POST['Envoyer'] == 'Envoyer'){
      if($_POST['Portable'] != "" && $_POST['Email'] != "" && $_POST['ConfirmEmail'] != ""){
        if ($_POST['Email'] != $_POST['ConfirmEmail']){
          echo 'Les adresses mail saisies sont différents !';
        } else{
          $modifierMesCoord = $utilisateurs->modifierMesCoordonnees();
          header("Location: index.php?page=mesinfos");
        }
      } else{
        echo "Des champs n'ont pas été remplis !";
      }
    }
    $afficherMesInfos = $utilisateurs->afficherMesInfos()->fetch();
    $vue = new Vue('ModifMesCoordonnees');
    $vue->generer(["infos" => $afficherMesInfos]);
  }

  public function modificationMonAdresse(){
    $utilisateurs = new utilisateurs();
    if (isset($_POST['Envoyer']) && $_POST['Envoyer'] == 'Envoyer'){
      if($_POST['Adresse'] != "" && $_POST['Ville'] != "" && $_POST['CodePostal'] != "" && $_POST['Departement'] != ""){
        $modifierMesCoord = $utilisateurs->modifierMonAdresse();
        header("Location: index.php?page=mesinfos");
      } else{
        echo "Des champs n'ont pas été remplis";
      }
    }
    $afficherMesInfos = $utilisateurs->afficherMesInfos()->fetch();
    $vue = new Vue('ModifMonAdresse');
    $vue->generer(["infos" => $afficherMesInfos]);
  }

  public function modificationMonMdp(){
    $user = new utilisateurs();
    if (isset($_POST['modifMdp']) && $_POST['modifMdp'] == 'Modifier le Mot de Passe'){
      if($_POST['AncienMotDePasse'] != "" && $_POST['NouveauMotDePasse'] != "" && $_POST['ConfirmNouveauMotDePasse'] != ""){
        $resultatRecupMdp = $user->verifMdp()->fetch();
        if (!password_verify($_POST['AncienMotDePasse'], $resultatRecupMdp[0])){
          echo 'Votre ancien Mot de Passe est incorrect !';
        } else{
          if ($_POST['ConfirmNouveauMotDePasse'] != $_POST['NouveauMotDePasse']){
            echo 'Les Mots de Passe saisis sont différents !';
          } else{
            $modifierMonMdp = $user->modifierMonMdp();
            header("Location: index.php?page=mesinfos");
          }
        }
      } else{
        echo "Des champs n'ont pas été remplis !";
      }
    }
    $afficherMesInfos = $user->afficherMesInfos()->fetch();
    $vue = new Vue('ModifMonMdp');
    $vue->generer(["infos" => $afficherMesInfos]);
  }

  public function listeMembres($nom){
    $appartient = new utilisateurs();
    $afficherMembres = $appartient->listerMembresGroupe($nom)-> fetchAll();
    $vue = new Vue('VoirLesMembres');
    $vue->generer(array("nom"=>$nom, "membres" => $afficherMembres));
  }

}

?>
