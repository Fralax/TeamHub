<?php

require_once "Modeles/modele.php";

class evenements extends modele {

  public function ajouterEvenementsBdd($groupe){
    $date = "{$_POST['annee']}-{$_POST['mois']}-{$_POST['jour']}";
    $heure = "{$_POST['heure']}:{$_POST['minute']}:00";
    $sql = 'INSERT INTO teamhubp_teamhub.Evenements(e_nom, e_date, e_heure, e_createur, g_nom, c_nom, e_placesTotal, e_placesLibres)
            VALUES (:nomEvenement, :dateActivite, :heureActivite, :createur ,:nomGroupe, :nomClub, :nbrPlacesTotal, :nbrPlacesLibres)';
    $ajouterEvenementsBdd = $this->executerRequete ($sql, array(
      'nomEvenement'=>$_POST['nomEvenement'],
      'dateActivite'=>$date ,
      'heureActivite'=> $heure,
      'createur'=> $_SESSION['pseudo'],
      'nomGroupe'=> $groupe,
      'nomClub'=> $_POST['club'],
      'nbrPlacesTotal' => $_POST['nbrPlaces'],
      'nbrPlacesLibres' => $_POST['nbrPlaces']
    ));

    $sql2 = 'SELECT g_nbrEvenements FROM teamhubp_teamhub.Groupes WHERE g_nom = ?';
    $ajouterNombreEvenements = $this->executerRequete($sql2, array($groupe));

    $nbrEvenements = $ajouterNombreEvenements->fetch();
    settype($nbrEvenements[0], "integer");
    $nbrEvenements[0] = $nbrEvenements[0] + 1;

    $sql3 = 'UPDATE teamhubp_teamhub.Groupes SET g_nbrEvenements = ? WHERE g_nom = ?';
    $ajouterEvenements = $this->executerRequete($sql3, array($nbrEvenements[0], $groupe));

    $sql6 = 'INSERT INTO teamhubp_teamhub. Participe(e_nom, u_pseudo, e_createur)
             VALUES(:nom, :pseudo, :createur)';
    $ajouterCreateurParticipe = $this->executerRequete($sql6, array('nom'=>$_POST['nomEvenement'], 'pseudo'=>$_SESSION['pseudo'], 'createur'=> "createur"));

  }

  public function verifEvenement($nom){
    if (isset($_POST['Créer']) && $_POST['Créer'] == 'Créer'){
      $sql = 'SELECT e_nom FROM teamhubp_teamhub.Evenements WHERE g_nom = :nomGroupe AND e_nom = :nomEvenement ';
      $resultatEvenement = $this->executerRequete($sql, array('nomGroupe' => $nom, 'nomEvenement' => $_POST['nomEvenement']));
      return $resultatEvenement;
    }
  }

  public function supprimerEvenement($nomevenement){
    $sql0 = 'SELECT g_nom FROM teamhubp_teamhub.Evenements WHERE e_nom = ?';
    $recupGroupe = $this->executerRequete($sql0, array($nomevenement));
    $groupe = $recupGroupe->fetch();

    $sql = 'DELETE FROM teamhubp_teamhub.Evenements WHERE e_nom = :nomEvenement';
    $quitterEvenements = $this->executerRequete ($sql, array('nomEvenement'=>$nomevenement));

    $sql1 = 'DELETE FROM teamhubp_teamhub.Participe WHERE e_nom = :nomEvenement';
    $quitterParticipe = $this->executerRequete ($sql1, array('nomEvenement'=>$nomevenement));

    $sql2 = 'SELECT g_nbrEvenements FROM teamhubp_teamhub.Groupes WHERE g_nom = ?';
    $diminuerNombreEvenements = $this->executerRequete($sql2, array($groupe[0]));

    $nbrEvenements = $diminuerNombreEvenements->fetch();
    settype($nbrEvenements[0], "integer");
    $nbrEvenements[0] = $nbrEvenements[0] - 1;

    $sql3 = 'UPDATE teamhubp_teamhub.Groupes SET g_nbrEvenements = ? WHERE g_nom = ?';
    $ajouterEvenements = $this->executerRequete($sql3, array($nbrEvenements[0], $groupe[0]));
  }

  public function dateEvenement($nomevenement){
    $sql = 'SELECT e_date FROM teamhubp_teamhub.Evenements WHERE e_nom = ?';
    $dateEvenement = $this->executerRequete($sql, array($nomevenement));
    return $dateEvenement;
  }

  public function heureEvenement($nomevenement){
    $sql = 'SELECT e_heure FROM teamhubp_teamhub.Evenements WHERE e_nom = ?';
    $heureEvenement = $this->executerRequete($sql, array($nomevenement));
    return $heureEvenement;
  }

  public function adhererEvenements($nomevenement){
    $sql = 'INSERT INTO teamhubp_teamhub.Participe(u_pseudo, e_nom, e_createur)
            VALUES (:pseudo, :nomEvenement, :createur)';
    $adhererEvenements = $this->executerRequete ($sql, array('pseudo'=>$_SESSION['pseudo'], 'nomEvenement'=>$nomevenement, 'createur'=>"nonCreateur"));
  }

  public function quitterEvenements($nomevenement){
    $sql = 'DELETE FROM teamhubp_teamhub.Participe WHERE e_nom = :nomEvenement AND u_pseudo = :participant';
    $quitterEvenements = $this->executerRequete ($sql, array('nomEvenement'=>$nomevenement, 'participant'=>$_SESSION['pseudo']));
  }

  public function listerEvenementsUtilisateur($groupe){
    $sql = 'SELECT e_nom, e_createur, e_date, e_heure, c_nom, e_placesTotal, e_placesLibres FROM teamhubp_teamhub.Evenements WHERE e_nom IN (SELECT e_nom FROM teamhubp_teamhub.Participe WHERE u_pseudo = ?) AND g_nom = ?';
    $listerMembresEvenement = $this->executerRequete($sql, array($_SESSION['pseudo'], $groupe));
    return $listerMembresEvenement;
  }

  public function listerEvenementsGroupe($groupe){
    $sql = 'SELECT e_nom, e_createur, e_date, e_heure, c_nom, e_placesTotal, e_placesLibres FROM teamhubp_teamhub.Evenements WHERE e_nom NOT IN (SELECT e_nom FROM teamhubp_teamhub.Participe WHERE u_pseudo = ?) AND g_nom = ?';
    $listerEvenementsGroupes = $this->executerRequete($sql, array($_SESSION['pseudo'], $groupe));
    return $listerEvenementsGroupes;
  }

  public function listerEvenements(){
    $sql = 'SELECT e_nom FROM teamhubp_teamhub.Evenements';
    $listerEvenements = $this->executerRequete($sql);
    return $listerEvenements;
  }

  public function listerEvenementsAccueil(){
    $sql = 'SELECT e_nom, e_createur, e_date, e_heure, c_nom FROM teamhubp_teamhub.Evenements WHERE e_nom IN (SELECT e_nom FROM teamhubp_teamhub.Participe WHERE u_pseudo = ?)';
    $listerEvenementsAccueil = $this->executerRequete($sql, array($_SESSION['pseudo']));
    return $listerEvenementsAccueil;
  }

  public function diminuerPlacesLibresEvenement($nom){
    $sql1='SELECT e_placesLibres FROM teamhubp_teamhub.Evenements WHERE e_nom = :nom';
    $recupPlacesLibres = $this->executerRequete ($sql1, array('nom'=>$nom ));

    $placesLibres = $recupPlacesLibres->fetch();
    settype($placesLibres[0], "integer");
    $placesLibres[0] = $placesLibres[0] - 1;

    $sql2='UPDATE teamhubp_teamhub.Evenements SET e_placesLibres = :placesLibres WHERE e_nom = :nom';
    $diminuerPlacesLibres = $this->executerRequete ($sql2, array('placesLibres'=>$placesLibres[0], 'nom'=>$nom ));
  }

  public function augmenterPlacesLibresEvenement($nom){
    $sql1='SELECT e_placesLibres FROM teamhubp_teamhub.Evenements WHERE e_nom = :nom';
    $recupPlacesLibres = $this->executerRequete ($sql1, array('nom'=>$nom ));

    $placesLibres = $recupPlacesLibres->fetch();
    settype($placesLibres[0], "integer");
    $placesLibres[0] = $placesLibres[0] + 1;

    $sql2='UPDATE teamhubp_teamhub.Evenements SET e_placesLibres = :placesLibres WHERE g_nom = :nom';
    $diminuerPlacesLibres = $this->executerRequete ($sql2, array('placesLibres'=>$placesLibres[0], 'nom'=>$nom ));
  }

}
?>
