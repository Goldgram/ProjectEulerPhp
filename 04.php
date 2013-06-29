<!-- 
A palindromic number reads the same both ways. The largest palindrome made from the product of two 2-digit numbers is 9009 = 91 99.
Find the largest palindrome made from the product of two 3-digit numbers.
 -->
<?php $startTime = microtime(true);

$lowest = 100*100;
$highest = 999*999;
$breakVar = 0;

//get all palindromic numbers
for ($i=$highest; $i >= $lowest; $i--) { 
	$numStr = ''+$i;
	if ($numStr == strrev($numStr))
	{
		for ($j=100; $j <=999; $j++) { 
			//check if both nums are whole and 3 digits
			if ($i%$j==0 && ($i/$j)>=100 && ($i/$j)<=999) {
				$HighestPal = $i;
				$breakVar = 1;
				break;
			}
		}
	}
	if ($breakVar == 1)
	{
		break;
	}
}

$answer = $HighestPal;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
