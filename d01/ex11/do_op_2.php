#!/usr/bin/php
<?php
function ft_error($str)
{
    echo "$str\n";
    exit();
}
if ($argc != 2)
    ft_error("Incorrect Parameters");
$calc = sscanf($argv[1], "%d %c %d %s");
$nb = $calc[0];
$op = $calc[1];
$nb2 = $calc[2];
if ($calc[3] || (ord($calc[3]) == 48))
    ft_error("Syntax Error");
if (!is_numeric($nb) || !is_numeric($nb2))
    ft_error("Syntax Error");
else if (!$nb2)
    if ($op == "/")
        ft_error("Syntax Error");
    else if ($op == "%")
        ft_error("Syntax Error");
switch ($op)
{
    case ("*") :
        echo $nb * $nb2;
        break;
    case ("+") :
        echo $nb + $nb2;
        break;
    case ("-") :
        echo $nb - $nb2;
        break;
    case ("/") :
        echo $nb / $nb2;
        break;
    case ("%") :
        echo $nb % $nb2;
        break;
    default:
        ft_error("Syntax Error");
}
echo "\n";
?>