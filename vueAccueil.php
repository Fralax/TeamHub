<?php $titre = 'TeamHub'; ?>

<?php ob_start(); ?>
<?php foreach ($utilisateurs as $utilisateurs): ?>
  <header>
    <h1> <?= $utilisateurs['titre'] ?></h1>
  </header>

<?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>
