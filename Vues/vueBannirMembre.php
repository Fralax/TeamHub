<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>bannir un membre </title>
	</head>
	<body>

		<h2>bannir un membre</h2>

    <form action="" method="post">
      <select name="banni">
        <?php foreach ($abannir as list($nombanni)) { ?>
        <option value = "<?php echo $nombanni?>" > <?php echo $nombanni?> </option>
        <?php } ?>
      </select>
      <input type="submit" name="bannir" value="Bannir" >
    </form>


  </body>
</html>
