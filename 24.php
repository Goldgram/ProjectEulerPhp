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
// $nums[3] = "3";
// $nums[4] = "4";
// $nums[5] = "5";
// $nums[6] = "6";
// $nums[7] = "7";
// $nums[8] = "8";
// $nums[9] = "9";

$result = array();

//started looking at brute force
// function swap($a,$b)
// {
// 	global $nums;
// 	$temp = $nums[$a];
// 	$nums[$a] = $nums[$b];
// 	$nums[$b] = $temp;
// }
// function echoAll()
// {
// 	global $nums;
// 	for ($i=0; $i < 10; $i++) { 
// 		echo $nums[$i];
// 	}
// 	echo "\n";
// }
// echoAll();
// swap(8,9);
// echoAll();
// swap(8,9);
// swap(7,8);
// echoAll();



function numOfComb($inputNum)
{
	$total = 1;
	for ($i=$inputNum; $i > 1; $i--) { 
		$total *= $i;
	}
	return $total;
}
function printResult()
{
	global $result;
	
}


$perNum = 1;
//for ($perNum=1; $perNum <= 6; $perNum++) { 
	for ($numIndex=0; $numIndex < count($nums); $numIndex++) { 
		//$numIndex = 1;

		$currentResult = 0;
		$combsLeft = numOfComb(count($nums) - 1 - $numIndex);
		for ($i=0; $i < (count($nums) - $numIndex); $i++) { 
			$upToPosib = $i * $combsLeft;
			//echo $upToPosib,"\n";
			if ($upToPosib < $perNum) {
				$currentUpToPosib = $upToPosib;
				$currentResult = $i;
			}
		}
		echo "= ",$currentResult,"\n";
		$result[$numIndex] = $currentResult;
		$perNum -= $currentUpToPosib;
	}
var_dump($result);
//}

$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
