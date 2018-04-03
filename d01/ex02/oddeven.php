#!/usr/bin/php
<?php
$str = fopen("php://stdin", "r");
while ($str && !feof($str))
{
	echo "Enter number: ";
	$num = fgets($str);
	if ($num)
	{
		$num = str_replace("\n", "", $num);
		if (is_numeric($num))
		{
			if (($num & 1))
				echo "The number " . $num . " is odd\n";
			else
				echo "The number " . $num . " is even\n";
		}
	else
		echo "'" . $num . "' is not a number\n";
	}
}
fclose($str);
echo "\n";
?>
