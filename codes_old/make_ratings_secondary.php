<?php
$handle=fopen("next1600.csv","r");

include('db_connect.php');
		$i=0;
while($row = fgetcsv($handle))
	{	   

	$user_id[$i] = $row[0];	
	$user_name[$i] = $row[1];
	$rating[$i] = $row[2];
	$pro_name[$i] = $row[3];
	$i++;
	}
	 
	for($i=1000;$i<sizeof($user_id);$i++){
				mysql_query("INSERT INTO ratings_secondary (user_Id,user_Name,rating,pro_Id) VALUES('".$user_id[$i]."','".$user_name[$i]."','".$rating[$i]."','".$pro_name[$i]."')"); 
					}
		
	mysql_close($con);
?>
 