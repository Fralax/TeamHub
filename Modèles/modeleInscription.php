<?php

function getBdd() {
  $bdd = new PDO('mysql:host=localhost; dbname=TeamHub; charset=utf8', 'root', 'root');
  return $bdd;
}

function ajoutBdd(){
  $pass_hache = sha1($_POST['pass']);
  $bdd = getBdd();
  $bdd->exec('INSERT INTO Utilisateurs()
}

?>
