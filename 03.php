<!-- 
The prime factors of 13195 are 5, 7, 13 and 29.
What is the largest prime factor of the number 600851475143 ?
 -->
<?php $startTime = microtime(true);
//large number prime varifier
function isPrime($input)
{
	$coin = 1;
	$sq = sqrt($input);
	for ($i=2; $i < $sq ; $i++) {
		if (fmod($input, $i)==0) {
			$coin--;
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
	if (isPrime($bigNum/$numbers[$i])==1)
	{
		$HighestPrime = $bigNum/$numbers[$i];
		$foundInTopHalf++;
		break;
	}
}
//if not there check the bottom half
if ($foundInTopHalf==0) {
	for ($i=count($numbers)-1; $i >= 0; $i--) { 
		if (isPrime($numbers[$i])==1)
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