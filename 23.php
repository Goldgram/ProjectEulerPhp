<!-- 
A perfect number is a number for which the sum of its proper divisors is exactly equal to the number. For example, the sum of the proper divisors of 28 would be 1 + 2 + 4 + 7 + 14 = 28, which means that 28 is a perfect number.
A number n is called deficient if the sum of its proper divisors is less than n and it is called abundant if this sum exceeds n.
As 12 is the smallest abundant number, 1 + 2 + 3 + 4 + 6 = 16, the smallest number that can be written as the sum of two abundant numbers is 24. By mathematical analysis, it can be shown that all integers greater than 28123 can be written as the sum of two abundant numbers. However, this upper limit cannot be reduced any further by analysis even though it is known that the greatest number that cannot be expressed as the sum of two abundant numbers is less than this limit.
Find the sum of all the positive integers which cannot be written as the sum of two abundant numbers.
-->
<?php $startTime = microtime(true);

function sumOfDiv($input)
{
	$divTotal = 1;
	$sqrt = sqrt($input);
	for ($i=2; $i <= $sqrt; $i++) { 
		if ($i==$sqrt) {
			$divTotal+=$i;
		}
		else if ($input%$i==0) {
			$divTotal+=$i;
			$divTotal+=($input/$i);
		}
	}
	return $divTotal;
}
$Total = 0;
$abnIndex = 0;
for ($i=1; $i <= 28123; $i++) { 
	$Total += $i;
	if (sumOfDiv($i)>$i) {
		$abn[$abnIndex] = $i;
		$abnIndex++;
	}
}
for ($i=0; $i < $abnIndex; $i++) { 
	for ($j=$i; $j < $abnIndex; $j++) {
		$current = $abn[$i] + $abn[$j];
		if ($current<=28123) {
			$sumArray[$current] = $current;
		}
	}
}
$Total -= array_sum($sumArray);

$answer = $Total;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 4179871
// Time: 4.026s