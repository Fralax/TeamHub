<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <title><?= $titre ?></title>
  </head>
  <body>
    <div id="global">
      <header>
        <a href="index.php"><h1 id="titre">TeamHub</h1></a>
        <p>Coucou tout le monde !.</p>
      </header>
      <div id="contenu">
        <?= $contenu ?>
      </div>
      <footer id="piedBlog">
        Site réalisé par Romain Frayssinet.
      </footer>
    </div>
  </body>
</html>
