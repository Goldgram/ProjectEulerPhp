<!-- 
Let divisorsTotal(n) be defined as the sum of proper divisors of n (numbers less than n which divide evenly into n).
If d(a) = b and d(b) = a, where a  b, then a and b are an amicable pair and each of a and b are called amicable numbers.
For example, the proper divisors of 220 are 1, 2, 4, 5, 10, 11, 20, 22, 44, 55 and 110; therefore d(220) = 284. The proper divisors of 284 are 1, 2, 4, 71 and 142; so d(284) = 220.
Evaluate the sum of all the amicable numbers under 10000.
 -->
<?php $startTime = microtime(true);

function divisorsTotal($input)// d() in the question
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
$amicableArray = array();
for ($a=0; $a < 10000; $a++) { 
	$b = divisorsTotal($a);
	if($a == divisorsTotal($b) && $a!=$b)
	{
		$amicableArray[$a]=$a;
		$amicableArray[$b]=$b;
	}
}
$sumOfArray = array_sum($amicableArray);

$answer = $sumOfArray;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 31626
// Time: 0.11s