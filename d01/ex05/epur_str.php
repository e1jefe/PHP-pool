#!/usr/bin/php
<?php
if ($argc == 2)
{
    $arr = array_filter(explode(' ', $argv[1]));
    $res = implode(" ", $arr);
    echo $res . "\n";
}
?>