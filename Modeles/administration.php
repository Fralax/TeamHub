<?php

require_once "Modeles/modele.php";

class administration extends modele {

  public function listerAbannir(){
    $sql = 'SELECT u_pseudo FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo != ? AND u_pseudo NOT IN (SELECT b_nom FROM teamhubp_teamhub.Bannis )';
    $listerAbannir = $this->executerRequete ($sql, array($_SESSION['pseudo']));
    return $listerAbannir;
  }

  public function listerBanni(){
    $sql = 'SELECT b_nom FROM teamhubp_teamhub.Bannis';
    $listerBanni = $this->executerRequete ($sql);
    return $listerBanni;
  }

  public function recupMail(){
    $sql = 'SELECT u_email FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo = ?';
    $mailbanni = $this->executerRequete ($sql, array($_POST['banni']));
    return $mailbanni;
  }

  public function bannirMembre($mail){
    $sql = 'INSERT INTO teamhubp_teamhub.Bannis (b_nom, b_email) VALUES (:nomAbannir, :mailAbannir)';
    $bannirMembre = $this->executerRequete ($sql, array('nomAbannir'=>$_POST['banni'], 'mailAbannir'=>$mail));
  }

  public function debannir($nom){
    $sql = 'DELETE FROM teamhubp_teamhub.Bannis WHERE b_nom = ?';
    $debannir = $this->executerRequete ($sql, array($nom));
  }

  public function ListerGroupes(){
    $sql ='SELECT g_nom FROM teamhubp_teamhub.Groupes';
    $ListerGroupes = $this->executerRequete ($sql);
    return $ListerGroupes;
  }

  public function ListerGroupesAdmin($nomBanni){
    $sql = 'SELECT g_nom FROM teamhubp_teamhub.Appartient WHERE u_pseudo = ? AND a_admin = ?';
    $ListerGroupesAdmin = $this->executerRequete ($sql, array($nomBanni, "admin"));
    return $ListerGroupesAdmin;
  }

  public function ListerGroupesNonAdmin($nomBanni){
    $sql = 'SELECT g_nom FROM teamhubp_teamhub.Appartient WHERE u_pseudo = ? AND a_admin = ?';
    $ListerGroupesNonAdmin = $this->executerRequete ($sql, array($nomBanni, "nonAdmin"));
    return $ListerGroupesNonAdmin;
  }

  public function ListerEvenements(){
    $sql = 'SELECT e_nom FROM teamhubp_teamhub.Evenements';
    $ListerEvenements = $this->executerRequete ($sql);
    return $ListerEvenements;
  }

  public function ListerClubs(){
    $sql = 'SELECT c_nom, c_adresse, c_cp, c_numero, c_hoLundiDebut, c_hoMardiDebut, c_hoMercrediDebut, c_hoJeudiDebut, c_hoVendrediDebut, c_hoSamediDebut, c_hoDimancheDebut, c_hoLundiFin, c_hoMardiFin, c_hoMercrediFin, c_hoJeudiFin, c_hoVendrediFin, c_hoSamediFin, c_hoDimancheFin, c_hoCommentaire FROM teamhubp_teamhub.Clubs';
    $ListerClubs = $this->executerRequete ($sql);
    return $ListerClubs;
  }

  public function modifierCaracteristiquesClub($nom){
    $sql = 'UPDATE teamhubp_teamhub.Clubs SET c_nom = :nomClub, c_adresse = :adresseClub, c_cp = :cpClub, c_numero = :numeroClub, c_hoLundiDebut = :c_hoLundiDebut, c_hoMardiDebut = :c_hoMardiDebut, c_hoMercrediDebut = :c_hoMercrediDebut, c_hoJeudiDebut = :c_hoJeudiDebut, c_hoVendrediDebut = :c_hoVendrediDebut, c_hoSamediDebut = :c_hoSamediDebut, c_hoDimancheDebut = :c_hoDimancheDebut, c_hoLundiFin = :c_hoLundiFin, c_hoMardiFin = :c_hoMardiFin, c_hoMercrediFin = :c_hoMercrediFin, c_hoJeudiFin = :c_hoJeudiFin, c_hoVendrediFin = :c_hoVendrediFin, c_hoSamediFin = :c_hoSamediFin, c_hoDimancheFin = :c_hoDimancheFin, c_hoCommentaire = :c_hoCommentaire WHERE c_nom = :Club';
    $modifierCaracteristiquesClub = $this->executerRequete($sql, array(
    'nomClub'=>$_POST['nomClub'],
    'adresseClub'=>$_POST['adresseClub'],
    'cpClub'=>$_POST['cpClub'],
    'numeroClub'=>$_POST['numeroClub'],
    'c_hoLundiDebut'=>$_POST['c_hoLundiDebut'],
    'c_hoMardiDebut'=>$_POST['c_hoMardiDebut'],
    'c_hoMercrediDebut'=>$_POST['c_hoMercrediDebut'],
    'c_hoJeudiDebut'=>$_POST['c_hoJeudiDebut'],
    'c_hoVendrediDebut'=>$_POST['c_hoVendrediDebut'],
    'c_hoSamediDebut'=>$_POST['c_hoSamediDebut'],
    'c_hoDimancheDebut'=>$_POST['c_hoDimancheDebut'],
    'c_hoLundiFin'=>$_POST['c_hoLundiFin'],
    'c_hoMardiFin'=>$_POST['c_hoMardiFin'],
    'c_hoMercrediFin'=>$_POST['c_hoMercrediFin'],
    'c_hoJeudiFin'=>$_POST['c_hoJeudiFin'],
    'c_hoVendrediFin'=>$_POST['c_hoVendrediFin'],
    'c_hoSamediFin'=>$_POST['c_hoSamediFin'],
    'c_hoDimancheFin'=>$_POST['c_hoDimancheFin'],
    'c_hoCommentaire'=>$_POST['c_hoCommentaire'],
    'Club'=>$nom));
  }

}
?>
