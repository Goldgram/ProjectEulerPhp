<!-- 
Consider the following "magic" 3-gon ring, filled with the numbers 1 to 6, and each line adding to nine.
Working clockwise, and starting from the group of three with the numerically lowest external node (4,3,2 in this example), each solution can be described uniquely. For example, the above solution can be described by the set: 4,3,2; 6,2,1; 5,1,3.
It is possible to complete the ring with four different totals: 9, 10, 11, and 12. There are eight solutions in total.
Total	Solution Set
9	  4,2,3; 5,3,1; 6,1,2
9	  4,3,2; 6,2,1; 5,1,3
10	2,3,5; 4,5,1; 6,1,3
10	2,5,3; 6,3,1; 4,1,5
11	1,4,6; 3,6,2; 5,2,4
11	1,6,4; 5,4,2; 3,2,6
12	1,5,6; 2,6,4; 3,4,5
12	1,6,5; 3,5,4; 2,4,6
By concatenating each group it is possible to form 9-digit strings; the maximum string for a 3-gon ring is 432621513.
Using the numbers 1 to 10, and depending on arrangements, it is possible to form 16- and 17-digit strings. What is the maximum 16-digit string for a "magic" 5-gon ring?
-->
<?php $startTime = microtime(true);

function getFactorial($inputNum)
{
	$total = 1;
	for ($i=$inputNum; $i > 1; $i--) { 
		$total *= $i;
	}
	return $total;
}
//setup the permutation index values for X digit permutation (X!)
$permutationNum = 6;
$perNumIMax = getFactorial($permutationNum);
for ($perNumI = 1; $perNumI <= $perNumIMax; $perNumI++) { 
	$perNum = $perNumI;
	for ($numIndex=0; $numIndex < $permutationNum; $numIndex++) { 
		$currentResult = 0;
		$combsLeft = getFactorial($permutationNum - 1 - $numIndex);
		for ($i=0; $i < ($permutationNum - $numIndex); $i++) { 
			$upToPosib = $i * $combsLeft;
			if ($upToPosib < $perNum) {
				$currentUpToPosib = $upToPosib;
				$currentResult = $i;
			}
		}
		$resultTemplate[$perNumI][$numIndex] = $currentResult;
		$perNum -= $currentUpToPosib;
	}
}

$finalResults = array();
$finalResultsIndex = 0;
$resultTemplateCount = count($resultTemplate);
for ($i=1; $i <= $resultTemplateCount; $i++) {
	echo $i," => ";

	for ($j=0; $j < $resultTemplateCount; $j++) { 
		$nums[$j] = $j+1;
	}

	for ($j=0; $j < count($resultTemplate[$i]); $j++) { 
		echo $nums[$resultTemplate[$i][$j]];
		// $result[$j] = $nums[$resultTemplate[$i][$j]];
		unset($nums[$resultTemplate[$i][$j]]);
		$nums = array_values($nums);
	}
	echo "\n";

	// var_dump($resultTemplate[$i]);

	// if ($result[0]+$result[1]+$result[2] == $result[2]+$result[3]+$result[4] && $result[0]+$result[1]+$result[2] == $result[1]+$result[4]+$result[5]) {
	// 	// echo $i," => ",$result[0],",",$result[1],",",$result[2],"; ",$result[2],",",$result[3],",",$result[4],"; ",$result[1],",",$result[4],",",$result[5],"\n";
	// 	if (!in_array($result,$finalResults)) {
	// 		$finalResults[$finalResultsIndex] = $result;
	// 		$finalResultsIndex++;
	// 	}
	// }


}









$answer = 0;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 
// Time: 