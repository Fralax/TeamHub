<!DOCTYPE html>
<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueResultatsRecherche.css" />
		<title>Recherche</title>
	</head>

	<body>
		<div class="conteneur">
      <p> Rechercher un  :
      <input type="radio" name="Recherche" value = "Groupe" /> <label for="Groupe">Groupe</label>
      <input type="radio" name="Recherche" value = "Membre" /> <label for="Utilisateur">Utilisateur</label>
      <input type="radio" name="Recherche" value = "Club" /> <label for="Club">Club</label></p>

      <p> Recherche un Groupe </p>
        <form  class="formulaireRechercheGroupe" name = "formulaireRechercheGroupe" method="post" action = "">
          <p> Nom du Groupe : <input type="text" name="nomGroupe" placeholder="Nom du Groupe" size="25" /> </p>
          <p> Département : <input type="text" name="departementGroupe" placeholder="Département" size="25" /> </p>
          <p> Administrateur : <input type="text" name="administrateur" placeholder="Administrateur" size="25" /> </p>
          <p> Sport : <input type="text" name="sport" placeholder="Sport" size="25" /> </p>
          <p> <input name="Rechercher1" type="submit" value="Rechercher"> </p>
        </form>

      <p> Recherche un Membre </p>
        <form  class="formulaireRechercheMembre" name = "formulaireRechercheMembre" method="post" action = "">
          <p> Nom du Membre : <input type="text" name="nomMembre" placeholder="Nom du Membre" size="25" /> </p>
          <p> Sa localisation : <input type="text" name="localisationMembre" placeholder="Localisation du Membre" size="25" /> </p>
          <p> <input name="Rechercher2" type="submit" value="Rechercher"> </p>
        </form>

      <p> Recherche un Club </p>
        <form  class="formulaireRechercheClub" name = "formulaireRechercheClub" method="post" action = "">
          <p> Nom du Club : <input type="text" name="nomClub" placeholder="Nom du Club" size="25" /> </p>
          <p> Département : <input type="text" name="departementClub" placeholder="Département du Club" size="25" /> </p>
          <p> <input name="Rechercher3" type="submit" value="Rechercher"> </p>
        </form>
		</div>
  </body>
</html>
