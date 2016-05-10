<?php

require_once "Modeles/modele.php";

class clubs extends modele {

  public function ajouterClubBdd(){

    $hoLundiDebut = "{$_POST['hLundiDebut']}:{$_POST['mLundiDebut']}:00";
    $hoMardiDebut = "{$_POST['hMardiDebut']}:{$_POST['mMardiDebut']}:00";
    $hoMercrediDebut = "{$_POST['hMercrediDebut']}:{$_POST['mMercrediDebut']}:00";
    $hoJeudiDebut = "{$_POST['hJeudiDebut']}:{$_POST['mJeudiDebut']}:00";
    $hoVendrediDebut = "{$_POST['hVendrediDebut']}:{$_POST['mVendrediDebut']}:00";
    $hoSamediDebut = "{$_POST['hSamediDebut']}:{$_POST['mSamediDebut']}:00";
    $hoDimancheDebut = "{$_POST['hDimancheDebut']}:{$_POST['mDimancheDebut']}:00";
    $hoLundiFin = "{$_POST['hLundiFin']}:{$_POST['mLundiFin']}:00";
    $hoMardiFin = "{$_POST['hMardiFin']}:{$_POST['mMardiFin']}:00";
    $hoMercrediFin = "{$_POST['hMercrediFin']}:{$_POST['mMercrediFin']}:00";
    $hoJeudiFin = "{$_POST['hJeudiFin']}:{$_POST['mJeudiFin']}:00";
    $hoVendrediFin = "{$_POST['hVendrediFin']}:{$_POST['mVendrediFin']}:00";
    $hoSamediFin = "{$_POST['hSamediFin']}:{$_POST['mSamediFin']}:00";
    $hoDimancheFin = "{$_POST['hDimancheFin']}:{$_POST['mDimancheFin']}:00";

    $sql = 'INSERT INTO Clubs(c_nom, c_adresse, c_cp, c_numero, c_hoLundiDebut, c_hoMardiDebut, c_hoMercrediDebut, c_hoJeudiDebut, c_hoVendrediDebut, c_hoSamediDebut, c_hoDimancheDebut, c_hoLundiFin, c_hoMardiFin, c_hoMercrediFin, c_hoJeudiFin, c_hoVendrediFin, c_hoSamediFin, c_hoDimancheFin, c_hoCommentaire)
            VALUES (:nomClub, :adresseClub, :cpClub, :numeroClub, :hoLundiDebutClub, :hoMardiDebutClub, :hoMercrediDebutClub, :hoJeudiDebutClub, :hoVendrediDebutClub, :hoSamediDebutClub, :hoDimancheDebutClub,
                    :hoLundiFinClub, :hoMardiFinClub, :hoMercrediFinClub, :hoJeudiFinClub, :hoVendrediFinClub, :hoSamediFinClub, :hoDimancheFinClub, :hoCommentaireClub)';
    $ajouterClubBdd = $this->executerRequete ($sql, array(
      'nomClub'=>$_POST['nomClub'],
      'adresseClub'=>$_POST['adresseClub'],
      'cpClub'=>$_POST['cpClub'],
      'numeroClub'=>$_POST['numeroClub'],
      'hoLundiDebutClub'=>$hoLundiDebut,
      'hoMardiDebutClub'=>$hoMardiDebut,
      'hoMercrediDebutClub'=>$hoMercrediDebut,
      'hoJeudiDebutClub'=>$hoJeudiDebut,
      'hoVendrediDebutClub'=>$hoVendrediDebut,
      'hoSamediDebutClub'=>$hoSamediDebut,
      'hoDimancheDebutClub'=>$hoDimancheDebut,
      'hoLundiFinClub'=>$hoLundiFin,
      'hoMardiFinClub'=>$hoMardiFin,
      'hoMercrediFinClub'=>$hoMercrediFin,
      'hoJeudiFinClub'=>$hoJeudiFin,
      'hoVendrediFinClub'=>$hoVendrediFin,
      'hoSamediFinClub'=>$hoSamediFin,
      'hoDimancheFinClub'=>$hoDimancheFin,
      'hoCommentaireClub'=>$_POST['remarqueHoraire']));
  }

  public function listerClub(){
    $sql = 'SELECT c_nom, c_adresse, c_cp, c_numero, c_hoLundiDebut, c_hoMardiDebut, c_hoMercrediDebut, c_hoJeudiDebut, c_hoVendrediDebut, c_hoSamediDebut, c_hoDimancheDebut, c_hoLundiFin, c_hoMardiFin, c_hoMercrediFin, c_hoJeudiFin, c_hoVendrediFin, c_hoSamediFin, c_hoDimancheFin, c_hoCommentaire
            FROM Clubs';
    $listerClub = $this->executerRequete ($sql);
    return $listerClub;
  }

}
?>
