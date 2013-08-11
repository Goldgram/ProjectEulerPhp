<!-- 
A googol (10100) is a massive number: one followed by one-hundred zeros; 100100 is almost unimaginably large: one followed by two-hundred zeros. Despite their size, the sum of the digits in each number is only 1.
Considering natural numbers of the form, ab, where a, b < 100, what is the maximum digital sum?
-->
<?php $startTime = microtime(true);

$totalMax = 0;
for ($i=1; $i < 100; $i++) {
	for ($j=1; $j < 100; $j++) {
		$numStr = bcpow("".$i,"".$j);
		$total = 0;
		for ($k=0; $k < strlen($numStr); $k++) {
			$total += intval($numStr[$k]);
		}
		if ($total > $totalMax) {
			$totalMax = $total;
		}
	}
}

$answer = $totalMax;
$endTime = microtime(true);
echo "Answer: ",$answer,"\nTime: ",($endTime - $startTime),"\n";
// Answer: 972
// Time: 0.59s