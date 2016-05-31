<?php $this->titre = "Administration - Groupe"; ?>

	<body>

		<div class="adminGroupeAModifier">
			<?php
				require_once 'Controleurs/controleurAdministration.php';
				$admin = new controleurAdministration();
				$verifAdmin = $admin->verifAdmin();
					if($verifAdmin == true){
						$a=0;
					} else{
						$a=1;
					}
			?>

			<?php if($a == 0){ ?>
				<h2>Modifier l'admin d'un groupe</h2>
		    <table>
				<?php foreach ($listeGroupes as list($nomgroupes)){ ?>
		      <tr>
					  <td> <?php echo $nomgroupes?> </td>
						<td> <a href="index.php?page=affichagemodificationadmin&nom=<?php echo $nomgroupes?>" >  <input type="button" name="Modifier" value ="Modifier l'admin"> </a></td>
		      </tr>
				<?php } ?>
		    </table>
			<?php } ?>

			<?php if($a == 1){ ?>
				Vous n'avez pas accès à cette page.
			<?php } ?>
		</div>

  </body>
</html>
