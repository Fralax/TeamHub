<p> Les inscrits sont :</p>

<?php foreach ($utilisateurs as $utilisateurs) :?>
<p> <?= $utilisateurs['u_pseudo'] ?> </p>
<?php endforeach; ?>


<p> Voici leur adresse mail respectives :</p>
<?php foreach ($utilisateurs as $utilisateurs) :?>
<p> <?= $utilisateurs['u_email'] ?> </p>
<?php endforeach; ?>
