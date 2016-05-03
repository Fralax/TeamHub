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
    $afficherEvenements = $this->executerRequete ($sql, array($groupe));
    return $afficherEvenements;
  }


}
?>
