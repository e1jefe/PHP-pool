#!/usr/bin/php
<?php
if ($argc > 1) {
    $arr = array_filter(explode(' ', $argv[1]));
    array_push ($arr, $arr[0]);
    unset($arr[0]);
    $arr2 = implode(' ', $arr);
    echo $arr2 . "\n";
}
?>