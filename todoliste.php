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
		
		
		if (isset($_POST['submit'])) {
			if (empty($_POST['task'])) {
				$errors = "You must fill in the task";
			}else{
				$task = $_POST['task'];
				$objet = $listeManager->postList($task);
			}
		}
		
		
		
		if (isset($_GET['del_task'])) {
		$id = $_GET['del_task'];
		$delet = $listeManager->deleteListe($id);
		}
		
	?>

	<div class="heading">
		<h2 style="font-style: 'Hervetica';">ToDo List </h2>
	</div>
	<form method="post" action="todoliste.php" class="input_form" id ='ajt'>
		<input type="text" name="task" class="task_input">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
	</form>
	<table>
	<thead>
		<tr>
			<th>Tasks</th>
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>
  <tbody>
		<?php 
		
			$objet = $listeManager->getListe();
		
			foreach($objet as $row) {
			?>
				<tr>
					<td class="task"> <?php echo $row['titre'] ?> </td>
					<td class="delete"> 
						<a href="todoliste.php?del_task= <?php echo $row['id_liste'] ; ?>">x</a>
						<a href="afficheSousListe.php?print_task= <?php echo $row['id_liste'] ; ?>">></a>
						<a href="ajoutListes.php?ajout_task= <?php echo $row['id_liste'] ; ?>" >+</a>

					</td>
				</tr>
			<?php 
			}	
			?>	
	</tbody> 
	</table>
</body>
</html>