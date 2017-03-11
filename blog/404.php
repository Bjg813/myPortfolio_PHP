<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Brennan Grout | Homepage</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link href="https://fonts.googleapis.com/css?family=Changa+One|Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<header>
		<a href="http://brennangrout.com/" id="logo">
			<h1>Brennan Grout</h1>
			<h2>Portfolio</h2>
		</a>
	<nav>
		<ul>
			<li><a href="index.php" class="selected">Portfolio</a></li>
			<li><a href="blog.php">Blog</a></li>
			<li><a href="entry.php">Entry</a></li>
		</ul>
	</nav>
	</header>
	<div id="wrapper">
		<section>
			<ul id="gallery">
				<li>
					<a href="img/flyreel.jpg">
						<img src="img/brennan.jpg" alt="">
						<p>Blog</p>
					</a>
				</li>
				<li>
					<a href="http://fishinginsacramento.com/">
						<img src="img/flyreel.jpg" alt="">
						<p>Fishing Website</p>
					</a>
				</li>
				<li>
					<a href="img/numbers-06.jpg">
						<img src="img/numbers-06.jpg" alt="">
						<p>Trying to create an 80's style of glow.</p>
					</a>
				</li>
				<li>
					<a href="img/numbers-09.jpg">
						<img src="img/numbers-09.jpg" alt="">
						<p>Drips created using photosop brushes.</p>
					</a>
				</li>
				<li>
					<a href="img/numbers-12.jpg">
						<img src="img/numbers-12.jpg" alt="">
						<p>Creating shapes using repetition.</p>
					</a>
				</li>
			</ul>
		</section>
		<footer>
			<a href="https://twitter.com/BrennanJava"><img src="img/twitter-wrap.png" alt="Twitter Logo" class="social-icon"></a>
			<a href="https://www.facebook.com/brennan.grout.1"><img src="img/facebook-wrap.png" alt="Facebook Logo" class="social-icon"></a>
			<p>&copy; <?php echo date('Y'); ?> Brennan Grout.</p>
			<?php echo "last modified: " . date ("F d Y H:i:s.", getlastmod()); ?>
		</footer>
	</div>
</body>		
</html>
