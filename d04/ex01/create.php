<?php
if (!$_POST["login"] === "" || $_POST["passwd"] === "" || $_POST["submit"] !== "OK")
{
    echo "ERROR\n";
    return ;
}
if (!file_exists("../private"))
    mkdir ("../private");
if (file_exists("../private/passwd"))
{
    $arr = unserialize(file_get_contents("../private/passwd"));
    foreach ($arr as $user)
    {
        if ($user["login"] === $_POST["login"])
        {
            echo "ERROR\n";
            return ;
        }
    }
}
$tmp["login"] = $_POST["login"];
$tmp["passwd"] = hash('whirlpool', $_POST["passwd"]);
$arr[] = $tmp;
file_put_contents("../private/passwd", serialize($arr));
echo "OK\n";
?>