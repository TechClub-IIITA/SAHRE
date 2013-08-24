<?php
include 'kabada.php';
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
	echo "<br>".$prob_Ri_k[$k]=($count_item_reviews_k[$k]+1)/($count_item_reviews+$RANGE_N);
	}	
	/*Calculating Pr(Ri = k) = (|U(Ri=k)|+1)/(U(I)+n) completes*/

	/*Since users' attributes are not available, we are assuming Pr(Ri = k) to approximate  prob(Ri = k | A=au)*/
		
		
		
?>