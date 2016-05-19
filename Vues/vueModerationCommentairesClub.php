<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="Contenu/vueClub.css" />
		<title>Liste des Clubs </title>
	</head>
	<body>
    <table>
      <th>
        <h3>Les commentaires de <?php echo $caractClub['c_nom']?> </h3>
        ___________________
      </th>
      <?php foreach ($NoteClub as list($id, $pseudo, $note, $commentaire, $date)){?>
        <tr>
          <td class="infosCommentaire"> <b><?php echo $pseudo?></b>, le <?php echo $date ?> : <a href="#" onclick="if (confirm('Voulez vous vraiment supprimer ce commentaire ?')) window.location='index.php?page=suppressioncommentaire&id=<?php echo $id ?>'; return false"> <input type ="button" value="Supprimer"> </a> </td>
        </tr>
        <tr>
          <td>
            <?php echo $commentaire?>
          </td>
        </tr>
        <tr>
          <td>
            <?php for ($i=0; $i < $note; $i++) { ?>
              <img src="Autres/etoile.png" height="15px" width="15px" />
            <?php } ?>
          </td>
        </tr>
        <tr>
          <td>
            ___________________
          </td>
        </tr>
  <?php } ?>
</table>
