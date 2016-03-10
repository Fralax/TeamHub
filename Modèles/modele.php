<?php
<<<<<<< HEAD
=======

>>>>>>> 54c8767eb30dc08990464c6e04765825a19a6b34
function getBdd() {
  $bdd = new PDO('mysql:host=localhost; dbname=TeamHub;charset=utf8', 'root', 'root');
  return $bdd;
}
<<<<<<< HEAD
=======

>>>>>>> 54c8767eb30dc08990464c6e04765825a19a6b34
function getUtilisateurs(){
  try{
    $bdd = getBdd();
  }
<<<<<<< HEAD
  catch(Exception $e){
    die('Erreur : '.$e->getMessage());
  }
  $utilisateurs = $bdd->query('SELECT * FROM Utilisateurs');
  return $utilisateurs;
}
=======

  catch(Exception $e){
    die('Erreur : '.$e->getMessage());
  }

  $utilisateurs = $bdd->query('SELECT * FROM Utilisateurs');

  return $utilisateurs;

}

?>
>>>>>>> 54c8767eb30dc08990464c6e04765825a19a6b34
