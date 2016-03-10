<?php

require 'Modèles/modele.php';

try {
  $utilisateurs = getUtilisateurs();
  require 'Vues/vueFormulaire.php';
}
catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'Vues/vueErreur.php';
}

?>
