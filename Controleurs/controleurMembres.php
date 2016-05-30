<?php

require_once 'Modeles/utilisateurs.php';
require_once 'Vues/vue.php';

class membres{

  public function affichageMesInfos(){
    $utilisateurs = new utilisateurs();
    $afficherMesInfos = $utilisateurs->afficherInfos()->fetch();
    $afficherMesSports = $utilisateurs->afficherSports()->fetchAll();
    $afficherMesGroupes = $utilisateurs->afficherGroupes()->fetchAll();
    $recupEmail = $utilisateurs->recupEmailUtilisateur()->fetch();

    // AJOUT DES SPORTS NON PRATIQUES
    $sportsNonPratiques = $utilisateurs->recupSports()->fetchAll();
    if (isset($_POST['Ajouter']) && $_POST['Ajouter'] == 'Ajouter'){
      if($_POST['sport'] != ""){
        $ajouterSport = $utilisateurs->ajouterSport();
        header("Location: index.php?page=profil&nom=".$_SESSION['pseudo']);
      } else {
        ?> <script> alert("Sélectionnez un sport !")</script> <?php
      }
    }

    // MODIFICATION MES COORDONNEES
    $resultatE = $utilisateurs->verifEmail()->fetch();
    if (isset($_POST['envoyerCoordonnees']) && $_POST['envoyerCoordonnees'] == 'Valider'){
      if($_POST['Portable'] != "" && $_POST['Email'] != "" && $_POST['ConfirmEmail'] != ""){
        if ($_POST['Email'] != $_POST['ConfirmEmail']){
          ?> <script> alert("Les adresses mail saisies sont différents !")</script> <?php
        } else{
          if ($recupEmail[0] != $_POST['Email']) {
            if (!$resultatE) {
              $modifierMesCoord = $utilisateurs->modifierMesCoordonnees();
              header("Location: index.php?page=profil&nom=".$_SESSION['pseudo']);
            } else {
            ?> <script> alert("Cet Email est déjà utilisé !")</script> <?php
            }
          } else{
            $modifierMesCoord = $utilisateurs->modifierMesCoordonnees();
            header("Location: index.php?page=profil&nom=".$_SESSION['pseudo']);
          }
        }
      } else{
        ?> <script> alert("Des champs n'ont pas été remplis !")</script> <?php
      }
    }

    // MODIFICATION MA LOCALISATION
    $departements = $utilisateurs->recupDepartements()->fetchAll();
    if (isset($_POST['envoyerLocalisation']) && $_POST['envoyerLocalisation'] == 'Valider'){
      if($_POST['cp'] != ""){
        $modifierMonAdresse = $utilisateurs->modifierMonAdresse();
        header("Location: index.php?page=profil&nom=".$_SESSION['pseudo']);
      } else{
        ?> <script> alert("Des champs n'ont pas été remplis")</script> <?php
      }
    }

    // MODIFICATION MON MDP
    if (isset($_POST['modifMdp']) && $_POST['modifMdp'] == 'Modifier le Mot de Passe'){
      if (iconv_strlen($_POST['NouveauMotDePasse'])>=8){
        if($_POST['AncienMotDePasse'] != "" && $_POST['NouveauMotDePasse'] != "" && $_POST['ConfirmNouveauMotDePasse'] != ""){
          $resultatRecupMdp = $utilisateurs->verifMdp()->fetch();
          if (!password_verify($_POST['AncienMotDePasse'], $resultatRecupMdp[0])){
            ?> <script> alert("Votre ancien Mot de Passe est incorrect !")</script> <?php
          } else{
            if ($_POST['AncienMotDePasse'] == $_POST['NouveauMotDePasse']){
              ?> <script> alert("Votre nouveau Mot de Passe ne peut pas être identique à l'ancien !")</script> <?php
            } else{
              if ($_POST['ConfirmNouveauMotDePasse'] != $_POST['NouveauMotDePasse']){
                ?> <script> alert("Les nouveaux Mots de Passe saisis sont différents !")</script> <?php
              } else{
                  $modifierMonMdp = $utilisateurs->modifierMonMdp();
                  ?> <script> alert("Votre mot de passe a bien été modifié")</script> <?php
                  header("Location: index.php?page=profil&nom=".$_SESSION['pseudo']);
                }
              }
            }
          } else{
            ?> <script> alert("Des champs n'ont pas été remplis !")</script> <?php
          }
        } else {
          ?> <script> alert("Le nouveau mot de passe doit contenir plus de 8 caractères !")</script> <?php
        }
      }

    $vue = new Vue('Profil');
    $vue->generer(array('infos' => $afficherMesInfos, 'sports'=> $afficherMesSports, 'groupes'=>$afficherMesGroupes, 'sportsNonPratiques' => $sportsNonPratiques));
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

  public function listeMembres($nom){
    $appartient = new utilisateurs();
    $afficherMembres = $appartient->listerMembresGroupe($nom)-> fetchAll();
    $vue = new Vue('VoirLesMembres');
    $vue->generer(array("nom"=>$nom, "membres" => $afficherMembres));
  }

}

?>
