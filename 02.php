<?php $startTime = microtime(true);

$a = 1;
$b = 2;
$total = 0;
while ($a <= 4000000) {
	if ($a%2==0) { $total += $a; }
	$b = $a + $b;
	$a = $b - $a;
}

$answer = $total;
$endTime = microtime(true);
echo 'Answer: ',$answer,'<br>Time: ',($endTime - $startTime);
?>