<!-- 
The cube, 41063625 (3453), can be permuted to produce two other cubes: 56623104 (3843) and 66430125 (4053). In fact, 41063625 is the smallest cube which has exactly three permutations of its digits which are also cube.
Find the smallest cube for which exactly five permutations of its digits are cube.
-->
<?php $startTime = microtime(true);

function isCubic($input) {
	$number = pow($input,1/3);
	if (floor($number) == $number)
	{
		return true;
	}
	return false;
}
$cubeArray = array();
for ($i=5000; $i <= 10000; $i++) { //first checked 1->5000
	$cubeArray[] = pow($i,3);
}
$cubeArrayCount = count($cubeArray);
for ($i=0; $i < $cubeArrayCount; $i++) {
	for ($j=0; $j <= 9; $j++) { 
		$numsArray[$j] = substr_count($cubeArray[$i],$j);
	}
	$permCubeCount = 0;
	for ($j=0; $j < $cubeArrayCount; $j++) {
		if ($numsArray[0] == substr_count($cubeArray[$j],"0")
			&& $numsArray[1] == substr_count($cubeArray[$j],"1")
			&& $numsArray[2] == substr_count($cubeArray[$j],"2")
			&& $numsArray[3] == substr_count($cubeArray[$j],"3")
			&& $numsArray[4] == substr_count($cubeArray[$j],"4")
			&& $numsArray[5] == substr_count($cubeArray[$j],"5")
			&& $numsArray[6] == substr_count($cubeArray[$j],"6")
			&& $numsArray[7] == substr_count($cubeArray[$j],"7")
			&& $numsArray[8] == substr_count($cubeArray[$j],"8")
			&& $numsArray[9] == substr_count($cubeArray[$j],"9")
			) {
			$permCubeCount++;
		}
	}
	if ($permCubeCount==5) {
		$firstFivePer = $cubeArray[$i];
		break;
	}
}

$answer = $firstFivePer;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 127035954683
// Time: 0.23s