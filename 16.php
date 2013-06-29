<!-- 
2(power)15 = 32768 and the sum of its digits is 3 + 2 + 7 + 6 + 8 = 26.
What is the sum of the digits of the number 2(power)1000?
 -->
<?php $startTime = microtime(true);

$numArray = array();
$numArray[0] = 1;
for ($i=0; $i < 1000; $i++) { 
	$leftover = 0;
	for ($j=0; $j < count($numArray); $j++) { 
		$numArray[$j] = ($numArray[$j]*2)+$leftover;
		if ($numArray[$j]>9) {
			$numArray[$j]-=10;
			$leftover = 1;
			if (!isset($numArray[$j+1])) {
				$numArray[$j+1] = 0;
			}
		}
		else
		{
			$leftover = 0;
		}
	}
}
$sumOfArray = array_sum($numArray);

$answer = $sumOfArray;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
