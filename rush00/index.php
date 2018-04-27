<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="
        width=device-width,
        height=device-height,
        initial-scale=1,
        minimum-scale=1,
        maximum-scale=1,
        user-scalable=0"/>
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/style.css">
	<title>Fructo</title>
</head>
<?php session_start();
?>
<body><a name="home"></a>
	<section class="home">
		<div class="container">
			<?php Include "header.php"; ?>
			<div class="slogan">
				Sweet and delicious exotic fruits
			</div>
			<div class="single-fruit">
				<img src="img/hidric.png" alt="Hidric">
			</div>
		</div>
	</section>
	<section class="about"><a name="about"></a>
		<div class="container">
			<div class="about-title">
				Internet shop exotic fruits
			</div>
			<div class="about-text">
				<p>
					More flavor and juiciness.
				</p>
			</div>
			<div class="about-text">
				<p>
					Fresh tropical fruits!
				</p>
			</div>
			<div class="about-pic">
				<img src="img/srez.png" alt="hydric_lengthwise">
			</div>
			
		</div>
	</section>

	<section class="health"><a name="features"></a>
		<div class="container">
			<div class="health-title">
				Pure health
			</div>
			<div class="health-text">
				<p>
					Treat yourself with no harm for body.
				</p>
			</div>
			<div class="arbuz-ingridients">
				<img src="img/arbuz.png" alt="arbuz">
				<div class="protein">
					<img src="img/protein.png" alt="protein" >
					<p>
						Protein  0,63g
					</p>
				</div>
				<div class="calories">
					<img src="img/calories.png" alt="calories" >
					<p>
						Calories  35kcal
					</p>
				</div>
				<div class="water">
					<img src="img/water.png" alt="water" >
					<p>
						Water  92%
					</p>
				</div>
				<div class="fat">
					<img src="img/fat.png" alt="fat" >
					<p>
						Fat 0,63g
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="price"><a name="buy"></a>
		<div class="container">
			<div class="price-title">
				Buy fructs
			</div>
			<div class="price-text">
				<p>
					Always freash.
				</p>
			</div>
			<div class="price-text">
				<p>
					The most hight quality.
				</p>
			</div>
			<div class="price-policy">
				<aside class="category">
				    <ul class="menu">
				      <li class="menu_item">
				      	<form action="index.php" method="post" style="width:  100%; font-size:  21px; font-family: 'MyriadPro';"> <input type="submit" name="category" value="fruits"></input></form>
				      </li>
				      <li class="menu_item">
				        <form action="index.php" method="post" style="width:  100%; font-size:  21px; font-family: 'MyriadPro';"> <input type="submit" name="category" value="vegies"></input></form>
				      </li>
				      <li class="menu_item">
				        <form action="index.php" method="post" style="width:  100%; font-size:  21px; font-family: 'MyriadPro';"> <input type="submit" name="category" value="all"></input></form>
				      </li>
				    </ul>
				</aside>
				<?php Include "myshop.php"; ?>
			</div>
		</div>
	</section>

	<footer>
		<div class="container">
			<nav class="menu-bottom">
				<a href="index.php">
					Home
				</a>
				<a href="#about">
					About
				</a>
				<a href="#features">
					Features
				</a>
				<a href="mybasket.php">
					Buy now
				</a>
			</nav>
			<div class="btn-home">
				<a href="#home">
					<img src="img/button_home.png" alt="home">
				</a>
			</div>
			<div class="copyrights">
				<p>
					© 2018 Fructo. All rights reserved by dsheptun and inovykov.
				</p>
			</div>
		</div>
	</footer>

</body>
</html>
