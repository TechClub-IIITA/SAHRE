<?php

include('db_connect.php');

$result=mysql_query("SELECT DISTINCT user_Id from ratings_secondary");
$i=1;
while ($row = mysql_fetch_array($result))
		{
		echo $i." ".$row['user_Id']."<br>";
		$result2=mysql_query("SELECT * from ratings_secondary WHERE user_Id='".$row['user_Id']."'");
		$row2 = mysql_fetch_array($result2);
		mysql_query("INSERT INTO USERS (Id,user_Name,user_Id) VALUES (".$i.",'".$row2['user_Name']."','".$row2['user_Id']."')");
		$i++;
		}
?>


