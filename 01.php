<?php $startTime = microtime(true);

$total = 0;
for ($i=1; $i < 1000; $i++) { 
	if ($i%3==0 || $i%5==0) {
		$total+=$i;
	}
}

$answer = $total;
$endTime = microtime(true);
echo 'Answer: ',$answer,'<br>Time: ',($endTime - $startTime);
?>