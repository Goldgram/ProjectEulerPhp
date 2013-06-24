<?php $startTime = microtime(true);
//function to check if number is prime
function prime($input)
{
	$bigCheck = ''+($input);
	$coin = 0;
	for ($i=2; $i < ($input) ; $i++) {
		$check = ''+$i;
		if (bcmod($bigCheck, $check)==0) {
			$coin++;
			break;
		}
	}
	return $coin;
}

$div = 1;
$bigNum = 600851475143;
$bigNumStr = '600851475143';
$numbers = array();
$arrayIndex = 0;

//loop to house all the lower half of factors in a array (called numbers)
while (($bigNum/$div)>=$div) {
	$div++;
	$divStr = ''+$div;
	if (bcmod($bigNumStr, $divStr)==0) {
		$numbers[$arrayIndex] = $div;
		$arrayIndex++;
	}
}

//check the top half of factors
$foundInTopHalf = 0;
for ($i=0; $i < count($numbers); $i++) { 
	if (prime($bigNum/$numbers[$i])==0)
	{
		$HighestPrime = $bigNum/$numbers[$i];
		$foundInTopHalf++;
		break;
	}
}
//if not there check the bottom half
if ($foundInTopHalf==0) {
	for ($i=count($numbers)-1; $i >= 0; $i--) { 
		if (prime($numbers[$i])==0)
		{
			$HighestPrime = $numbers[$i];
			break;
		}
	}
}

$answer = $numbers[$i];
$endTime = microtime(true);
echo 'Answer: ',$answer,'<br>Time: ',($endTime - $startTime);
?>