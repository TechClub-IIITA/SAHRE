<?php

include('db_connect.php');
		$result=mysql_query("SELECT * from users");
		while ($row = mysql_fetch_array($result))
				{
				$user_id_a=$row['Id'];
				$result2=mysql_query("SELECT * from ratings_secondary where user_id='".$row['user_Id']."'");
					while ($row2 = mysql_fetch_array($result2))
							{
							
							$user_rating_a=$row2['rating'];
							$result3=mysql_query("SELECT Id from products where pro_Id='".$row2['pro_Id']."'");
							$row3=mysql_fetch_array($result3);
							$product_id_a=$row3['Id'];
							$count=0;
							$result4=mysql_query("SELECT *from ratings where user_Id='".$user_id_a."'");
							while (mysql_fetch_array($result4))
								{
								$count++;
								}
							if($count==0)
								{
								//echo "<br>".$user_id_a=$row['Id'];
								mysql_query("INSERT INTO ratings (user_Id,`".$product_id_a."`) VALUES ('".$user_id_a."','".$user_rating_a."')");
								}
							else
								{
								//echo "<br>".$user_id_a=$row['Id'];
								mysql_query("Update ratings set `".$product_id_a."`='".$user_rating_a."' where user_Id='".$user_id_a."'");
								}
							}
				}
	mysql_close($con);
?>
 