<?php

require_once "Modeles/modele.php";

class utilisateurs extends modele {

  public function ajoutUtilisateurBdd($cle, $cleMDP){

      $pass_hache = password_hash($_POST['MotDePasse'], PASSWORD_BCRYPT);
      $date = "{$_POST['annee']}-{$_POST['mois']}-{$_POST['jour']}";
      $photo = "avatar.png";
      $sql1= 'SELECT v_departement, v_nom FROM teamhubp_teamhub.Villes WHERE v_cp = ?';
      $recup = $this->executerRequete ($sql1,array($_POST['cp']));
      $localisation = $recup->fetch();
      $ville = $localisation[1];
      $codeDepartement = $localisation[0];
      $sql2 = 'SELECT d_nom FROM teamhubp_teamhub.Departements WHERE d_code = ?';
      $recupDepartement = $this->executerRequete ($sql2,array($codeDepartement));
      $departement = $recupDepartement->fetch();

      $sql = 'INSERT INTO teamhubp_teamhub.Utilisateurs(u_pseudo, u_nom, u_prenom, u_sexe, u_cp, u_ville, u_region, u_portable, u_email, u_naissance, u_mdp, u_photo, u_cle, u_cleMdp)
              VALUES (:pseudo, :nom, :prenom, :sexe, :cp, :ville, :departement, :portable, :email, :naissance, :mdp, :photo, :cle, :cleMDP)';

      $ajoutUtilisateurBdd = $this->executerRequete ($sql, array('pseudo' => $_POST['pseudo'], 'nom' => $_POST['nom'], 'prenom' => $_POST['Prenom'], 'sexe' => $_POST['Sexe'], 'cp' => $_POST['cp'], 'ville'=>$ville,
      'departement' => $departement[0], 'portable' => $_POST['Portable'], 'email' => $_POST['Email'], 'naissance' => $date, 'mdp' => $pass_hache, 'photo' => $photo, 'cle' => $cle, 'cleMDP' => $cleMDP));
  }

  public function verifPseudo(){

    $envoiInscription = $_POST['Envoyer'];
    if (isset($envoiInscription)){
      $sql = 'SELECT u_pseudo FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo = :pseudo ';
      $resultatP = $this->executerRequete($sql, array('pseudo' => $_POST['pseudo']));
      return $resultatP;
    }
  }

  public function verifEmail(){
    $envoiInscription = $_POST['Envoyer'];
    $sql = 'SELECT u_pseudo FROM teamhubp_teamhub.Utilisateurs WHERE u_email = :Email';
    $resultatE = $this->executerRequete($sql, array( 'Email' => $_POST['Email']));
    return $resultatE;
  }

  public function verifCP(){
    $sql = 'SELECT v_cp FROM teamhubp_teamhub.Villes WHERE v_cp = ?';
    $verifCP = $this->executerRequete($sql, array($_POST['cp']));
    return $verifCP;
  }

  public function recupEmailUtilisateur(){
    $sql = 'SELECT u_email FROM Utilisateurs WHERE u_pseudo = ?';
    $recupEmailUtilisateur = $this->executerRequete($sql, array($_SESSION['pseudo']));
    return $recupEmailUtilisateur;
  }

  public function verifMdp(){
    $envoiConnexion = $_POST['connexion'];
    $envoiModifMdp = $_POST['modifMdp'];
    if ((isset($envoiConnexion)) || (isset($envoiModifMdp))){
      $sql = 'SELECT u_mdp, u_pseudo FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo = :connexionPseudo OR u_pseudo = :modifPseudo';
      $resultat = $this->executerRequete($sql, array('connexionPseudo' => $_POST['pseudo'], 'modifPseudo' => $_SESSION['pseudo']));
      return $resultat;
    }
  }

  public function verifbanni(){
    $sql = 'SELECT b_nom, b_email FROM teamhubp_teamhub.Bannis WHERE b_nom = ?';
    $resultat = $this->executerRequete($sql, array($_POST['pseudo']));
    return $resultat;
  }

  public function ajoutAppartientBdd($pseudo, $nomGroupe, $adminBool){
    $sql = 'INSERT INTO teamhubp_teamhub.Appartient(u_pseudo, g_nom, a_admin)
             VALUES (:pseudo, :nomGroupe, :adminBool)';
    $ajoutGroupeBdd = $this->executerRequete ($sql, array('pseudo'=> $pseudo, 'nomGroupe'=> $nomGroupe, 'adminBool' => $adminBool));

  }

  public function supprimerAppartientBddAdmin($nom){ //Suppression d'un groupe
    $sql = 'DELETE FROM teamhubp_teamhub.Appartient WHERE g_nom = ?';
    $supprimerAppartientBdd = $this ->executerRequete ($sql, array($nom));
  }

  public function supprimerAppartientBddNonAdmin($nom){ //Quitter un groupe
    $sql = 'DELETE FROM teamhubp_teamhub.Appartient WHERE g_nom = :nom AND u_pseudo = :pseudo';
    $supprimerAppartientBdd = $this ->executerRequete ($sql, array('nom' => $nom, 'pseudo'=>$_SESSION['pseudo']));

    $sql2 = 'SELECT e_placesLibres, e_nom FROM teamhubp_teamhub.Evenements WHERE e_nom IN (SELECT e_nom FROM teamhubp_teamhub.Participe WHERE u_pseudo = ?) AND g_nom = ?';
    $recupPlacesEvent = $this->executerRequete($sql2, array($_SESSION['pseudo'], $nom));

    $placesLibresEvent = $recupPlacesEvent->fetchAll();
    foreach ($placesLibresEvent as list($placesLibresEvenement, $nomEvent)) {
      settype($placesLibresEvenement, "integer");
      $sql3 = 'UPDATE teamhubp_teamhub.Evenements SET e_placesLibres = ? WHERE e_nom = ?';
      $insererePlacesLibresEvent = $this->executerRequete($sql3, array($placesLibresEvenement+1, $nomEvent));
    }

    $sql4 = 'DELETE FROM teamhubp_teamhub.Participe WHERE u_pseudo = ? AND e_nom IN (SELECT e_nom FROM teamhubp_teamhub.Evenements WHERE g_nom = ?)';
    $supprimerFromParticipe = $this->executerRequete($sql4, array($_SESSION['pseudo'], $nom));
  }

  public function afficherInfos(){
    $sql = 'SELECT u_prenom, u_nom, u_sexe, u_cp, u_ville, u_region, u_portable, u_email, u_naissance, u_photo FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo = ?';
    $afficherMesInfos = $this->executerRequete ($sql, array($_GET['nom']));
    return $afficherMesInfos;
  }

  public function afficherSports(){
    $sql = 'SELECT s_nom FROM teamhubp_teamhub.Pratique WHERE u_pseudo = ?';
    $afficherMesSports = $this->executerRequete ($sql, array($_GET['nom']));
    return $afficherMesSports;
  }

  public function afficherGroupes(){
    $sql = 'SELECT g_nom FROM teamhubp_teamhub.Appartient WHERE u_pseudo = ?';
    $afficherGroupes = $this->executerRequete ($sql, array($_GET['nom']));
    return $afficherGroupes;
  }

  public function ajouterSport(){
    $sql = 'INSERT INTO teamhubp_teamhub.Pratique (u_pseudo, s_nom) VALUES (:pseudo, :nomSport)';
    $ajouterSport = $this->executerRequete ($sql, array('pseudo'=>$_SESSION['pseudo'], 'nomSport' => $_POST['sport']));
  }

  public function supprimerSport($sport){
    $sql = 'DELETE FROM teamhubp_teamhub.Pratique WHERE u_pseudo = ? AND s_nom = ?';
    $supprimerSport = $this->executerRequete($sql, array($_SESSION['pseudo'], $sport));
  }

  public function modifierPhoto(){
    $fichier = $_FILES['photo']['name'];
    $dossier = 'imagesUtilisateurs/';
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    $extension = strrchr($fichier, '.');

    if(!in_array($extension, $extensions)){
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg...';
    }

    if(!isset($erreur)){
     $fichier = strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

     if(move_uploaded_file($_FILES['photo']['tmp_name'], $dossier . $fichier)){
       $sql = 'UPDATE teamhubp_teamhub.Utilisateurs SET u_photo = :photo WHERE u_pseudo = :pseudo';
       $modifierPhoto = $this->executerRequete ($sql, array('photo' => $fichier,'pseudo' => $_SESSION['pseudo']));
     } else {
       echo 'Echec de l\'upload !';
     }
    } else {
     echo $erreur;
    }
  }

  public function afficherPhoto($nom){
    $sql = 'SELECT u_photo FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo = ?';
    $afficherPhoto = $this->executerRequete($sql, array($nom));
    return $afficherPhoto;
  }

  public function modifierMesCoordonnees(){
    $sql = 'UPDATE teamhubp_teamhub.Utilisateurs SET u_portable = :portable, u_email = :email WHERE u_pseudo = :pseudo ';
    $modifierMesCoordonnees = $this->executerRequete ($sql, array('portable' => $_POST['Portable'], 'email'=> $_POST['Email'],'pseudo' => $_SESSION['pseudo']));
  }

  public function modifierMonAdresse(){
    $sql1= 'SELECT v_departement, v_nom FROM teamhubp_teamhub.Villes WHERE v_cp = ?';
    $recup = $this->executerRequete ($sql1,array($_POST['cp']));
    $localisation = $recup->fetch();
    $ville = $localisation[1];
    $codeDepartement = $localisation[0];
    $sql2 = 'SELECT d_nom FROM teamhubp_teamhub.Departements WHERE d_code = ?';
    $recupDepartement = $this->executerRequete ($sql2,array($codeDepartement));
    $departement = $recupDepartement->fetch();

    $sql = 'UPDATE teamhubp_teamhub.Utilisateurs SET u_region = :departement, u_ville = :ville, u_cp = :cp WHERE u_pseudo = :pseudo';
    $modifierMesInfos = $this->executerRequete ($sql, array('departement' => $departement[0], 'ville'=>$ville, 'cp' => $_POST['cp'],'pseudo' => $_SESSION['pseudo']));
  }

  public function modifierMonMdp(){
    $envoiMdp = $_POST['modifMdp'];
    if (isset($envoiMdp)){
      $pass_hache = password_hash($_POST['NouveauMotDePasse'], PASSWORD_BCRYPT);
      $sql = 'UPDATE teamhubp_teamhub.Utilisateurs SET u_mdp = :nouveauMdp WHERE u_pseudo = :pseudo';
      $resultatRecupMdp = $this->executerRequete($sql, array('pseudo' => $_SESSION['pseudo'],'nouveauMdp' => $pass_hache));
    }
  }

  public function listerMembresGroupe($nom){
    $sql = 'SELECT u_pseudo FROM teamhubp_teamhub.Appartient WHERE g_nom = ?';
    $listerMembresGroupe = $this->executerRequete($sql, array($nom));
    return $listerMembresGroupe;
  }

  public function listerMembresNote($nomClub){
    $sql = 'SELECT u_pseudo FROM teamhubp_teamhub.Note WHERE c_nom = ?';
    $listerMembresNote = $this->executerRequete($sql, array($nomClub));
    return $listerMembresNote;
  }

  public function listerMembresNouvelAdmin(){
    $sql = 'SELECT u_pseudo FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo NOT IN(SELECT u_pseudo FROM teamhubp_teamhub.Admins) AND u_pseudo NOT IN (SELECT b_nom FROM teamhubp_teamhub.Bannis)';
    $listerMembresNouvelAdmin = $this->executerRequete($sql);
    return $listerMembresNouvelAdmin;
  }

  public function listerMembresSite(){
    $sql = 'SELECT u_pseudo FROM teamhubp_teamhub.Utilisateurs';
    $membresSite = $this->executerRequete($sql);
    return $membresSite;
  }

  public function recupCleActifCompte(){
    $sql = 'SELECT u_cle, u_actif FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo = :pseudo';
    $recupCleActif =$this->executerRequete($sql, array('pseudo'=>$_GET['pseudo']));
    return $recupCleActif;
  }

  public function recupCleMdp($mail){
    $sql = 'SELECT u_cleMdp FROM teamhubp_teamhub.Utilisateurs WHERE u_email = ?';
    $recupCleMdp = $this->executerRequete($sql, array($mail));
    return $recupCleMdp;
  }

  public function recupPseudoMdpOublie($mail){
    $sql = 'SELECT u_pseudo FROM teamhubp_teamhub.Utilisateurs WHERE u_email = ?';
    $recupPseudoMdpOublie = $this->executerRequete($sql, array($mail));
    return $recupPseudoMdpOublie;
  }

  public function validerCompte(){
    $sql = 'UPDATE teamhubp_teamhub.Utilisateurs SET u_actif = :actif WHERE u_pseudo = :pseudo';
    $validerCompte = $this->executerRequete($sql, array('actif' => 1, 'pseudo' => $_GET['pseudo']));
  }

  public function verifActif(){
    $sql = 'SELECT u_actif FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo = ?';
    $verifActif = $this->executerRequete($sql, array($_POST['pseudo']));
    return $verifActif;
  }

  public function recupCleMdpVerif($pseudo){
    $sql = 'SELECT u_cleMdp FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo = ?';
    $recupCleMdpVerif = $this->executerRequete($sql, array($pseudo));
    return $recupCleMdpVerif;
  }

  public function updateMdp($motDePasse, $newCle, $pseudo){
    $sql = 'UPDATE teamhubp_teamhub.Utilisateurs SET u_mdp = ?, u_cleMdp = ? WHERE u_pseudo = ?';
    $updateMdp = $this->executerRequete($sql, array($motDePasse, $newCle, $pseudo));
  }


  public function recupDepartements(){
    $sql = 'SELECT d_nom FROM Departements';
    $recupDepartements = $this->executerRequete($sql);
    return $recupDepartements;
  }

  public function recupSports(){
    $sql = 'SELECT s_nom FROM teamhubp_teamhub.Sports WHERE s_nom NOT IN (SELECT s_nom FROM teamhubp_teamhub.Pratique WHERE u_pseudo = ?)';
    $recupSports = $this->executerRequete($sql, array($_SESSION['pseudo']));
    return $recupSports;
  }

  public function sportsPraticables(){
    $sql = 'SELECT s_nom FROM teamhubp_teamhub.Sports';
    $sportsPraticables = $this->executerRequete($sql);
    return $sportsPraticables;
  }

  public function afficherPhotoForum($nom){
    $sql = 'SELECT u_photo FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo = ?';
    $afficherPhoto = $this->executerRequete($sql, array($nom));
    return $afficherPhoto;
  }
  public function ajoutGroupeAuto($nomGroupe, $pseudo){
    $sql = 'INSERT INTO Appartient (u_pseudo, g_nom, a_admin) VALUES (:pseudo, :nomGroupe, :adminBool)';
    $ajouterMembreAuto = $this->executerRequete($sql, array('pseudo' => $pseudo, 'nomGroupe' => $nomGroupe, 'a_admin' => "nonAdmin"));

    $sql2 = 'DELETE FROM teamhubp_teamhub.Attend WHERE g_nom = ? AND u_pseudo = ?';
    $supprimerMembreAttend = $this->executerRequete($sql2, array($nomGroupe, $pseudo));
  }

}
