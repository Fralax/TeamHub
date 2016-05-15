<?php

require_once "Modeles/modele.php";

class utilisateurs extends modele {

  public function ajoutUtilisateurBdd(){

      $pass_hache = password_hash($_POST['MotDePasse'], PASSWORD_BCRYPT);
      $date = "{$_POST['annee']}-{$_POST['mois']}-{$_POST['jour']}";
      $photo = "avatar.png";

      $sql = 'INSERT INTO teamhubp_teamhub.Utilisateurs(u_pseudo, u_nom, u_prenom, u_sexe, u_adresse, u_ville, u_cp, u_region, u_portable, u_email, u_naissance, u_mdp, u_photo)
              VALUES (:pseudo, :nom, :prenom, :sexe, :adresse, :ville, :cp, :departement, :portable, :email, :naissance, :mdp, :photo)';

      $ajoutUtilisateurBdd = $this->executerRequete ($sql, array('pseudo' => $_POST['pseudo'],'nom' => $_POST['nom'],'prenom' => $_POST['Prenom'],'sexe' => $_POST['Sexe'],
        'adresse' => $_POST['Adresse'],'ville' => $_POST['Ville'],'cp' => $_POST['CodePostal'],'departement' => $_POST['departement'],'portable' => $_POST['Portable'],
        'email' => $_POST['Email'],'naissance' => $date,'mdp' => $pass_hache, 'photo' => $photo));
  }

  public function verifPseudo(){

    $envoiInscription = $_POST['Envoyer'];
    if (isset($envoiInscription) && $envoiInscription == 'Envoyer'){
      $sql = 'SELECT u_pseudo FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo = :pseudo ';
      $resultatP = $this->executerRequete($sql, array('pseudo' => $_POST['pseudo']));
      return $resultatP;
    }
  }

  public function verifEmail(){

    $envoiInscription = $_POST['Envoyer'];
      if (isset($envoiInscription) && $envoiInscription == 'Envoyer'){
        $sql = 'SELECT u_pseudo FROM teamhubp_teamhub.Utilisateurs WHERE u_email = :Email ';
        $resultatE = $this->executerRequete($sql, array( 'Email' => $_POST['Email']));
        return $resultatE;
      }
    }

  public function verifMdp(){
    $envoiConnexion = $_POST['connexion'];
    $envoiModifMdp = $_POST['modifMdp'];
    if ((isset($envoiConnexion) && $envoiConnexion == 'Connexion') || (isset($envoiModifMdp) && $envoiModifMdp == 'Modifier le Mot de Passe')){
      $sql = 'SELECT u_mdp FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo = :connexionPseudo OR u_pseudo = :modifPseudo';
      $resultat = $this->executerRequete($sql, array('connexionPseudo' => $_POST['pseudo'], 'modifPseudo' => $_SESSION['pseudo']));
      return $resultat;
    }
  }

  public function ajoutAppartientBdd($nom, $adminBool){
    $sql = 'INSERT INTO teamhubp_teamhub.Appartient(u_pseudo, g_nom, a_admin)
             VALUES (:pseudo, :nomGroupe, :adminBool)';
    $ajoutGroupeBdd = $this->executerRequete ($sql, array('pseudo'=> $_SESSION['pseudo'], 'nomGroupe'=> $nom, 'adminBool' => $adminBool));

  }

  public function supprimerAppartientBddAdmin($nom){ //Suppression d'un groupe
    $sql = 'DELETE FROM teamhubp_teamhub.Appartient WHERE g_nom = ?';
    $supprimerAppartientBdd = $this ->executerRequete ($sql, array($nom));
  }

  public function supprimerAppartientBddNonAdmin($nom){ //Quitter un groupe
    $sql = 'DELETE FROM teamhubp_teamhub.Appartient WHERE g_nom = :nom AND u_pseudo = :pseudo';
    $supprimerAppartientBdd = $this ->executerRequete ($sql, array('nom' => $nom, 'pseudo'=>$_SESSION['pseudo']));
    $sql2 = 'SELECT e_nom FROM teamhubp_teamhub. Evenements WHERE g_nom = ?';
    $recupEvenementASupprimer = $this->executerRequete ($sql2, array($nom));
    $evenements = $recupEvenementASupprimer->fetchAll();
    $nb = count($evenements);
    for ($i = 0; $i < $nb; $i++){
      $sql3 = 'DELETE FROM teamhubp_teamhub.Participe WHERE e_nom = ?';
      $supprimerGroupeParticipe = $this->executerRequete ($sql3, array($evenements[$i][0]));
    }
  }

  public function afficherMesInfos(){
    $sql = 'SELECT u_prenom, u_nom, u_sexe, u_adresse, u_ville, u_cp, u_region, u_portable, u_email, u_naissance, u_photo FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo = ?';
    $afficherMesInfos = $this->executerRequete ($sql, array($_SESSION['pseudo']));
    return $afficherMesInfos;
  }

  public function afficherMesSports(){
    $sql = 'SELECT s_nom FROM teamhubp_teamhub.Pratique WHERE u_pseudo = ?';
    $afficherMesSports = $this->executerRequete ($sql, array($_SESSION['pseudo']));
    return $afficherMesSports;
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

  public function afficherPhoto(){
    $sql = 'SELECT u_photo FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo = ?';
    $afficherPhoto = $this->executerRequete($sql, array($_SESSION['pseudo']));
    return $afficherPhoto;
  }

  public function modifierMesCoordonnees(){
    $sql = 'UPDATE teamhubp_teamhub.Utilisateurs SET u_portable = :portable, u_email = :email WHERE u_pseudo = :pseudo ';
    $modifierMesCoordonnees = $this->executerRequete ($sql, array('portable' => $_POST['Portable'], 'email'=> $_POST['Email'],'pseudo' => $_SESSION['pseudo']));
  }

  public function modifierMonAdresse(){
    $sql = 'UPDATE teamhubp_teamhub.Utilisateurs SET u_adresse = :adresse, u_cp = :cp, u_ville = :ville, u_region = :departement WHERE u_pseudo = :pseudo';
    $modifierMesInfos = $this->executerRequete ($sql, array('adresse' => $_POST['Adresse'], 'cp' => $_POST['CodePostal'], 'ville' => $_POST['Ville'], 'departement' => $_POST['Departement'],'pseudo' => $_SESSION['pseudo']));
  }

  public function modifierMonMdp(){
    $envoiMdp = $_POST['Envoyer'];
    if (isset($envoiMdp) && $envoiMdp == 'Envoyer'){
      $pass_hache = password_hash($_POST['AncienMotDePasse'], PASSWORD_BCRYPT);
      $sql = 'SELECT u_pseudo FROM teamhubp_teamhub.Utilisateurs WHERE u_pseudo = :pseudo AND u_mdp = :ancienmotdepasse';
      $resultatRecupMdp = $this->executerRequete($sql, array('pseudo' => $_SESSION['pseudo'],'ancienmotdepasse' => $pass_hache));
      return $resultatRecupMdp;
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

}
