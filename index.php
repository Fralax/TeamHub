<?php



try {
  require 'Contrôleurs/controleurInscription.php';
}
catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'Vues/vueErreur.php';
}

?>
