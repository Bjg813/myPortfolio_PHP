<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Brennan Grout | Entry</title>
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
			<h2>Entry</h2>
		</a>
	<nav>
		<ul>
			<li><a href="index.php">Portfolio</a></li>
			<li><a href="blog.php">Blog</a></li>
			<li><a href="entry.php" class="selected">Entry</a></li>
		</ul>
	</nav>
	</header>
		
	<form action="insert.php" method="post">
		Day <input type="text" name="day">
		<br>
		Title <input type="text" name="title">
		<br>
		Content <input type="text" name="content">
		<br>
		<input type="submit" value="Submit">
	</form>

	<form action="uploadscript.php" method="post" enctype="multipart/form-data">
		<input type="file" name="image" accept="image/*">
		<input type="submit">
	</form>


		<footer>
			<a href="https://twitter.com/BrennanJava"><img src="img/twitter-wrap.png" alt="Twitter Logo" class="social-icon"></a>
			<a href="https://www.facebook.com/brennan.grout.1"><img src="img/facebook-wrap.png" alt="Facebook Logo" class="social-icon"></a>
			<p>&copy; <?php echo date('Y'); ?> Brennan Grout.</p>
			<?php echo "last modified: " . date ("F d Y H:i:s.", getlastmod()); ?>
		</footer>
	</div>
</body>
</html>
