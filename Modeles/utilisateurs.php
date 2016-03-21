<?php

require_once "Modeles/modele.php";

class utilisateurs extends modele {

  public function ajoutUtilisateurBdd(){

      $pass_hache = sha1($_POST['MotDePasse']);
      $date = "{$_POST['annee']}-{$_POST['mois']}-{$_POST['jour']}";

      $sql = 'INSERT INTO utilisateurs(u_pseudo, u_nom, u_prenom, u_sexe, u_adresse, u_ville, u_cp, u_region, u_portable, u_email, u_naissance, u_mdp)
              VALUES (:pseudo, :nom, :prenom, :sexe, :adresse, :ville, :cp, :departement, :portable, :email, :naissance, :mdp)';

      $ajoutUtilisateurBdd = $this->executerRequete ($sql, array('pseudo' => $_POST['Pseudo'],'nom' => $_POST['Nom'],'prenom' => $_POST['Prenom'],'sexe' => $_POST['Sexe'],
        'adresse' => $_POST['Adresse'],'ville' => $_POST['Ville'],'cp' => $_POST['CodePostal'],'departement' => $_POST['departement'],'portable' => $_POST['Portable'],
        'email' => $_POST['Email'],'naissance' => $date,'mdp' => $pass_hache));
  }

  public function verifPseudo(){

    $connexion = $_POST['Envoyer'];
      if (isset($connexion) && $connexion == 'Envoyer'){

        $sql = 'SELECT u_id FROM utilisateurs WHERE u_pseudo = :Pseudo ';
        $resultatP = $this->executerRequete($sql, array( 'Pseudo' => $_POST['Pseudo']));
        return $resultatP;
      }
  }

  function verifEmail(){

    $connexion = $_POST['Envoyer'];
      if (isset($connexion) && $connexion == 'Envoyer'){


        $sql = 'SELECT u_id FROM Utilisateurs WHERE u_email = :Email ';
        $resultatE = $this->executerRequete($sql, array( 'Email' => $_POST['Email']));
        return $resultatE;
      }
    }
  }
