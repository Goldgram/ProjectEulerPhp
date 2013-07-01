<!-- 
n! means n  (n  1)  ...  3  2  1
For example, 10! = 10  9  ...  3  2  1 = 3628800,
and the sum of the digits in the number 10! is 3 + 6 + 2 + 8 + 8 + 0 + 0 = 27.
Find the sum of the digits in the number 100!
 -->
<?php $startTime = microtime(true);

$numArray[0] = 1;
for ($i=100; $i > 0; $i--) {
	for ($j=count($numArray)-1; $j >= 0; $j--) {
		$tempNum = $numArray[$j]*$i;
		$numArray[$j] = $tempNum%10;
		$decNum = "".$tempNum;
		$numLength = strlen($decNum);
		$leftover = 0;
		for ($k=1; $k < $numLength; $k++) {
			if (!isset($numArray[$j+$k])) {
				$numArray[$j+$k] = 0;
			}
			$numArray[$j+$k] += intval($decNum[($numLength-1-$k)]);
			$numArray[$j+$k] += $leftover;

			if ($numArray[$j+$k]>9) {
				$numArray[$j+$k]-=10;
				$leftover = 1;
			}
			else
			{
				$leftover = 0;
			}
			if ($k==$numLength-1 && $leftover ==1) {
				if (!isset($numArray[$j+$k+1])) {
					$numArray[$j+$k+1] = 0;
				}
				$numArray[$j+$k+1] += 1;
			}
		}
	}
}
$sumOfArray = array_sum($numArray);

$answer = $sumOfArray;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 648
// Time: 0.0145s