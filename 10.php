<?php $startTime = microtime(true);

$numbers = array();
for ($i=2; $i <= 10; $i++) { 
	$numbers[$i] = $i;
}

for ($i=2; $i <= 10; $i++) { 
	//echo $i,'<br>';
	foreach ($numbers as $key => $value) {
		if ($value%$i==0 && $value!=$i) {
			unset($numbers[$key]);
		}
		// echo $key,' => ',$value,'<br>';
	}
}

$answer = array_sum($numbers);
$endTime = microtime(true);
echo 'Answer: ',$answer,'<br>Time: ',($endTime - $startTime);
?>