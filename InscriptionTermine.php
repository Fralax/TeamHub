<!DOCTYPE html>
<html>
    <head>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title> Inscription Terminée - TeamHub </title>
    </head>
    <body>
    	<p>
        <a href="AccueilVisiteurs.php"><img src="Logo.png" 	width="306" height="172" alt=""></a>

<p> Bienvenue  <?php $Prenom=$_POST['Prenom'] ;
echo $Prenom; ?> !</p>
<p> Votre adresse mail : <?php $Email=$_POST['Email'] ;
echo $Email; ?>

	<p> Terminez de complèter votre profil :</p>
    <p> Ajouter une photo de Profil : <input type="file" name="Photo"/>
    <a href="" > <input type="button" name="Upload" value="Upload"/> </a> </p>
    <p> Ajoutez les <a href="" > <input type="button" name="Sports" value="Sports"/> </a> que vous pratiquez </p>
    </body>
</html>
