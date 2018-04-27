<?php

$file = 'user_base/passwd';
$file_cont = unserialize(file_get_contents($file));
foreach ($file_cont as $key => $v)
{
	if ($_GET['id'] === $v['login'])
	{
		unset($file_cont[$key]['login']);
		unset($file_cont[$key]['passwd']);
		unset($file_cont[$key]['phone-nbr']);
		unset($file_cont[$key]['email']);
		unset($file_cont[$key]['name']);
		unset($file_cont[$key]);
	}
}
$file_cont = array_values($file_cont);
$serializedData = serialize($file_cont);
file_put_contents($file, $serializedData);
header("Location: admin.php");
?>