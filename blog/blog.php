<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Brennan Grout | Blog</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link href="https://fonts.googleapis.com/css?family=Changa+One|Open+Sans" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<header>
		<a href="http://brennangrout.com/" id="logo">
			<h1>Brennan Grout</h1>
			<h2>Blog</h2>
		</a>
	<nav>
		<ul>
			<li><a href="index.php">Portfolio</a></li>
			<li><a href="blog.php" class="selected">Blog</a></li>
			<li><a href="entry.php">Entry</a></li>
		</ul>
	</nav>
	</header>
	<div id="wrapper">
		<section>
			<ul id="reel">
				<li>
					<a href="http://brennangrout.com/">
						<img src="img/greyman.jpg" alt="">
					</a>
				</li>
			</ul>
		</section>
	</div>

<?php
include_once "dblogin.php";
$query = "select * from blog";
$result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($result)) {
	echo '<div class="blog">';
	echo '<div class="date">';
	echo '<p class="detail">' . $row["day"] . '</p>';
	echo '</div>';
	echo '<div class="blog-text">';
	echo '<a href="posts.php?id=' . $row["id"] . '"><h3>' . $row["title"] . '</h3></a>';
	echo '<p>' . $row["content"] . '</p>';
	echo '</div>';
	echo '</div>';
}
?>

		<footer>
			<a href="https://twitter.com/BrennanJava"><img src="img/twitter-wrap.png" alt="Twitter Logo" class="social-icon"></a>
			<a href="https://www.facebook.com/brennan.grout.1"><img src="img/facebook-wrap.png" alt="Facebook Logo" class="social-icon"></a>
			<p>&copy; <?php echo date('Y'); ?> Brennan Grout.</p>
			<?php echo "last modified: " . date ("F d Y H:i:s.", getlastmod()); ?>
		</footer>
	</div>
</body>
</html>
