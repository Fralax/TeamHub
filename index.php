<?php

require 'modele.php';

try {
  $utilisateurs = getUtilisateurs();
  require 'vueFormulaire.php';
}
catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'vueErreur.php';
}
