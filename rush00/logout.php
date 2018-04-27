<?php

session_start();

$_SESSION['loggued_on_user'] = "";
$_SESSION['is_log'] = FALSE;

header("location: index.php");

?>