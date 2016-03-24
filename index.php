<?php
  try {
    require 'Controleurs/controleurInscription.php';
    $ctr = new inscription();
    $ctr->verif();
  }

  catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
  }
?>
