<?php
if ($_POST["login"] === "" || $_POST["oldpw"] === "" || $_POST["newpw"] === "" || $_POST["submit"] !== "OK")
{
    echo "ERROR\n";
    return ;
}
$arr = unserialize(file_get_contents("../private/passwd"));
$login = $_POST["login"];
$oldpw = hash('whirlpool', $_POST["oldpw"]);
$newpw = hash('whirlpool', $_POST["newpw"]);
foreach ($arr as $n => $user)
{
    if ($user["login"] === $login && $user["passwd"] === $oldpw && $oldpw !== $newpw)
    {
        $user["passwd"] = $newpw;
        $arr[$n] = $user;
        file_put_contents("../private/passwd", serialize($arr));
        echo "OK\n";
        return ;
    }
}
echo "ERROR\n";
return ;
?>