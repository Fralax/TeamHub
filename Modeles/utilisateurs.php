<?php

require_once "Modeles/modele.php";

class utilisateurs extends modele {

  public function ajoutUtilisateurBdd(){

      $pass_hache = sha1($_POST['MotDePasse']);
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

  public function verifConnexion(){

    $envoiConnexion = $_POST['connexion'];
    if (isset($envoiConnexion) && $envoiConnexion == 'Connexion'){
      $pass_hache = sha1($_POST['PasswordAccueil']);
      $sql = 'SELECT u_pseudo FROM Utilisateurs WHERE u_pseudo = :pseudo AND u_mdp = :passwordaccueil';
      $resultatConnexion = $this->executerRequete($sql, array('pseudo' => $_POST['pseudo'],'passwordaccueil' => $pass_hache));
      return $resultatConnexion;
    }
  }

  public function ajoutAppartientBdd(){
    $sql = 'INSERT INTO Appartient(u_pseudo, g_nom)
            VALUES (:pseudo, :nomGroupe)';

    $ajoutGroupeBdd = $this->executerRequete ($sql, array('pseudo'=> $_SESSION['pseudo'], 'nomGroupe'=> $_POST['nomGroupe']));
  }

}
