<?php
$handle=fopen("all_restaurants_final.csv","r");

include('db_connect.php');
		$i=0;
while($row = fgetcsv($handle))
	{	   

	$id[$i] = $row[0];	
	$product_name[$i] = $row[1];
	$product_cat[$i] = $row[2];
	$product_rating[$i] = $row[3];
	$i++;
	}
	 
	for($i=1;$i<sizeof($id);$i++){
	echo $id[$i]."<br>";
				mysql_query("INSERT INTO products (Id,pro_Id,pro_Name,pro_Category,pro_Rating) VALUES(".$i.",'".$id[$i]."','".$product_name[$i]."','".$product_cat[$i]."','".$product_rating[$i]."')"); 
					}
		
	mysql_close($con);
?>
 