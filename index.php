<?php

try {
  require 'Controleurs/controleurInscription.php';
}
catch (Exception $e) {
  $msgErreur = $e->getMessage();
  require 'Vues/vueErreur.php';
}

?>

<?php $util = new utilisateurs(); ?>
<?php $util->ajoutUtilisateurBdd() ?>
