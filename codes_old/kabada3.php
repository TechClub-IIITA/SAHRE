<?php
include 'kabada2.php';
/*Calculating Influence from immediate Friends */
/*Finding all the friends of the user concerned */
$size_friends_y=13;
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
for ($i=0;$i<$count_friends;++$i)
	echo "<br>".$Friends_user[$i];
	
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
			for ($i=-4;$i<5;++$i)
				echo "<br>".$i." ".$H[0][$i];
				echo "<br>";
				
				
				/*calculating prob of each diff of each friend*/
			
			for ($i=0;$i<$count_friends;++$i)
				{
				$sum=0;
				echo "i".$i."<br>";
				for ($j=-4;$j<5;++$j)
					{
					echo "<br>".$P[$i][$j]=$H[$i][$j]/$Total_simul_rates[$i];
					}
				echo "<br>";
				}
				/*calculating prob of each diff of each friend completes*/
			/*calculating final influence value by each friend for each rating k={1,2,3,4,5}*/
			
			for ($i=0;$i<$count_friends;$i++)
				{
				for($j=1;$j<=5;$j++)
					{
					if ($Ratings[$Friends_user[$i]-1][$ITEM_ID]!=0) /*We cannot take the effect of those friends who didn't rate this particular item */
						{
						echo "<br>".$prob_Ru_k_Rv[$i][$j]=$P[$i][$j-$Ratings[$Friends_user[$i]][$ITEM_ID]];
						}
					}
				}
			/*Calculating Zv for each code*/
			/*With the current code, there doesn't seem to have any requirement of this normalizing constant*/
			
		/*calculating net probability from the influence of all the friends,for each value of k*/

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
	for ($k=1;$k<=5;++$k)
		{
		$prob_Ru_k_Rv_net[$k]=$prob_Ru_k_Rv_net[$k]/$Z;
		}
			
			
			
?>