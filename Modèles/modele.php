<?php

function getBdd() {
  $bdd = new PDO('mysql:host=localhost; dbname=TeamHub; charset=utf8', 'root', 'root');
  return $bdd;
}

function getUtilisateurs(){
  try{
    $bdd = getBdd();
  }

  catch(Exception $e){
    die('Erreur : '.$e->getMessage());
  }
  $utilisateurs = $bdd->query('SELECT * FROM Utilisateurs');
  return $utilisateurs;
}

?>
