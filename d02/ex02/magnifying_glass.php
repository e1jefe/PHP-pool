#!/usr/bin/php
<?php
function replace_1($var)
{
    return 'title="'. strtoupper($var[1]) . '"';
}
function replace_2($var)
{
    return '>'. strtoupper($var[1]) . '<';
}
function replace($finds)
{
    $str = preg_replace_callback('/title="(.*)"/', "replace_1", $finds[0]);
    $str = preg_replace_callback('/>(.*?)</', "replace_2", $str);
    return ($str);
}
if ($argc < 2 || ($fd = fopen($argv[1], "r")) === FALSE)
    exit();
$arr = array();
while ($line = fgets($fd))
    $arr[] = preg_replace_callback("/<a.*a>/", "replace", $line);
foreach ($arr as $v)
    echo $v;
?>