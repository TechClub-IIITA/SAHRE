<?php
include('db_connect.php');
include ('get_rate.php');
$result=mysql_query("SELECT * FROM ratings_secondary");
$sum=0;
for ($i=0;$i<100;$i++)
	{
	for ($ksh=0;$ksh<0;++$ksh)
	{
	$row=mysql_fetch_array($result);
	}
	$row=mysql_fetch_array($result);
	$user_id=$row['user_Id'];
	$pro_id=$row['pro_Id'];
	$result2=mysql_query("SELECT * FROM users WHERE user_Id='".$user_id."'");
	$row2=mysql_fetch_array($result2);
	$user_id_a=$row2['Id'];
	$result3=mysql_query("SELECT * FROM products WHERE pro_Id='".$pro_id."'");
	$row3=mysql_fetch_array($result3);
	$pro_id_a=$row3['Id'];
	//echo $pro_id_a;
	$rating[$i]=getRate($user_id_a,$pro_id_a);
	$result4=mysql_query("SELECT * from ratings where user_Id='".$user_id_a."'");
	$row4=(mysql_fetch_array($result4));
	$rating_a[$i]=$row4[$pro_id_a];
	$diff=abs($rating_a[$i]-$rating[$i]);
	$sum+=$diff;
	}
	$mae[1]=$sum/20;
	
	$result=mysql_query("SELECT * FROM ratings_secondary");
$sum=0;
for ($i=0;$i<100;$i++)
	{
	for ($ksh=0;$ksh<1;++$ksh)
	{
	$row=mysql_fetch_array($result);
	}
	$row=mysql_fetch_array($result);
	$user_id=$row['user_Id'];
	$pro_id=$row['pro_Id'];
	$result2=mysql_query("SELECT * FROM users WHERE user_Id='".$user_id."'");
	$row2=mysql_fetch_array($result2);
	$user_id_a=$row2['Id'];
	$result3=mysql_query("SELECT * FROM products WHERE pro_Id='".$pro_id."'");
	$row3=mysql_fetch_array($result3);
	$pro_id_a=$row3['Id'];
	//echo $pro_id_a;
	$rating[$i]=getRate($user_id_a,$pro_id_a);
	$result4=mysql_query("SELECT * from ratings where user_Id='".$user_id_a."'");
	$row4=(mysql_fetch_array($result4));
	$rating_a[$i]=$row4[$pro_id_a];
	$diff=abs($rating_a[$i]-$rating[$i]);
	$sum+=$diff;
	}
	$mae[2]=$sum/20;
	
	$result=mysql_query("SELECT * FROM ratings_secondary");
$sum=0;
for ($i=0;$i<100;$i++)
	{
	for ($ksh=0;$ksh<2;++$ksh)
	{
	$row=mysql_fetch_array($result);
	}
	$row=mysql_fetch_array($result);
	$user_id=$row['user_Id'];
	$pro_id=$row['pro_Id'];
	$result2=mysql_query("SELECT * FROM users WHERE user_Id='".$user_id."'");
	$row2=mysql_fetch_array($result2);
	$user_id_a=$row2['Id'];
	$result3=mysql_query("SELECT * FROM products WHERE pro_Id='".$pro_id."'");
	$row3=mysql_fetch_array($result3);
	$pro_id_a=$row3['Id'];
	//echo $pro_id_a;
	$rating[$i]=getRate($user_id_a,$pro_id_a);
	$result4=mysql_query("SELECT * from ratings where user_Id='".$user_id_a."'");
	$row4=(mysql_fetch_array($result4));
	$rating_a[$i]=$row4[$pro_id_a];
	$diff=abs($rating_a[$i]-$rating[$i]);
	$sum+=$diff;
	}
	$mae[3]=$sum/20;
	$result=mysql_query("SELECT * FROM ratings_secondary");
$sum=0;
for ($i=0;$i<100;$i++)
	{
	for ($ksh=0;$ksh<3;++$ksh)
	{
	$row=mysql_fetch_array($result);
	}
	$row=mysql_fetch_array($result);
	$user_id=$row['user_Id'];
	$pro_id=$row['pro_Id'];
	$result2=mysql_query("SELECT * FROM users WHERE user_Id='".$user_id."'");
	$row2=mysql_fetch_array($result2);
	$user_id_a=$row2['Id'];
	$result3=mysql_query("SELECT * FROM products WHERE pro_Id='".$pro_id."'");
	$row3=mysql_fetch_array($result3);
	$pro_id_a=$row3['Id'];
	//echo $pro_id_a;
	$rating[$i]=getRate($user_id_a,$pro_id_a);
	$result4=mysql_query("SELECT * from ratings where user_Id='".$user_id_a."'");
	$row4=(mysql_fetch_array($result4));
	$rating_a[$i]=$row4[$pro_id_a];
	$diff=abs($rating_a[$i]-$rating[$i]);
	$sum+=$diff;
	}
	$mae[4]=$sum/20;
	
	$result=mysql_query("SELECT * FROM ratings_secondary");
$sum=0;
for ($i=0;$i<100;$i++)
	{
	for ($ksh=0;$ksh<4;++$ksh)
	{
	$row=mysql_fetch_array($result);
	}
	$row=mysql_fetch_array($result);
	$user_id=$row['user_Id'];
	$pro_id=$row['pro_Id'];
	$result2=mysql_query("SELECT * FROM users WHERE user_Id='".$user_id."'");
	$row2=mysql_fetch_array($result2);
	$user_id_a=$row2['Id'];
	$result3=mysql_query("SELECT * FROM products WHERE pro_Id='".$pro_id."'");
	$row3=mysql_fetch_array($result3);
	$pro_id_a=$row3['Id'];
	//echo $pro_id_a;
	$rating[$i]=getRate($user_id_a,$pro_id_a);
	$result4=mysql_query("SELECT * from ratings where user_Id='".$user_id_a."'");
	$row4=(mysql_fetch_array($result4));
	$rating_a[$i]=$row4[$pro_id_a];
	$diff=abs($rating_a[$i]-$rating[$i]);
	$sum+=$diff;
	}
	$mae[5]=$sum/20;
	
	$result=mysql_query("SELECT * FROM ratings_secondary");
$sum=0;
for ($i=0;$i<100;$i++)
	{
	for ($ksh=0;$ksh<5;++$ksh)
	{
	$row=mysql_fetch_array($result);
	}
	$row=mysql_fetch_array($result);
	$user_id=$row['user_Id'];
	$pro_id=$row['pro_Id'];
	$result2=mysql_query("SELECT * FROM users WHERE user_Id='".$user_id."'");
	$row2=mysql_fetch_array($result2);
	$user_id_a=$row2['Id'];
	$result3=mysql_query("SELECT * FROM products WHERE pro_Id='".$pro_id."'");
	$row3=mysql_fetch_array($result3);
	$pro_id_a=$row3['Id'];
	//echo $pro_id_a;
	$rating[$i]=getRate($user_id_a,$pro_id_a);
	$result4=mysql_query("SELECT * from ratings where user_Id='".$user_id_a."'");
	$row4=(mysql_fetch_array($result4));
	$rating_a[$i]=$row4[$pro_id_a];
	$diff=abs($rating_a[$i]-$rating[$i]);
	$sum+=$diff;
	}
	$mae[6]=$sum/20;
	
	$result=mysql_query("SELECT * FROM ratings_secondary");
$sum=0;
for ($i=0;$i<100;$i++)
	{
	for ($ksh=0;$ksh<6;++$ksh)
	{
	$row=mysql_fetch_array($result);
	}
	$row=mysql_fetch_array($result);
	$user_id=$row['user_Id'];
	$pro_id=$row['pro_Id'];
	$result2=mysql_query("SELECT * FROM users WHERE user_Id='".$user_id."'");
	$row2=mysql_fetch_array($result2);
	$user_id_a=$row2['Id'];
	$result3=mysql_query("SELECT * FROM products WHERE pro_Id='".$pro_id."'");
	$row3=mysql_fetch_array($result3);
	$pro_id_a=$row3['Id'];
	//echo $pro_id_a;
	$rating[$i]=getRate($user_id_a,$pro_id_a);
	$result4=mysql_query("SELECT * from ratings where user_Id='".$user_id_a."'");
	$row4=(mysql_fetch_array($result4));
	$rating_a[$i]=$row4[$pro_id_a];
	$diff=abs($rating_a[$i]-$rating[$i]);
	$sum+=$diff;
	}
	$mae[7]=$sum/20;
	
	$result=mysql_query("SELECT * FROM ratings_secondary");
$sum=0;
for ($i=0;$i<100;$i++)
	{
	for ($ksh=0;$ksh<7;++$ksh)
	{
	$row=mysql_fetch_array($result);
	}
	$row=mysql_fetch_array($result);
	$user_id=$row['user_Id'];
	$pro_id=$row['pro_Id'];
	$result2=mysql_query("SELECT * FROM users WHERE user_Id='".$user_id."'");
	$row2=mysql_fetch_array($result2);
	$user_id_a=$row2['Id'];
	$result3=mysql_query("SELECT * FROM products WHERE pro_Id='".$pro_id."'");
	$row3=mysql_fetch_array($result3);
	$pro_id_a=$row3['Id'];
	//echo $pro_id_a;
	$rating[$i]=getRate($user_id_a,$pro_id_a);
	$result4=mysql_query("SELECT * from ratings where user_Id='".$user_id_a."'");
	$row4=(mysql_fetch_array($result4));
	$rating_a[$i]=$row4[$pro_id_a];
	$diff=abs($rating_a[$i]-$rating[$i]);
	$sum+=$diff;
	}
	$mae[8]=$sum/20;
	
	$result=mysql_query("SELECT * FROM ratings_secondary");
$sum=0;
for ($i=0;$i<100;$i++)
	{
	for ($ksh=0;$ksh<8;++$ksh)
	{
	$row=mysql_fetch_array($result);
	}
	$row=mysql_fetch_array($result);
	$user_id=$row['user_Id'];
	$pro_id=$row['pro_Id'];
	$result2=mysql_query("SELECT * FROM users WHERE user_Id='".$user_id."'");
	$row2=mysql_fetch_array($result2);
	$user_id_a=$row2['Id'];
	$result3=mysql_query("SELECT * FROM products WHERE pro_Id='".$pro_id."'");
	$row3=mysql_fetch_array($result3);
	$pro_id_a=$row3['Id'];
	//echo $pro_id_a;
	$rating[$i]=getRate($user_id_a,$pro_id_a);
	$result4=mysql_query("SELECT * from ratings where user_Id='".$user_id_a."'");
	$row4=(mysql_fetch_array($result4));
	$rating_a[$i]=$row4[$pro_id_a];
	$diff=abs($rating_a[$i]-$rating[$i]);
	$sum+=$diff;
	}
	$mae[9]=$sum/20;
	
	$result=mysql_query("SELECT * FROM ratings_secondary");
$sum=0;
for ($i=0;$i<100;$i++)
	{
	for ($ksh=0;$ksh<9;++$ksh)
	{
	$row=mysql_fetch_array($result);
	}
	$row=mysql_fetch_array($result);
	$user_id=$row['user_Id'];
	$pro_id=$row['pro_Id'];
	$result2=mysql_query("SELECT * FROM users WHERE user_Id='".$user_id."'");
	$row2=mysql_fetch_array($result2);
	$user_id_a=$row2['Id'];
	$result3=mysql_query("SELECT * FROM products WHERE pro_Id='".$pro_id."'");
	$row3=mysql_fetch_array($result3);
	$pro_id_a=$row3['Id'];
	//echo $pro_id_a;
	$rating[$i]=getRate($user_id_a,$pro_id_a);
	$result4=mysql_query("SELECT * from ratings where user_Id='".$user_id_a."'");
	$row4=(mysql_fetch_array($result4));
	$rating_a[$i]=$row4[$pro_id_a];
	$diff=abs($rating_a[$i]-$rating[$i]);
	$sum+=$diff;
	}
	$mae[10]=$sum/20;
	$avg_mae=0;
	for ($i=1;$i<=10;++$i)
		{
		$avg_mae+=$mae[$i]/10;
		echo $mae[$i]."<br>";
		}
		
		echo "avg_mae=".$avg_mae;
		
		
?>