<?php
<<<<<<< HEAD
require 'Modèles/modele.php';
=======

require 'Modèles/modele.php';

>>>>>>> 54c8767eb30dc08990464c6e04765825a19a6b34
try {
  $utilisateurs = getUtilisateurs();
  require 'Vues/vueFormulaire.php';
}
catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'Vues/vueErreur.php';
}
<<<<<<< HEAD
=======

>>>>>>> 54c8767eb30dc08990464c6e04765825a19a6b34
?>
