<!-- 
The series, 11 + 22 + 33 + ... + 1010 = 10405071317.
Find the last ten digits of the series, 11 + 22 + 33 + ... + 10001000.
-->
<?php $startTime = microtime(true);

$total = "0";
for ($i=1; $i <= 1000; $i++) {
	$currentI = "".$i;
	$currnetNum = bcpow($currentI,$currentI);
	$total = bcadd($total,$currnetNum);
}
$lastTenDigits = substr($total,strlen($total)-10);
 
$answer = $lastTenDigits;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 9110846700
// Time: 1.95s