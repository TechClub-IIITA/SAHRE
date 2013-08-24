<?php
$handle=fopen("friends_mega_rev.csv","r");

include('db_connect.php');
		$i=0;
		$current_friend;
while($row = fgetcsv($handle))
	{
if ($row[0]!="")
	{
	$current_friend=$row[0];
	}	
	if ($row[1]!="")
		{
		$user[$i]=$current_friend;
		$mutual_friend[$i]=$row[1];
		$i++;
		}
	} 
	$count=$i;
	for ($i=0;$i<2000;++$i)
		{
		//echo $user[$i];
		$result=mysql_query("SELECT * FROM users WHERE user_Id='".$user[$i]."'");
			$row=mysql_fetch_array($result);
			$user_id=$row['Id'];
		$result2=mysql_query("SELECT * FROM users WHERE user_Id='".$mutual_friend[$i]."'");
		$num=0;
		//echo $user_id." ";
		$friend="";
		while($row2=mysql_fetch_array($result2))
			{
			$friend=$row2['Id'];
			$num++;
			}
			echo $user_id." ".$friend."<br>";
			if($num!=0)
			{
			//echo "here";
			//echo $user_id." ".$mutual_friend."<br>";
			mysql_query("INSERT INTO friends (user_Id,friend_Id) VALUES('".$user_id."','".$friend."')"); 
			}
			}
		
	mysql_close($con);
?>