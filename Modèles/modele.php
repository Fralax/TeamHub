<?php

function getBdd() {
  $bdd = new PDO('mysql:host=localhost; dbname=TeamHub; charset=utf8', 'root', 'root');
  return $bdd;
}

?>
