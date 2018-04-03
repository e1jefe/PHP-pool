#!/usr/bin/php
<?php
unset($argv[0]);
$arr = array();
foreach($argv as $var)
{
    $res = array_filter(explode(' ', $var));
    foreach ($res as $temp)
        $arr[] = $temp;
}
sort($arr);
foreach ($arr as $var)
    echo $var."\n";
?>