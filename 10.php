<?php $startTime = microtime(true);

function isPrime($input)
{
	$coin = 1;
	$sq = sqrt($input);
	for ($i=2; $i < $sq; $i++) {
		if (fmod($input,$i)==0) {
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
$totalPrimes = 2;
for ($i=3; $i < 2000000; $i+=2) {
	if (isPrime($i)==1)
	{
		//echo $i;
		$totalPrimes += $i; 
	}
}


$answer = $totalPrimes;
$endTime = microtime(true);
echo 'Answer: ',$answer,'<br>Time: ',($endTime - $startTime);
?>