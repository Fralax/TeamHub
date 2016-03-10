<?php

require 'Modèles/modele.php';


try {
  require 'Vues/vueAccueilVisiteurs.php';
}
catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'Vues/vueErreur.php';
}

?>
