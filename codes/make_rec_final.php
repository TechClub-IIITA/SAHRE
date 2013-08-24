<?php
function getRec($user)
{
include 'get_rate.php';
$max=0;
$result=mysql_query("SELECT * FROM products ORDER BY `Id` ASC");
$i=0;
while ($row=mysql_fetch_array($result))
		{
		$Products1[$i][0]=$row['pro_Name'];
		$Products1[$i][1]=$row['pro_Rating'];
		$Products1[$i][2]=$row['pro_Category'];
		$Products1[$i][3]=$row['Id'];
		$i++;
		}
for($i=1;$i<40;++$i)
	{
	$ratings[$i]=getRate($user,$i);
	if ($max<=$ratings[$i])
		{
		$max=$ratings[$i];
		}
	}
	
	$count=0;
	for ($i=1;$i<40;$i++)
		{
		if ($ratings[$i]==$max && $count<=5)
			{
			$recommendations[$count]=$Products1[$i][0];
			//echo "<br>Recommend ".$Products1[$i][0];
			$count++;
			}
		}
		return $recommendations;
		}
?>