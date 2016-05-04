<?php

require_once "Modeles/modele.php";

class evenements extends modele {

  public function ajouterEvenementsBdd($groupe){
    $date = "{$_POST['annee']}-{$_POST['mois']}-{$_POST['jour']}";
    $heure = "{$_POST['heure']}:{$_POST['minute']}:00";
    $sql = 'INSERT INTO Evenements(e_nom, e_date, e_heure, e_createur, g_nom, c_nom)
            VALUES (:nomEvenement ,:dateActivite, :heureActivite, :createur ,:nomGroupe, :nomClub)';
    $ajouterEvenementsBdd = $this->executerRequete ($sql, array('nomEvenement'=>$_POST['nomEvenement'] ,'dateActivite'=>$date , 'heureActivite'=> $heure, 'createur'=> $_SESSION['pseudo'], 'nomGroupe'=> $groupe, 'nomClub'=> $_POST['club']));
  }

  public function afficherEvenements($groupe){
    $sql = 'SELECT e_nom, e_date, e_heure, e_createur, c_nom  FROM Evenements WHERE g_nom = ?';
    $afficherCaracteristiquesGroupe = $this->executerRequete ($sql, array($groupe));
    return $afficherCaracteristiquesGroupe;
  }

  public function adhererEvenements($nomevenement){
    $sql = 'INSERT INTO Participe(u_pseudo, e_nom)
            VALUES (:pseudo, :nomEvenement)';
    $adhererEvenements = $this->executerRequete ($sql, array('pseudo'=>$_SESSION['pseudo'], 'nomEvenement'=>$nomevenement));
  }

  public function listeEvenementUtilisateur(){
    $sql = 'SELECT e_nom FROM Participe WHERE u_pseudo = ?';
    $listeEvenementUtilisateur  =$this->executerRequete ($sql, array($_SESSION['pseudo']));
    return $listeEvenementUtilisateur;
  }

}
?>
