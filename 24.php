<!-- 
A permutation is an ordered arrangement of objects. For example, 3124 is one possible permutation of the digits 1, 2, 3 and 4. If all of the permutations are listed numerically or alphabetically, we call it lexicographic order. The lexicographic permutations of 0, 1 and 2 are:
012   021   102   120   201   210
What is the millionth lexicographic permutation of the digits 0, 1, 2, 3, 4, 5, 6, 7, 8 and 9?
-->
<?php $startTime = microtime(true);

$nums = array();
$nums[0] = "0";
$nums[1] = "1";
$nums[2] = "2";
$nums[3] = "3";
$nums[4] = "4";
$nums[5] = "5";
$nums[6] = "6";
$nums[7] = "7";
$nums[8] = "8";
$nums[9] = "9";
$result = array();
//getting factorial of the inputNum(!)
function numOfComb($inputNum)
{
	$total = 1;
	for ($i=$inputNum; $i > 1; $i--) { 
		$total *= $i;
	}
	return $total;
}
//get the index values of each digit 
//example first: 9! * the current number index (1-10), the result is the closest under 1 million
$perNum = 1000000;
for ($numIndex=0; $numIndex < count($nums); $numIndex++) { 
	$currentResult = 0;
	$combsLeft = numOfComb(count($nums) - 1 - $numIndex);
	for ($i=0; $i < (count($nums) - $numIndex); $i++) { 
		$upToPosib = $i * $combsLeft;
		if ($upToPosib < $perNum) {
			$currentUpToPosib = $upToPosib;
			$currentResult = $i;
		}
	}
	$result[$numIndex] = $currentResult;
	$perNum -= $currentUpToPosib;
}
//get the values of those indexes by removing elements used in the array
$printout = "";
for ($i=0; $i < count($result); $i++) { 
	$resultIndex = $result[$i];
	$count = 0;
	foreach ($nums as $key => $value) {
		if ($resultIndex==$count) {
			$printout .= $value;
			unset($nums[$value]);
		}
		$count++;
	}
}

$answer = $printout;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 2783915460
// Time: 0.00825s