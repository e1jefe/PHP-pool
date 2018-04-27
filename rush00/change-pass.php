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
	<link rel="stylesheet" href="css/authorization.css">
	<style>
		.form{
			margin: 0 auto 10px;
		}
	</style>
	<title>Fructo</title>
</head>
<?php
	session_start();
	Include "header.php";
?>
<section class="login-page">
  <div class="form">
		<form class="register-form" action="change-pass.php" method="post">
	 	<p class="register-form_title">
			You are about to change your password
		</p>
	  	<input type="text" name="login" placeholder="username" value="" />
	  	<input type="password" name="oldpw" placeholder="old password" value=""/>
	  	<input type="password" name="newpw" placeholder="new password" value=""/>
	  	<button name="submit" value="OK" />OK</button>
		</form>
	</div>
</section>
</html>

<?php

$file = 'user_base/passwd';
$error = 1;
if ($_POST['login'] !== "" && $_POST['oldpw'] !== "" && $_POST['newpw'] !== "" && $_POST['submit'] == 'OK' && $_POST['oldpw'] !== $_POST['newpw'])
{
	$file_cont = unserialize(file_get_contents($file));
	foreach ($file_cont as $key => $value)
	{
		if ($value['login'] === $_POST['login'])
		{
			if ($value['passwd'] === hash('whirlpool', $_POST['oldpw']))
			{
				$file_cont[$key]['passwd'] = hash('whirlpool', $_POST['newpw']);
				$serializedData = serialize($file_cont);
				file_put_contents($file, $serializedData);
				$error = 0;
				$message = "Password was successfully changed. ";
			}
		}
	}
}
if ($error === 1)
	$message = "Oups, please try againe";

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
			margin: 5px auto;
		}
		.message {
			font-size: 32px;
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
			text-decoration: underline;
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
			else if ($_POST['submit'] === 'OK' && $error === 1)
				echo '<i>' . $message . '</i>';
		?>
		</p>
	</div>
</body>
</html>