<?php
header ("HTTP/2.0");
header ('Content-Type:application/json');

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$database = "portfolio";

	$connection = mysqli_connect($servername, $username, $password, $database);

$query = "select * from blog";
$result = mysqli_query($connection, $query);

$postList = [];

while ($row = mysqli_fetch_assoc($result)) {
	$post["id"] = $row["id"];
	$post["author"] = $row["author"];
	$post["title"] = $row["title"];

	$postList[] = $post;
}

$jsonData = json_encode($postList);

echo $jsonData;


?>