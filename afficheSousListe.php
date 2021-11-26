<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>ToDo List </title>
</head>
<body>
	<?php 
		spl_autoload_register(function ($class_name) {
				include $class_name . '.class.php';
			});

		$liste  = new liste();
		$listeManager = new ListeManager();
		
		
		if (isset($_GET['del_task'])) {
		$id = $_GET['del_task'];
		$delet = $listeManager->deleteListe($id);
		}
		
	?>

	<div class="heading">
		<h2 style="font-style: 'Hervetica';">ToDo List </h2>
	</div>
	<table>
	<thead>
		<tr>
			<th>Tasks</th>
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>
  <tbody>
		<?php 
			$id = $_GET['print_task'];
			$objet = $listeManager->getSListe($id);
		
			foreach($objet as $row) {
			?>
				<tr>
					<td class="task"> <?php echo $row['titre'] ?> </td>
					<td class="delete"> 
						<a href="todoliste.php?del_task= <?php echo $row['id_liste'] ; ?>">x</a>
						<a href="afficheSousListe.php?print_task= <?php echo $row['id_liste'] ; ?>">></a>
						<a href="ajoutListes.php?ajout_task= <?php echo $row['id_liste'] ; ?>">+</a>

					</td>
				</tr>
			<?php 
			}	
			?>	
	</tbody> 
	</table>
</body>
</html>