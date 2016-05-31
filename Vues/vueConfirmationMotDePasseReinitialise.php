<?php $this->titre = "Confirmation - Mot de Passe"; ?>

<body>
    <div class="mdpConfirmVueMdpReini">
      <h3>Votre Mot de Passe a bien été réinitialisé.</h3>
      <p>
        Vous pouvez à présent vous connecter.
      </p>
      <p>
        Vous allez être redirigé vers l'accueil.
      </p>
    </div>
  </body>
<?php header('refresh:3;url=index.php?') ?>
