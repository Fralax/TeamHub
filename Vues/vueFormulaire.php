<?php ob_start(); ?>

<?php foreach ($utilisateurs as $utilisateurs) : ?>

<p> Les inscrits sont :</p>
<p> <?php $utilisateur['u_pseudo'] ?> </p>
<p> Voici leur adresse mail respectives :</p>
<p> <?php $utilisateur['u_email'] ?> </p>

<?php endforeach; ?>

<?php $contenu = ob_get_clean(); ?>
