#!/usr/bin/php
<?php

function ft_is_sort($tab)
{
    $tmp = array_merge($tab);
    sort($tmp);
    for ($i = 0; $i < count($tab); $i++)
        if ($tmp[$i] !== $tab[$i])
            return (FALSE);
    return (TRUE);
}
?>