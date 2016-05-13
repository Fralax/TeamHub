<?php

require_once "Modeles/modele.php";

class evenements extends modele {

  public function ajouterEvenementsBdd($groupe){
    $date = "{$_POST['annee']}-{$_POST['mois']}-{$_POST['jour']}";
    $heure = "{$_POST['heure']}:{$_POST['minute']}:00";
    $sql = 'INSERT INTO Evenements(e_nom, e_date, e_heure, e_createur, g_nom, c_nom)
            VALUES (:nomEvenement, :dateActivite, :heureActivite, :createur ,:nomGroupe, :nomClub)';
    $ajouterEvenementsBdd = $this->executerRequete ($sql, array('nomEvenement'=>$_POST['nomEvenement'] ,'dateActivite'=>$date , 'heureActivite'=> $heure, 'createur'=> $_SESSION['pseudo'], 'nomGroupe'=> $groupe, 'nomClub'=> $_POST['club']));

    $sql2 = 'SELECT g_nbrEvenements FROM Groupes WHERE g_nom = ?';
    $ajouterNombreEvenements = $this->executerRequete($sql2, array($groupe));

    $nbrEvenements = $ajouterNombreEvenements->fetch();
    settype($nbrEvenements[0], "integer");
    $nbrEvenements[0] = $nbrEvenements[0] + 1;

    $sql3 = 'UPDATE Groupes SET g_nbrEvenements = ? WHERE g_nom = ?';
    $ajouterEvenements = $this->executerRequete($sql3, array($nbrEvenements[0], $groupe));

    $sql6 = 'INSERT INTO Participe(e_nom, u_pseudo, e_createur)
             VALUES(:nom, :pseudo, :createur)';
    $ajouterCreateurParticipe = $this->executerRequete($sql6, array('nom'=>$_POST['nomEvenement'], 'pseudo'=>$_SESSION['pseudo'], 'createur'=> "createur"));

  }

  public function verifEvenement($nom){
    if (isset($_POST['Créer']) && $_POST['Créer'] == 'Créer'){
      $sql = 'SELECT e_nom FROM Evenements WHERE g_nom = :nomGroupe AND e_nom = :nomEvenement ';
      $resultatEvenement = $this->executerRequete($sql, array('nomGroupe' => $nom, 'nomEvenement' => $_POST['nomEvenement']));
      return $resultatEvenement;
    }
  }

  public function supprimerEvenement($nomevenement){
    $sql0 = 'SELECT g_nom FROM Evenements WHERE e_nom = ?';
    $recupGroupe = $this->executerRequete($sql0, array($nomevenement));
    $groupe = $recupGroupe->fetch();

    $sql = 'DELETE FROM Evenements WHERE e_nom = :nomEvenement';
    $quitterEvenements = $this->executerRequete ($sql, array('nomEvenement'=>$nomevenement));

    $sql1 = 'DELETE FROM Participe WHERE e_nom = :nomEvenement';
    $quitterParticipe = $this->executerRequete ($sql1, array('nomEvenement'=>$nomevenement));

    $sql2 = 'SELECT g_nbrEvenements FROM Groupes WHERE g_nom = ?';
    $diminuerNombreEvenements = $this->executerRequete($sql2, array($groupe[0]));

    $nbrEvenements = $diminuerNombreEvenements->fetch();
    settype($nbrEvenements[0], "integer");
    $nbrEvenements[0] = $nbrEvenements[0] - 1;

    $sql3 = 'UPDATE Groupes SET g_nbrEvenements = ? WHERE g_nom = ?';
    $ajouterEvenements = $this->executerRequete($sql3, array($nbrEvenements[0], $groupe[0]));
  }

  public function dateEvenement($nomevenement){
    $sql = 'SELECT e_date FROM Evenements WHERE e_nom = ?';
    $dateEvenement = $this->executerRequete($sql, array($nomevenement));
    return $dateEvenement;
  }

  public function heureEvenement($nomevenement){
    $sql = 'SELECT e_heure FROM Evenements WHERE e_nom = ?';
    $heureEvenement = $this->executerRequete($sql, array($nomevenement));
    return $heureEvenement;
  }

  public function adhererEvenements($nomevenement){
    $sql = 'INSERT INTO Participe(u_pseudo, e_nom, e_createur)
            VALUES (:pseudo, :nomEvenement, :createur)';
    $adhererEvenements = $this->executerRequete ($sql, array('pseudo'=>$_SESSION['pseudo'], 'nomEvenement'=>$nomevenement, 'createur'=>"nonCreateur"));
  }

  public function quitterEvenements($nomevenement){
    $sql = 'DELETE FROM Participe WHERE e_nom = :nomEvenement AND u_pseudo = :participant';
    $quitterEvenements = $this->executerRequete ($sql, array('nomEvenement'=>$nomevenement, 'participant'=>$_SESSION['pseudo']));
  }

  public function listerEvenementsUtilisateur($groupe){
    $sql = 'SELECT e_nom, e_createur, e_date, e_heure, c_nom FROM Evenements WHERE e_nom IN (SELECT e_nom FROM Participe WHERE u_pseudo = ?) AND g_nom = ?';
    $listerMembresEvenement = $this->executerRequete($sql, array($_SESSION['pseudo'], $groupe));
    return $listerMembresEvenement;
  }

  public function listerEvenementsGroupe($groupe){
    $sql = 'SELECT e_nom, e_createur, e_date, e_heure, c_nom FROM Evenements WHERE e_nom NOT IN (SELECT e_nom FROM Participe WHERE u_pseudo = ?) AND g_nom = ?';
    $listerEvenementsGroupes = $this->executerRequete($sql, array($_SESSION['pseudo'], $groupe));
    return $listerEvenementsGroupes;
  }

  public function listerEvenements($groupe){
    $sql = 'SELECT e_nom FROM Evenements WHERE g_nom = ?';
    $listerEvenements = $this->executerRequete($sql, array($groupe));
    return $listerEvenements;
  }

  public function listerEvenementsAccueil(){
    $sql = 'SELECT e_nom, e_createur, e_date, e_heure, c_nom FROM Evenements WHERE e_nom IN (SELECT e_nom FROM Participe WHERE u_pseudo = ?)';
    $listerEvenementsAccueil = $this->executerRequete($sql, array($_SESSION['pseudo']));
    return $listerEvenementsAccueil;
  }
}
?>
