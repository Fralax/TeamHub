<?php

require 'Modeles/modeleConnexion.php';

try {
  require 'Vues/vueAccueilVisiteurs.php';
  connexionUtilisateurs();
}
catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'Vues/vueErreur.php';
}
?>
