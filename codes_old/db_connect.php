<?php
$con = mysql_connect("localhost","root","qwerty");
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}

mysql_select_db("sem_project", $con);
?>