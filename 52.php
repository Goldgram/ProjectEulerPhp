<!-- 
It can be seen that the number, 125874, and its double, 251748, contain exactly the same digits, but in a different order.
Find the smallest positive integer, x, such that 2x, 3x, 4x, 5x, and 6x, contain the same digits.
-->
<?php $startTime = microtime(true);

function isPermutation($a,$b) {
	$numsCountA = array();
	for ($i=0; $i <= 9; $i++) { 
		$numsCountA[$i] = substr_count($a,("".$i));
	}
	$numsCountB = array();
	for ($i=0; $i <= 9; $i++) { 
		$numsCountB[$i] = substr_count($b,("".$i));
	}
	if ($numsCountA == $numsCountB) {
		return true;
	}
	return false;
}
function doesMultiplyUpToSix($input)
{
	for ($i=2; $i <= 6; $i++) { 
		$checkStr = "".$input;
		$multiple = ($input*$i);
		if (!isPermutation($checkStr,$multiple)) {
			return false;
		}
	}
	return true;
}
$result=0;
$i=125874;
while ($result==0) {
	if (doesMultiplyUpToSix($i)) {
		$result=$i;
		break;
	}
	$i++;
}

$answer = $result;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 142857
// Time: 0.26s