<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class membres{

  public function affichageMesInfos(){
    $utilisateurs = new utilisateurs();
    $afficherMesInfos = $utilisateurs->afficherInfos()->fetch();
    $afficherMesSports = $utilisateurs->afficherSports()->fetchAll();
    $vue = new Vue('Profil');
    $vue->generer(array('infos' => $afficherMesInfos, 'sports'=> $afficherMesSports));
  }

  public function ajoutSport(){
    $utilisateurs = new utilisateurs();
    $sportsNonPratiqués = $utilisateurs->recupSports()->fetchAll();
    if (isset($_POST['Ajouter']) && $_POST['Ajouter'] == 'Ajouter'){
      if($_POST['sport'] != ""){
        $ajouterSport = $utilisateurs->ajouterSport();
        header("Location: index.php?page=profil&nom=".$_SESSION['pseudo']);
      } else {
        echo "Sélectionnez un sport !";
      }

    }

    $vue = new Vue('AjoutSport');
    $vue->generer(array('sports'=>$sportsNonPratiqués));
  }

  public function suppressionSport($sport){
    $utilisateurs = new utilisateurs();
    $suppressionSport = $utilisateurs->supprimerSport($sport);
    header("Location: index.php?page=profil&nom=".$_SESSION['pseudo']);
  }

  public function modificationPhoto(){
    $utilisateurs = new utilisateurs();
    if (isset($_POST['modifier'])){
      $modifierPhoto = $utilisateurs->modifierPhoto();
    }
  }

  public function affichagePhoto(){
    $utilisateurs = new utilisateurs();
    $affichagePhoto = $utilisateurs->afficherPhoto()->fetch();
    return $affichagePhoto;
  }

  public function modificationMesCoordonnees(){
    $utilisateurs = new utilisateurs();
    $resultatE = $utilisateurs->verifEmail()->fetch();
    if (isset($_POST['Envoyer']) && $_POST['Envoyer'] == 'Envoyer'){
      if($_POST['Portable'] != "" && $_POST['Email'] != "" && $_POST['ConfirmEmail'] != ""){
        if ($_POST['Email'] != $_POST['ConfirmEmail']){
          echo 'Les adresses mail saisies sont différents !';
        } else{
          if (!$resultatE){
          $modifierMesCoord = $utilisateurs->modifierMesCoordonnees();
          header("Location: index.php?page=profil&nom=".$_SESSION['pseudo']);
        } else {
          echo "Cet Email est déjà utilisé !";
          }
        }
      } else{
        echo "Des champs n'ont pas été remplis !";
      }
    }
    $afficherMesInfos = $utilisateurs->afficherInfos()->fetch();
    $vue = new Vue('ModifMesCoordonnees');
    $vue->generer(["infos" => $afficherMesInfos]);
  }

  public function modificationMonAdresse(){
    $utilisateurs = new utilisateurs();
    $departements = $utilisateurs->recupDepartements()->fetchAll();
    if (isset($_POST['Envoyer']) && $_POST['Envoyer'] == 'Envoyer'){
      if($_POST['cp'] != ""){
        $modifierMonAdresse = $utilisateurs->modifierMonAdresse();
        header("Location: index.php?page=profil&nom=".$_SESSION['pseudo']);
      } else{
        echo "Des champs n'ont pas été remplis";
      }
    }
    $afficherMesInfos = $utilisateurs->afficherInfos()->fetch();
    $vue = new Vue('ModifMonAdresse');
    $vue->generer(["infos" => $afficherMesInfos, "departements" => $departements]);
  }

  public function modificationMonMdp(){
    $user = new utilisateurs();
    if (isset($_POST['modifMdp']) && $_POST['modifMdp'] == 'Modifier le Mot de Passe'){
      if (iconv_strlen($_POST['NouveauMotDePasse'])>=8){
        if($_POST['AncienMotDePasse'] != "" && $_POST['NouveauMotDePasse'] != "" && $_POST['ConfirmNouveauMotDePasse'] != ""){
          $resultatRecupMdp = $user->verifMdp()->fetch();
          if (!password_verify($_POST['AncienMotDePasse'], $resultatRecupMdp[0])){
            echo 'Votre ancien Mot de Passe est incorrect !';
          } else{
            if ($_POST['AncienMotDePasse'] == $_POST['NouveauMotDePasse']){
              echo "Votre nouveau Mot de Passe ne peut pas être identique à l'ancien !";
            } else{
              if ($_POST['ConfirmNouveauMotDePasse'] != $_POST['NouveauMotDePasse']){
                echo 'Les nouveaux Mots de Passe saisis sont différents !';
              } else{
                  $modifierMonMdp = $user->modifierMonMdp();
                  header("Location: index.php?page=profil&nom=".$_SESSION['pseudo']);
                }
              }
            }
          }
        } else {
          echo "Le nouveau mot de passe doit contenir plus de 8 caractères !";
        }
      } else{
        echo "Des champs n'ont pas été remplis !";
      }
    $afficherMesInfos = $user->afficherInfos()->fetch();
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
