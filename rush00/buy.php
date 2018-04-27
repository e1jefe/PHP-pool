<?php

session_start();
$error = 1;
if($_GET['id'] == 1)
{
	$file = 'user_base/orders';
	if (file_exists($file) === FALSE)
		mkdir('user_base');
	$file_cont = unserialize(file_get_contents($file));
	$items[] = $_SESSION['products'];
	$user = $_SESSION['loggued_on_user'];
	$arr['purchas'] = $items;
	$arr['user_login'] = $user;
	$arr['order-id'] = random_int(100, 1000);
	$file_cont[] = $arr;
	$serializedData = serialize($file_cont);
	file_put_contents($file, $serializedData);
	$message = "Your order was assepted. Manager will contact you for paying details.";
	$error = 0;
}
else
{
	$message =  "You need to login or signin before doing a purcheses.";
}

?>
<html>
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
	<style>
		body{
			background: #76b852; /* fallback for old browsers */
			background: -webkit-linear-gradient(right, #528354, #314e32);
			background: -moz-linear-gradient(right, #528354, #314e32);
			background: -o-linear-gradient(right, #528354, #314e32);
			background: linear-gradient(to left, #528354, #314e32);
			font-family: "MyriadPro", sans-serif;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;      
		}
		.container {
			margin: 50px auto;
			padding-top: 10%;
		}
		.message {
			font-size: 50px;
			color: #fff;
			display: block;
			margin: 0 auto;
			text-align: center;
		}
		a {
			text-decoration: none;
			color: #fff;
			font-style: italic;
		}
		a:hover, a:active {
			outline: none;
			background: rgba(0, 0, 0, 0.4);
						-moz-transition-property: rgba(0, 0, 0, 0.4); /*SMOOTH CHANGE BG FOR HOVER*/
						-moz-transition-duration: 0.8s;
						-moz-transition-timing-function: ease-out;
						-webkit-transition-property: rgba(0, 0, 0, 0.4);
						-webkit-transition-duration: 1s;
						-o-transition-property: rgba(0, 0, 0, 0.4);
						-o-transition-duration: 0.8s;
		}
	</style>
</head>
<body>
	<div class="container">
		<p class="message">
			<?php 
			if ($error === 0)
			{
				echo $message;
				header("refresh:3;url=index.php");
    		}
			else
			{
				echo $message;
				header("refresh:3;url=sign-in.php");
			}
			?>
		</p>
	</div>
</body>
</html>