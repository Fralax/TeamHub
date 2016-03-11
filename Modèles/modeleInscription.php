<?php
function ajoutBdd(){
  $pass_hache = sha1($_POST['pass']);
  $bdd = getBdd();
  $bdd->exec('INSERT INTO Utilisateurs()
}

?>
