<?php
include('db_connect.php');
$i=3;
	while ($i<=80)
		{
				mysql_query("ALTER TABLE ratings ADD `$i` varchar(255)"); 
		$i++;
		}
	mysql_close($con);
?>
 