<?php
  try {
    require 'Controleurs/controleurConnexion.php';
    $ctr = new connexion();
    $ctr->connexionUtilisateurs();
  }

  catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
  }
?>
