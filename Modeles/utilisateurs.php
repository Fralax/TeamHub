<?php

require_once "Modeles/modele.php";

class utilisateurs extends modele {

  public function ajoutUtilisateurBdd(){

      $pass_hache = password_hash($_POST['MotDePasse'], PASSWORD_BCRYPT);
      $date = "{$_POST['annee']}-{$_POST['mois']}-{$_POST['jour']}";

      $sql = 'INSERT INTO utilisateurs(u_pseudo, u_nom, u_prenom, u_sexe, u_adresse, u_ville, u_cp, u_region, u_portable, u_email, u_naissance, u_mdp)
              VALUES (:pseudo, :nom, :prenom, :sexe, :adresse, :ville, :cp, :departement, :portable, :email, :naissance, :mdp)';

      $ajoutUtilisateurBdd = $this->executerRequete ($sql, array('pseudo' => $_POST['pseudo'],'nom' => $_POST['nom'],'prenom' => $_POST['Prenom'],'sexe' => $_POST['Sexe'],
        'adresse' => $_POST['Adresse'],'ville' => $_POST['Ville'],'cp' => $_POST['CodePostal'],'departement' => $_POST['departement'],'portable' => $_POST['Portable'],
        'email' => $_POST['Email'],'naissance' => $date,'mdp' => $pass_hache));
  }

  public function verifPseudo(){

    $envoiInscription = $_POST['Envoyer'];
    if (isset($envoiInscription) && $envoiInscription == 'Envoyer'){
      $sql = 'SELECT u_pseudo FROM utilisateurs WHERE u_pseudo = :pseudo ';
      $resultatP = $this->executerRequete($sql, array('pseudo' => $_POST['pseudo']));
      return $resultatP;
    }
  }

  public function verifEmail(){

    $envoiInscription = $_POST['Envoyer'];
      if (isset($envoiInscription) && $envoiInscription == 'Envoyer'){
        $sql = 'SELECT u_pseudo FROM Utilisateurs WHERE u_email = :Email ';
        $resultatE = $this->executerRequete($sql, array( 'Email' => $_POST['Email']));
        return $resultatE;
      }
    }

  public function verifMdp(){
    $envoiConnexion = $_POST['connexion'];
    $envoiModifMdp = $_POST['modifMdp'];
    if ((isset($envoiConnexion) && $envoiConnexion == 'Connexion') || (isset($envoiModifMdp) && $envoiModifMdp == 'Modifier le Mot de Passe')){
      $sql = 'SELECT u_mdp FROM Utilisateurs WHERE u_pseudo = :connexionPseudo OR u_pseudo = :modifPseudo';
      $resultat = $this->executerRequete($sql, array('connexionPseudo' => $_POST['pseudo'], 'modifPseudo' => $_SESSION['pseudo']));
      return $resultat;
    }
  }

  public function ajoutAppartientBdd($nom, $adminBool){
    $sql = 'INSERT INTO Appartient(u_pseudo, g_nom, a_admin)
            VALUES (:pseudo, :nomGroupe, :adminBool)';

    $ajoutGroupeBdd = $this->executerRequete ($sql, array('pseudo'=> $_SESSION['pseudo'], 'nomGroupe'=> $nom, 'adminBool' => $adminBool));
  }

  public function supprimerAppartientBddAdmin($nom){
    $sql = 'DELETE FROM Appartient WHERE g_nom = ?';
    $supprimerAppartientBdd = $this ->executerRequete ($sql, array($nom));
  }

  public function supprimerAppartientBddNonAdmin($nom){
    $sql = 'DELETE FROM Appartient WHERE g_nom = :nom AND u_pseudo = :pseudo';
    $supprimerAppartientBdd = $this ->executerRequete ($sql, array('nom' => $nom, 'pseudo'=>$_SESSION['pseudo']));
  }

  public function afficherMesInfos(){
    $sql = 'SELECT u_prenom, u_nom, u_sexe, u_adresse, u_ville, u_cp, u_region, u_portable, u_email, u_naissance FROM Utilisateurs WHERE u_pseudo = ?';
    $afficherMesInfos = $this->executerRequete ($sql, array($_SESSION['pseudo']));
    return $afficherMesInfos;
  }

  public function modifierMesCoordonnees(){
    $sql = 'UPDATE Utilisateurs SET u_portable = :portable, u_email = :email WHERE u_pseudo = :pseudo ';
    $modifierMesCoordonnees = $this->executerRequete ($sql, array('portable' => $_POST['Portable'], 'email'=> $_POST['Email'],'pseudo' => $_SESSION['pseudo']));
  }

  public function modifierMonAdresse(){
    $sql = 'UPDATE Utilisateurs SET u_adresse = :adresse, u_cp = :cp, u_ville = :ville, u_region = :departement WHERE u_pseudo = :pseudo';
    $modifierMesInfos = $this->executerRequete ($sql, array('adresse' => $_POST['Adresse'], 'cp' => $_POST['CodePostal'], 'ville' => $_POST['Ville'], 'departement' => $_POST['Departement'],'pseudo' => $_SESSION['pseudo']));
  }

  public function RecupMonMdp(){
    $envoiMdp = $_POST['Envoyer'];
    if (isset($envoiMdp) && $envoiMdp == 'Envoyer'){
      $pass_hache = password_hash($_POST['AncienMotDePasse'], PASSWORD_BCRYPT);
      $sql = 'SELECT u_pseudo FROM Utilisateurs WHERE u_pseudo = :pseudo AND u_mdp = :ancienmotdepasse';
      $resultatRecupMdp = $this->executerRequete($sql, array('pseudo' => $_SESSION['pseudo'],'ancienmotdepasse' => $pass_hache));
      return $resultatRecupMdp;
    }
  }

  public function listerMembres($nom){
    $sql = 'SELECT u_pseudo FROM Appartient WHERE g_nom = ?';
    $listerMembres = $this->executerRequete($sql, array($nom));
    return $listerMembres;
  }

}
?>
