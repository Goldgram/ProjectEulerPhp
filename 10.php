<?php $startTime = microtime(true);

function isPrime($input,$inputArray)
{
	$bigCheck = ''+($input);
	$coin = 1;
	for ($i=0; $i < count($inputArray); $i++) {
		$check = ''+$inputArray[$i];
		if (bcmod($bigCheck, $check)==0) {
			$coin--;
			break;
		}
	}
	return $coin;
}

// $numbers = array();
// for ($i=2; $i <= 10; $i++) { 
// 	$numbers[$i] = $i;
// }

// for ($i=2; $i <= 10; $i++) { 
// 	//echo $i,'<br>';
// 	foreach ($numbers as $key => $value) {
// 		if ($value%$i==0 && $value!=$i) {
// 			unset($numbers[$key]);
// 		}
// 		// echo $key,' => ',$value,'<br>';
// 	}
// }
// echo array_sum($numbers),'<br>';
$totalPrimes = 0;
$primeArray = array();
$primeArray[0] = 2;
$primeArrayIndex = 1;
for ($i=3; $i <= 4000000; $i++) {
	if (isPrime($i,$primeArray)==1)
	{
		$primeArray[$primeArrayIndex] = $i;
		$primeArrayIndex++;
		$totalPrimes += $i; 
	}
	var_dump($primeArray);
	echo '<br><br>';
}


$answer = $totalPrimes;
$endTime = microtime(true);
echo 'Answer: ',$answer,'<br>Time: ',($endTime - $startTime);
?>