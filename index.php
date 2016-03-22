<?php

try {
  require 'Controleurs/controleurInscription.php';
}
catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'Vues/vueErreur.php';
}

?>
