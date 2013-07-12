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

function SumPowFive($input)
{
	$total = 0;
	for ($j=0; $j < strlen($input); $j++) {
		$mulTotal = 1;
		for ($k=0; $k < 5; $k++) { 
			$mulTotal *= intval($input[$j]);
		}
		$total += $mulTotal;
	}
	return $total;
}
$min = "2";
while (intval($min) < SumPowFive($min)) {
	$min .= "2";
}
$max = "9";
while (intval($max) < SumPowFive($max)) {
	$max .= "9";
}
$grandTotal = 0;
for ($i=$min; $i < $max; $i++) { 
	$str = "".$i;
	$total = SumPowFive($str);
	if ($total===$i) {
		$grandTotal += $i;
	}
}

$answer = $grandTotal;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 443839
// Time: 12.46s
