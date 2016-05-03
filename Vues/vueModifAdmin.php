<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Modifier l'administrateur</title>
	</head>
	<body>

		<h2>Modifier l'administrateur</h2>

    <form action="" method="post">
      <select name="Admin">
        <option value = "<?php echo $_SESSION['pseudo'] ?>"> <?php echo $_SESSION['pseudo'] ?> </option>
        <?php foreach ($admin as list($nomAdmin)) { ?>
        <option value = "<?php echo $nomAdmin?>" > <?php echo $nomAdmin?> </option>
        <?php } ?>
      </select>
      <input type="submit" name="Modifier" value="Modifier" >
    </form>


  </body>
</html>
