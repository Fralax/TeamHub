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

    $sql1= 'SELECT v_departement, v_nom FROM teamhubp_teamhub.Villes WHERE v_cp = ?';
    $recup = $this->executerRequete ($sql1,array($_POST['cpClub']));
    $localisation = $recup->fetch();
    $ville = $localisation[1];
    $codeDepartement = $localisation[0];
    $sql2 = 'SELECT d_nom FROM teamhubp_teamhub.Departements WHERE d_code = ?';
    $recupDepartement = $this->executerRequete ($sql2,array($codeDepartement));
    $departement = $recupDepartement->fetch();

    $fichier = $_FILES['photo']['name'];
    $dossier = 'imagesClubs/';
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    $extension = strrchr($fichier, '.');
    if(!in_array($extension, $extensions)){
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg...';
    }

    if(!isset($erreur)){
     $fichier = strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

     if(move_uploaded_file($_FILES['photo']['tmp_name'], $dossier . $fichier)){
       $sql = 'INSERT INTO teamhubp_teamhub.Clubs(c_nom, c_adresse, c_cp, c_ville, c_departement, c_numero, c_hoLundiDebut, c_hoMardiDebut, c_hoMercrediDebut, c_hoJeudiDebut, c_hoVendrediDebut, c_hoSamediDebut, c_hoDimancheDebut, c_hoLundiFin, c_hoMardiFin, c_hoMercrediFin, c_hoJeudiFin, c_hoVendrediFin, c_hoSamediFin, c_hoDimancheFin, c_hoCommentaire, c_image)

               VALUES (:nomClub, :adresseClub, :cpClub, :villeClub, :departementClub, :numeroClub, :hoLundiDebutClub, :hoMardiDebutClub, :hoMercrediDebutClub, :hoJeudiDebutClub, :hoVendrediDebutClub, :hoSamediDebutClub, :hoDimancheDebutClub,
                       :hoLundiFinClub, :hoMardiFinClub, :hoMercrediFinClub, :hoJeudiFinClub, :hoVendrediFinClub, :hoSamediFinClub, :hoDimancheFinClub, :hoCommentaireClub, :image)';
       $ajouterClubBdd = $this->executerRequete ($sql, array(
         'nomClub'=>$_POST['nomClub'],
         'adresseClub'=>$_POST['adresseClub'],
         'cpClub'=>$_POST['cpClub'],
         'villeClub'=>$ville,
         'departementClub'=>$departement[0],
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
         'hoCommentaireClub'=>$_POST['remarqueHoraire'],
         'image'=>$fichier));
     } else {
       echo 'Echec de l\'upload !';
     }
    } else {
     echo $erreur;
    }
  }

  public function verifClub(){
    if (isset($_POST['ajouter']) && $_POST['ajouter'] == 'Ajouter'){
      $sql = 'SELECT c_nom FROM teamhubp_teamhub.Clubs WHERE c_nom = :nomClub ';
      $resultatClub = $this->executerRequete($sql, array('nomClub' => $_POST['nomClub']));
      return $resultatClub;
    }
  }

  public function listerClub(){
    $sql = 'SELECT c_nom, c_adresse, c_cp, c_ville, c_image FROM teamhubp_teamhub.Clubs';
    $listerClub = $this->executerRequete ($sql);
    return $listerClub;
  }

  public function listerClubDepartement($groupe){
    $sql = 'SELECT c_nom FROM teamhubp_teamhub.Clubs WHERE c_departement IN (SELECT g_departement FROM teamhubp_teamhub.Groupes WHERE g_nom = ?)';
    $listerClubDepartement = $this->executerRequete ($sql, array($groupe));
    return $listerClubDepartement;
  }

  public function afficherCaracteristiquesClub($nom){
    $sql = 'SELECT c_nom, c_adresse, c_cp, c_ville, c_numero, c_hoLundiDebut, c_hoMardiDebut, c_hoMercrediDebut, c_hoJeudiDebut, c_hoVendrediDebut, c_hoSamediDebut, c_hoDimancheDebut, c_hoLundiFin, c_hoMardiFin, c_hoMercrediFin, c_hoJeudiFin, c_hoVendrediFin, c_hoSamediFin, c_hoDimancheFin, c_hoCommentaire, c_image
            FROM teamhubp_teamhub.Clubs WHERE c_nom = ?';
    $afficherCaracteristiquesClub = $this->executerRequete($sql, array($nom));
    return $afficherCaracteristiquesClub;
  }

  public function noterClub($nom){
    $sql = 'INSERT INTO teamhubp_teamhub.Note(u_pseudo, c_nom, n_note, n_commentaire, n_date) VALUES (:pseudo, :nomClub, :noteClub, :commentaireClub, CURDATE())';
    $noterClub = $this->executerRequete ($sql, array('pseudo' => $_SESSION['pseudo'], 'nomClub' => $nom, 'noteClub' => $_POST['noteClub'], 'commentaireClub' => $_POST['commentaireClub']));
  }

  public function listerDerniereNote($nom){
    $sql = 'SELECT u_pseudo, n_note, n_commentaire, n_date FROM teamhubp_teamhub.Note WHERE c_nom = ? ORDER BY n_date DESC LIMIT 3';
    $listerDerniereNote = $this->executerRequete($sql, array($nom));
    return $listerDerniereNote;
  }

  public function listerMeilleureNote($nom){

    $sql = 'SELECT u_pseudo, n_note, n_commentaire, n_date FROM teamhubp_teamhub.Note WHERE c_nom = ? ORDER BY n_note DESC LIMIT 3';
    $listerMeilleureClub = $this->executerRequete($sql, array($nom));
    return $listerMeilleureClub;
  }

  public function listerPireNote($nom){
    $sql = 'SELECT u_pseudo, n_note, n_commentaire, n_date FROM teamhubp_teamhub.Note WHERE c_nom = ? ORDER BY n_note ASC LIMIT 3';
    $listerPireClub = $this->executerRequete($sql, array($nom));
    return $listerPireClub;

  }

}
?>
