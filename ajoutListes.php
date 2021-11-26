<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>ToDo List</title>
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
				$id = $_POST['id_task'];
				$objet = $listeManager->postSList($task,$id);
				header('location: todoliste.php');
			}
		}
		
	?>

	<div class="heading">
		<h2 style="font-style: 'Hervetica';">ToDo List </h2>
	</div>
	<form method="post" action="ajoutListes.php" class="input_form">
		<input type='hidden' name ="id_task" class ="task_input" value= "<?php echo $_GET['ajout_task']?>";>
		<input type="text" name="task" class="task_input">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
	</form>
</body>
</html>