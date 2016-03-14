<?php

try {
  require 'Controleurs/controleurConnexion.php';
}
catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'Vues/vueErreur.php';
}

?>
