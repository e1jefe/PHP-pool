#!/usr/bin/php
<?php
function do_op($tmp1, $op, $tmp2)
{
    switch ($op)
    {
        case ("*") :
            echo $tmp1 * $tmp2;
            break;
        case ("+") :
            echo $tmp1 + $tmp2;
            break;
        case ("-") :
            echo $tmp1 - $tmp2;
            break;
        case ("/") :
            echo $tmp1 / $tmp2;
            break;
        case ("%") :
            echo $tmp1 % $tmp2;
            break;
    }
}
if ($argc != 4)
{
    echo "Incorrect Parameters\n";
    exit();
}
$tmp1 = intval($argv[1]);
$op = trim($argv[2]);
$tmp2 = intval($argv[3]);
$res = do_op($tmp1, $op, $tmp2);
echo $res."\n";
?>
