<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Banir un membre </title>
	</head>
	<body>

		<h2>Banir un membre</h2>

    <form action="" method="post">
      <select name="Bani">
        <?php foreach ($abanir as list($nomBani)) { ?>
        <option value = "<?php echo $nomBani?>" > <?php echo $nomBani?> </option>
        <?php } ?>
      </select>
      <input type="submit" name="Banir" value="Banir" >
    </form>


  </body>
</html>
