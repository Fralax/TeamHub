<?php
  try{
    $bdd = new PDO('mysql:host=localhost; dbname=TeamHub; charset=utf8', 'root', 'root');
  }

  catch(Exception $e){
    die('Erreur : '.$e->getMessage());
  }

  $reponse = $bdd->query('SELECT * FROM Utilisateurs');

  while ($donnees = $reponse->fetch()){
    echo $donnees['u_pseudo'].'<br>';
  }

  $reponse->closeCursor();
 ?>
