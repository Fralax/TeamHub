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

    $sql4 = 'SELECT g_nbrEvenements FROM Appartient WHERE g_nom = ?';
    $ajouterNombreEvenementsAppartient = $this->executerRequete($sql4, array($groupe));

    $nbrEvenementsAppartient = $ajouterNombreEvenementsAppartient->fetch();
    settype($nbrEvenementsAppartient[0], "integer");
    $nbrEvenementsAppartient[0] = $nbrEvenementsAppartient[0] + 1;

    $sql5 = 'UPDATE Appartient SET g_nbrEvenements = ? WHERE g_nom = ?';
    $ajouterEvenements = $this->executerRequete($sql5, array($nbrEvenementsAppartient[0], $groupe));

    $sql6 = 'INSERT INTO Participe(e_nom, u_pseudo, e_createur)
             VALUES(:nom, :pseudo, :createur)';
    $ajouterCreateurParticipe = $this->executerRequete($sql6, array('nom'=>$_POST['nomEvenement'], 'pseudo'=>$_SESSION['pseudo'], 'createur'=> "createur"));

  }

  public function supprimerEvenements($nomevenement){
    $sql = 'DELETE FROM Evenements WHERE e_nom = :nomEvenement';
    $quitterEvenements = $this->executerRequete ($sql, array('nomEvenement'=>$nomevenement));
  }

  public function afficherEvenements($groupe){
    $sql = 'SELECT e_nom, e_date, e_heure, e_createur, c_nom  FROM Evenements WHERE g_nom = ?';
    $afficherCaracteristiquesGroupe = $this->executerRequete ($sql, array($groupe));
    return $afficherCaracteristiquesGroupe;
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

  public function listeEvenementUtilisateur(){
    $sql = 'SELECT e_nom FROM Participe WHERE u_pseudo = ?';
    $listeEvenementUtilisateur  =$this->executerRequete ($sql, array($_SESSION['pseudo']));
    return $listeEvenementUtilisateur;
  }
}
?>
