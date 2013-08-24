<?php
include 'make_rec_final.php';
$rec = getRec("1");
for ($i=0;$i<sizeof($rec);++$i)
	{
	echo $rec[$i]."<br>";
	}
?>