<!-- 
The 5-digit number, 16807=75, is also a fifth power. Similarly, the 9-digit number, 134217728=89, is a ninth power.
How many n-digit positive integers exist which are also an nth power?
-->
<?php $startTime = microtime(true);

$total = 0;
$nCount = 1;
$n = 1; 
while ($nCount > 0) {
	$nCount = 0;
	$start = "1";
	for ($i=0; $i < $n-1; $i++) { 
		$start .= "0";
	}
	$start = ceil(pow(intval($start),1/$n));
	$lastNum = 0;
	for ($i=$start; strlen("".$lastNum) <= $n; $i++) { 
		$lastNum = bcpow($i,$n);
		if (strlen($lastNum)==$n) {
			$nCount++;
		}
	}
	$total += $nCount;
	$n++;
}

$answer = $total;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 49
// Time: 0.0005