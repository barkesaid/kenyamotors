<?php

/* 
Input:
Car numbers = {2375,7682,2325,2352} 
penalties = {250,500,350,200}  
Date = 12 
Ans = 600

*/

$cars= array(2375,7682,2325,2352);
$penalty =array(250,500,350,200);

$size= count($cars);
$paidamount= 0;

for ($i=0; $i <$size ; $i++) { 
	# code...
	if ($cars[$i]%2 ==0) {
		# code...
		$paidamount+=$penalty[$i];

	}

	else { 
	}
}

echo " the fine paid is: ".$paidamount;


?>
