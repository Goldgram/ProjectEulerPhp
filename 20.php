<!-- 
n! means n  (n  1)  ...  3  2  1
For example, 10! = 10  9  ...  3  2  1 = 3628800,
and the sum of the digits in the number 10! is 3 + 6 + 2 + 8 + 8 + 0 + 0 = 27.
Find the sum of the digits in the number 100!
 -->
<?php $startTime = microtime(true);

$numArray = array();
$numArray[0] = 1;
for ($i=10; $i > 0; $i--) {
	echo $i,"\n";
	// $leftover = 0;
	for ($j=count($numArray)-1; $j >= 0; $j--) {
		$tempNum = $numArray[$j]*$i;
		$numArray[$j] = $tempNum%10;
	// 	$numArray[$j] = ($numArray[$j]*2)+$leftover;
	// 	if ($numArray[$j]>9) {
	// 		$numArray[$j]-=10;
	// 		$leftover = 1;

		//$decNum = (intval($belowOneHun/10)) * 10
		$decNum = intval($tempNum/10);

		// for ($i=0; $i < cou$numArray; $i++) { 
		// 	# code...
		// }



		if (!isset($numArray[$j+1])) {
			$numArray[$j+1] = 0;
		}
		$numArray[$j+1] += $decNum;
	// 	}
	// 	else
	// 	{
	// 		$leftover = 0;
	// 	}
	}
}
// $sumOfArray = array_sum($numArray);

$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
