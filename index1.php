<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$databasename = "todoapp";

	//Establish connection with the database
	$conn = new mysqli($servername, $username, $password, $databasename);
	if($conn->connect_error){
		die("Error: Unable to connect to MySQL. " . $conn->connect_error);}

	//Add task to database
	if(isset($_POST['submit'])){
		$task_input = $_POST['task_input'];
		$sql = "INSERT INTO tasks (task) VALUES ('$task_input')";
		if($conn->query($sql) === TRUE){
			echo "Task added successfully";}
		else{
			echo "Error: Unable to add task. " . $sql . "<br>" . $conn->error;}
		header('location: index1.php');}

	//Display tasks on webpage
	$app_tasks = mysqli_query($conn, "SELECT * FROM tasks");

	//Delete task from database
	if(isset($_REQUEST['delete_task'])){
		$delete = $_REQUEST['delete_task'];
		$sql = "DELETE FROM tasks WHERE id = $delete";
		if($conn->query($sql) === TRUE){
			echo "Task deleted successfully";}
		else{
			echo "Error: Unable to delete task. " . $sql . "<br>" . $conn->error;}
		header('location: index1.php');}

	$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>TODO List</title>
</head>
<body>
	<h1>TODO List</h1>

	<form action="index1.php" method="post">
		<input type="text" name="task_input"><br>
		<button type="submit" name="submit">Add Task</button>
	</form>

	<table>
		<thead>
			<tr>
				<th>Task</th>
				<th>Delete</th>
			</tr>
		</thead>

		<tbody>
		<?php while($row = mysqli_fetch_array($app_tasks)) { ?>
			<tr>
				<td><?php echo $row['task']; ?></td>
				<td>
					<a href="index1.php?delete_task=<?php echo $row['id']; ?>">Delete</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</body>
</html>