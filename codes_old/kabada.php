<?php
$PRODUCT_COUNT;
$USER_COUNT=1404;
$RANGE_N=5;
$RANGE_M;
$PRODUCT_ID=$ITEM_ID=8;
$USER_ID="1";
include('db_connect.php');

$result=mysql_query("SELECT DISTINCT pro_Category FROM products");
$i=0;
while ($row=mysql_fetch_array($result))
	{
	$Categories[$i]=$row['pro_Category'];
	$i++;
	}

$RANGE_M=$i;

$result=mysql_query("SELECT * FROM products ORDER BY `Id` ASC");
$i=0;
while ($row=mysql_fetch_array($result))
		{
		$Products[$i][0]=$row['pro_Name'];
		$Products[$i][1]=$row['pro_Rating'];
		$Products[$i][2]=$row['pro_Category'];
		$Products[$i][3]=$row['Id'];
		$i++;
		}
$PRODUCT_COUNT=$i;

/*in ITEM_ID, we need not substract 1 as far as ratings are concerned*/
/*But in USER_ID, 1 have to be substracted in Ratings (unfortunately), as per this code */ 

$result=mysql_query("SELECT * FROM ratings");
$i=0;
while ($row=mysql_fetch_array($result))
	{
	for ($j=1;$j<=80;++$j)
		{
		$Ratings[$i][$j]=$row[$j];
		}
	
		$i++;
	}
	
$i=0;
$result=mysql_query("SELECT * FROM friends");
while ($row=mysql_fetch_array($result))
		{
		$Friends[$i][0]=$row[0];
		$Friends[$i][1]=$row[1];
		$i++;
		}
$rel_num=$i;
$size_friends_y=$i;
/*calculating Probability of user Preferance */
	/*calculating probability of Pr(Ru = k) */

		/*calculating I(U) i.e. number of reviews of user U */
		/*AND I(Ru = k) i.e number of reviews that user U gives a rating k => $count_user_reviews[$k]*/
			for ($k=1;$k<=5;++$k)
			{
			$count_user_reviews=0;
			$count_user_reviews_k[$k]=0;
			$i = $USER_ID-1;
					
					for ($j=1;$j<=$PRODUCT_COUNT;++$j)
						{
							if ($Ratings[$i][$j]!=0)
								{
								$count_user_reviews++; /*I(U)*/
								}
							if ($Ratings[$i][$j] == $k)
								{
								$count_user_reviews_k[$k]+=1; /* I( Ru = k) */
								}
						}
			}
			for ($k=1;$k<=5;++$k)
			{
			echo $count_user_reviews_k[$k];
			}
		/*Calculation of I(U) AND I(Ru = k ) completes*/
		for ($k=1;$k<=5;++$k)
			{
			$Prob_Ru_k[$k]=($count_user_reviews_k[$k]+1)/($count_user_reviews+$RANGE_N);
			}
		for ($k=1;$k<=5;++$k)
			{
			//echo "<br>".$Prob_Ru_k[$k];
			}
	/* Calculation of Pr(Ru = k) completes*/ 
	/*Calculating Pr(A'j = a'j|Ru = k) */
		/*calculating I(A'j=a'j,Ru=k)*/
		for ($i=0;$i<$PRODUCT_COUNT;++$i)
			{
			if ($Products[$i][3]==$PRODUCT_ID)
				{
				$target_category=$Products[$i][2];
				}
			}
			for ($i=0;$i<sizeof($Categories);++$i)
				{
				if ($Categories[$i]==$target_category)
					{
					$target_category_id=$i;
					}
				}
		$i=$USER_ID-1;
		for ($k=1;$k<=5;++$k)
			{
			$count_reviews_with_attr_a[$k]=0;
			for ($j=1;$j<=$PRODUCT_COUNT;++$j)	
				{
				if ($Ratings[$i][$j]==$k)
					{
						for ($p=0;$p<$PRODUCT_COUNT;++$p)
							{
							if ($Products[$p][3]==$j)
								{
								if ($Products[$p][2]==$target_category)
									{
									$count_reviews_with_attr_a[$k]++; /*I(A'j=a'j,Ru=k)*/
									}
								}
							}
					
					}
				}
			}
		/*calculating I(A'j=a'j,Ru=k) completes*/
	for ($k=1;$k<=5;++$k)
	$Prob_Aj_Ru_k[$k]=($count_reviews_with_attr_a[$k] + 1)/($count_user_reviews_k[$k] + $RANGE_M);

	for ($k=1;$k<=5;++$k)
	echo "<br>".$Prob_Aj_Ru_k[$k];

	
	/*Calculating Probability Pr(A'1,A'2,A'3,...) */
	
		for ($i=0;$i<sizeof($Categories);++$i)
			{
			$Category_num[$i]=0;
			for ($j=0;$j<$PRODUCT_COUNT;++$j)
				{
				if ($Products[$j][2]==$Categories[$i])
					{
					$Category_num[$i]+=1;
					}
				}
			$prob_cat[$i]=$Category_num[$i]/$PRODUCT_COUNT;
			}
	$prob_cat_net=1;
	for ($i=0;$i<sizeof($Categories);++$i)
		{
		$prob_cat_net*=$prob_cat[$i];
		}

	//	echo "<br>".$prob_cat_net;
	for ($i=0;$i<sizeof($Categories);++$i)
		{
		/*to be filled in a min*/
		}
	/*Calculating Probability Pr(A'1,A'2,A'3,...) Completes*/
$normal_const=0;
	for ($k=1;$k<=5;$k++)
	{
	$normal_const+=	($Prob_Ru_k[$k]*$Prob_Aj_Ru_k[$k]);
	}
	for ($k=1;$k<=5;$k++)
	{
	echo "<br>".$prob_ru_k_attr_a[$k]=	($Prob_Ru_k[$k]*$Prob_Aj_Ru_k[$k])/$normal_const;
	}	
		
		
	echo "one ends"."<br><br><br><br>";	
		
		
		
		
		
		
		
		

?>