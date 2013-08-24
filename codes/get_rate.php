<?php
include('db_connect.php');
function getRate($user,$item)
{
$PRODUCT_COUNT;
$USER_COUNT=1404;
$RANGE_N=1;
$RANGE_M;
$PRODUCT_ID=$ITEM_ID=$item;
$USER_ID=$user;

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
			//echo $count_user_reviews_k[$k];
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
$Prob_Aj_Ru_k[$k];

	
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
	$prob_ru_k_attr_a[$k]=	($Prob_Ru_k[$k]*$Prob_Aj_Ru_k[$k])/$normal_const;
	}	
		
		
	
	/* Calculating probability of Item Acceptance */
/*i.e. prob(Ri = k | A=au) is to be calculated*/
	/*Calculating Pr(Ri = k) = (|U(Ri=k)|+1)/(U(I)+n)*/
	$j=$ITEM_ID;
	for ($k=1;$k<=5;++$k)
		{
		$count_item_reviews=0;
		$count_item_reviews_k[$k]=0;
			for ($i=0;$i<$USER_COUNT;++$i)
				{
				if ($Ratings[$i][$j]!=0)
					{
					$count_item_reviews+=1;	/*U(I)*/
					}
				if ($Ratings[$i][$j]==$k)
					{
					$count_item_reviews_k[$k]+=1; /*U(Ri=k)*/
					}
				}
		}	
for ($k=1;$k<=5;++$k)
	{
	$prob_Ri_k[$k]=($count_item_reviews_k[$k]+1)/($count_item_reviews+$RANGE_N);
	}	
	/*Calculating Pr(Ri = k) = (|U(Ri=k)|+1)/(U(I)+n) completes*/

	/*Since users' attributes are not available, we are assuming Pr(Ri = k) to approximate  prob(Ri = k | A=au)*/
	/*Calculating Influence from immediate Friends */
/*Finding all the friends of the user concerned */
$Friends_user[0]="none";
$count_friends=0;
$j=$USER_ID;
for ($i=0;$i<$size_friends_y;++$i)
		{
		if ($Friends[$i][0]==$j)
			{
			$Friends_user[$count_friends]=$Friends[$i][1];
			$count_friends+=1;
			}
		}
		//echo "<br><br><br>".$count_friends;
//for ($i=0;$i<$count_friends;++$i)
	//echo "<br>".$Friends_user[$i];
	//echo "<br>";
	/*Calculating H values for each friend */
		for ($j=0;$j<$count_friends;++$j)
		for ($i=-4;$i<5;$i++)
			{
			$H[$j][$i]=0;
			}
		$i=$USER_ID;
		for ($k=0;$k<$count_friends;$k++)
		{
		$Total_simul_rates[$k]=0;
		for ($j=1;$j<=$PRODUCT_COUNT;++$j)
			{
			if ($Ratings[$i-1][$j]!=0)
				{
				if ($Ratings[$Friends_user[$k]-1][$j]!=0)
					{
					$Total_simul_rates[$k]++;
					$H[$k][$Ratings[$i-1][$j]-$Ratings[$Friends_user[$k]-1][$j]]++;
					}
				}
			}
			}
	/*Calculating H values for each friend completes*/		
			//for ($i=-4;$i<5;++$i)
				//echo "<br>".$i." ".$H[0][$i];
				//echo "<br>";
				
				
				/*calculating prob of each diff of each friend*/
			
			for ($i=0;$i<$count_friends;++$i)
				{
				$sum=0;
				for ($j=-4;$j<5;++$j)
					{
					if ($Total_simul_rates[$i]!=0)
						{
						$P[$i][$j]=$H[$i][$j]/$Total_simul_rates[$i];
						}
					}
				
				}
				/*calculating prob of each diff of each friend completes*/
			/*calculating final influence value by each friend for each rating k={1,2,3,4,5}*/
			
			for ($i=0;$i<$count_friends;$i++)
				{
				for($j=1;$j<=5;$j++)
					{
					if ($Total_simul_rates[$i]==0)
						{
						$prob_Ru_k_Rv[$i][$j]=1;
						}
					else{
					
					if ($Ratings[$Friends_user[$i]-1][$ITEM_ID]!=0) /*We cannot take the effect of those friends who didn't rate this particular item */
						{
						$prob_Ru_k_Rv[$i][$j]=$P[$i][$j-$Ratings[$Friends_user[$i]][$ITEM_ID]];
						}
					}
					}
				}
			/*Calculating Zv for each code*/
			/*With the current code, there doesn't seem to have any requirement of this normalizing constant*/
			
		/*calculating net probability from the influence of all the friends,for each value of k*/
/*	for ($i=0;$i<$count_friends;$i++)
		{
	for ($j=1;$j<=5;++$j)
		{
		echo"<br>".$prob_Ru_k_Rv[$i][$j];
		}
		}*/
		for ($i=1;$i<=5;++$i)
			{
			$prob_Ru_k_Rv_net[$i]=1;
			for ($j=0;$j<$count_friends;++$j)
				{
				if ($Ratings[$Friends_user[$j]-1][$ITEM_ID]!=0)
					{
					$prob_Ru_k_Rv_net[$i]*=$prob_Ru_k_Rv[$j][$i];
					}
				}
			}

	$Z=max($prob_Ru_k_Rv_net);
	
	if ($Z!=0)
	{
	for ($k=1;$k<=5;++$k)
		{
		$prob_Ru_k_Rv_net[$k]=$prob_Ru_k_Rv_net[$k]/$Z;
		}
		$max=0;
$final_ratings[$USER_ID][$ITEM_ID]=0;
/*Calculating final value of the rating of item ITEM_ID for user USER_ID*/ 
for ($k=1;$k<=5;++$k)
	{
	$final_ratings[$USER_ID][$ITEM_ID]=$prob_ru_k_attr_a[$k]*$prob_Ri_k[$k]*$prob_Ru_k_Rv_net[$k];
	if ($max<=$final_ratings[$USER_ID][$ITEM_ID])
		{
		$max=$final_ratings[$USER_ID][$ITEM_ID];
		$rate=$k;
		}
	}

	//echo "<br>Final Ratings ".$rate;
	return $rate;
	}
else
		{
		return "out of coverage";
		}
}

?>
		
		
		
		
		
		
		
		

