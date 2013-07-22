<!-- 
The series, 11 + 22 + 33 + ... + 1010 = 10405071317.
Find the last ten digits of the series, 11 + 22 + 33 + ... + 10001000.
 -->
<?php $startTime = microtime(true);

$sumString = "0000000000";
// for ($i=0; $i < 10; $i++) { 
// 	$sumArray[$i] = 0;
// }

for ($i=0; $i < 10; $i++) {
	$numStr = "".pow($i+1,$i+1);
	$numStrLen = strlen($numStr);
	// $leftOver = 0;
	// for ($j=0; $j < 10; $j++) { 
	// 	$sumArray[$i]
	// }

	$leftover = 0;
	for ($j=0; $j < $numStrLen; $j++) { 
		$current = intval($numStr[($numStrLen-$j-1)]) + intval($sumString[9-$j])+$leftover;
		$leftover = 0;
		if ($current>9) {
			$current-=10;
			$leftover=1;
		}
		$sumString[9-$j] = $current;
		if ($j==9) {
			break;
		}
	}
	// $sumArray[$i] = 0;
}
var_dump($sumString);	

$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 
// Time: 