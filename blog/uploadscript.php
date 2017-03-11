<?php 

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$database = "portfolio";

	$connection = mysqli_connect($servername, $username, $password, $database);


$fileName = basename($_FILES["image"]["name"]);
$uploadLocation = "uploads/" . $fileName;
move_uploaded_file($_FILES["image"]["tmp_name"], $uploadLocation);

$query = "INSERT INTO blog (title, content, day, link) VALUES ('', '', '', '" . $fileName . "')"; 

echo $query . "<br>";

$result = mysqli_query($connection, $query);
		$connection->close();
		// header('Location: entry.php');

?> 


<?php

include_once 'dblogin.php';
$query = "select * from blog where link='" . $fileName . "'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

print_r($row);

	echo '<img src="uploads/'. $row['link'] .'">'

?>