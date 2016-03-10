<?php

$teamhub = new mysqli('localhost', 'root', 'TeamHub');
$reponse = $teamhub->query('SELECT * FROM 'Utilisateurs'');

    echo $reponse['u_pseudo'] . '<br>';
    echo $reponse['u_id'] . '<br>';
    echo $reponse['u_prenom'] . '<br>';
    echo $reponse['u_nom'] . '<br>';
    echo $reponse['u_portable'] . '<br>';
    echo $reponse['u_email'] . '<br>';

 ?>
