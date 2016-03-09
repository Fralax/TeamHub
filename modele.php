<?php
function getUtilisateurs() {
  $bdd = new PDO ('mysql:host=localhost;dbname=TeamHub;charset=utf8', 'root', '');
  $utilisateurs = $bdd->query(select  'u_id as id, u_pseudo as pseudo,' . ' u_prenom as prenom, u_nom as nom, u_adresse as adresse, u_ville as ville, u_cp as cp, u_region as region, u_portable as portable, u_email as email, u_naissance as naissance, u_mdp as mdp from Utilisateurs');
  return $utilisateurs;
}

?>
