<?php

require '/TeamHub/Vues/vueInscription.php'

function verifMdp(){

  $MotDePasse=$_POST['MotDePasse'];
  $confirmMotDePasse = $_POST['ConfirmMotDePasse'];

  if ($MotDePasse != $confirmMotDePasse){
    echo "Les mots de passe saisis sont différents";
  }
}

?>
