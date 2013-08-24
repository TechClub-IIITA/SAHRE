<?php
include 'sahre3.php';
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
	echo "<br>Final Ratings ".$rate;
	
?>