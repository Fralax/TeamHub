<?php foreach ($utilisateurs as $utilisateurs) : ?>

  <p> Les inscrits sont :</p>

  <?php
    $utilisateurs['u_pseudo']
  ?>

  <p> Voici leur adresse mail respectives :</p>

  <?php
    $utilisateurs['u_email']
  ?>

  <?php endforeach; ?>

<p>
