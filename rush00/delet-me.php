<?php

session_start();

$file = 'user_base/passwd';
$error = 1;
if ($_SESSION['is_log'] === TRUE && $_SESSION['loggued_on_user'] !== "")
{
	$file_cont = unserialize(file_get_contents($file));
	foreach ($file_cont as $key => $value)
	{
		if ($value['login'] === $_SESSION['loggued_on_user'])
		{
			unset($file_cont[$key]['login']);
			unset($file_cont[$key]['passwd']);
			unset($file_cont[$key]['phone-nbr']);
			unset($file_cont[$key]['email']);
			unset($file_cont[$key]['name']);
			unset($file_cont[$key]);
			$file_cont = array_values($file_cont);
			$serializedData = serialize($file_cont);
			file_put_contents($file, $serializedData);
			$error = 0;
			$message = "Your account was deleted. ";
			$_SESSION['is_log'] = FALSE;
			unset($_SESSION['loggued_on_user']);
		}
	}
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
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/authorization.css">
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
			padding: 10%;
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
			text-decoration: underline;
		}
	</style>
</head>
<body>
<?php
	Include "header.php";
?>
	<div class="container">
		<p class="message">
			<?php 
				echo $message;
				header("refresh:3;url=index.php");
			?>
		</p>
	</div>
</body>
</html>