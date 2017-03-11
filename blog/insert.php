<?php
	

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$database = "portfolio";

		$connection = mysqli_connect($servername, $username, $password, $database);

		$query = "INSERT INTO blog (title, content, day) VALUES ('" . $_POST["title"] . "', '" . $_POST["content"] . "', '" . $_POST["day"] . "')";

		$result = mysqli_query($connection, $query);
		$connection->close();
		header('Location: blog.php');
?>


