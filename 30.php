<!-- 
Surprisingly there are only three numbers that can be written as the sum of fourth powers of their digits:
1634 = 14 + 64 + 34 + 44
8208 = 84 + 24 + 04 + 84
9474 = 94 + 44 + 74 + 44
As 1 = 14 is not a sum it is not included.
The sum of these numbers is 1634 + 8208 + 9474 = 19316.
Find the sum of all the numbers that can be written as the sum of fifth powers of their digits.
 -->
<?php $startTime = microtime(true);
$grandTotal = 0;
for ($i=1; $i < 999999; $i++) { 
	$str = "".$i;
	//echo intval($str[0]),"\n";
	$total = 0;
	for ($j=0; $j < strlen($str); $j++) {
		$mulTotal = 1;
		for ($k=0; $k < 5; $k++) { 
			$mulTotal *= intval($str[$j]);
		}
		$total += $mulTotal;
	}
	if ($total===$i) {
		// echo $i,"\n";
		$grandTotal += $i;
	}
	echo $i,"\n";
}


$answer = $grandTotal;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
