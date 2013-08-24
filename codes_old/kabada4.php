<?php
include 'kabada3.php';
$final_ratings[$USER_ID][$ITEM_ID]=0;
/*Calculating final value of the rating of item ITEM_ID for user USER_ID*/ 
for ($k=1;$k<=5;++$k)
	{
	$final_ratings[$USER_ID][$ITEM_ID]+=$k*$prob_ru_k_attr_a[$k]*$prob_Ri_k[$k]*$prob_Ru_k_Rv_net[$k];
	}
	echo "<br>Final Ratings ".$final_ratings[$USER_ID][$ITEM_ID];
?>